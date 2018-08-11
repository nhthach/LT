<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Category;
use App\Library\Library as Library;

class ActicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $request = Request();
        $prefix =  trim($request->route()->getPrefix(),"/");
        $url = Library::stripUnicode($prefix);
        $category =  Category::where('url', $url)->firstOrFail();

        if($category->id){
            $articles = Article::with('category');
            $breadcrumb = '';
            if(strcmp($url,'trang-chu')!= 0){
              $articles = $articles->where('category_id',$category->id);
              $breadcrumb = $category->name;
            }
             

           $articles =  $articles->orderByRaw('(updated_at) desc')->paginate(10);
            return view('frontend.article',['articles' => $articles,'breadcrumb'=>$breadcrumb]); 
        }  
    }


    public function getByCategory($name,$id){
        $request = Request();
        $prefix =  trim($request->route()->getPrefix(),"/");
        $category =  Category::where('url', Library::stripUnicode($prefix))->firstOrFail();
       if(!empty($category->id)){
         $article = Article::findorFail($id);
         $article->view = intval($article->view)+1;
         $article->save();
         return view('frontend.article.index',['article'=>$article,'breadcrumb'=>$category->name]);
       }else
         return redirect()->route('home');

    }


    public function adminIndex(){

         $articles = Article::with('category')->get();
         $breadcrumb = "Manage Articles";
         return view('backend.article',['breadcrumb'=>$breadcrumb,'articles' => $articles]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function adminCreate(){
         $article = new  Article();
         $categories = Library::getMenuOption(Category::get());
         $breadcrumb = "Create Article";
         return view('backend.article.create',['breadcrumb'=>$breadcrumb,'article' => $article,'categories'=>$categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function adminStore(Request $request){
         $article = new  Article();
         $article->user_id     = null;
         $article->category_id =$request->get('article')["category"];
         $article->title  =$request->get('article')["title"];
         $article->shortcontent  =$request->get('article')["shortcontent"];
         $article->content   =$request->get('article')["content"];
         Library::uploadFile('shortimg', 'new','article',$article);
         $article->save();
         return redirect()->route('admin.article.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function adminEdit($id){
         $article =  Article::findOrFail($id);
         $categories = Library::getMenuOption(Category::get());
         $breadcrumb = "Edit Article";
         return view('backend.article.edit',['breadcrumb'=>$breadcrumb,'article' => $article,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function adminUpdate(Request $request, $id){
        // request()->validate([

        //     'shortimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);

        $article = Article::findorFail($id);
        $article->user_id         = 1;
        $article->category_id     = $request->get('article')["category"];
        $article->title           = $request->get('article')["title"];
        $article->shortcontent    = $request->get('article')["shortcontent"];
        $article->content         = $request->get('article')["content"];
    
        $article->isactive        = Library::convertBoolData($request->get('article')["isactive"]);
        Library::uploadFile('shortimg', 'update','article',$article);
        $article->save();
         return redirect()->route('admin.article.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminDelete($id){
        $article = Article::findorFail($id);
        $article->delete();
        return array("result"=>"success");
    }
}
