<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\LicenseRank;
use App\LicenseType;
use App\QuestionType;
use App\ExamsDetail;
use App\Question;
use App\Library\Library as Library;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLicense()
    {
         return view('frontend.exam');
    }

    public function showRank($name,$id){
        $licenseType = LicenseType::findorFail($id);
        if(!strcmp(Library::stripUnicode($licenseType->name),$name)){
            return View('frontend.license.rank',['licenseType'=> $licenseType]);
        }
         return redirect()->route('home');

    }

    public function adminIndex(){

         $exams = Exam::with('licenseRank')->get();
         $breadcrumb = "Manage Exams";
         return view('backend.exam',['breadcrumb'=>$breadcrumb,'exams' => $exams]);

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

    public function adminCreate (){
        $exam =  new Exam();
        $objRank = LicenseRank::all();
        $questionTypes = QuestionType::pluck('name', 'id');
        $licenseRanks=LicenseRank::pluck('name', 'id');
        $licenseTypes=LicenseType::pluck('name', 'id');
        $breadcrumb = "Create Exam";
        return view('backend.exam.create')
            ->with(['breadcrumb'=>$breadcrumb,'exam' => $exam,'licenseRanks'=>$licenseRanks,'objRank'=>$objRank,
                    'questionTypes'=>$questionTypes,'licenseTypes'=>$licenseTypes]);
    }

    public function adminDatableQuestion(Request $request){

        $columns = array (
                // datatable column index => database column name
                1 =>'questions.id',
                2 =>'questions.name',
                3 =>'questions.questiontype_id'
        );

        $licenseType = LicenseType::findorFail($request->get('LICENSE_TYPE_ID'));
        $ranks = $licenseType->licenseranks()->get();
        
        $arrQuestionExits = [];

        foreach ($ranks as $value) {
            foreach ($value->exams()->get() as $val) {
                $arrQuestionExits = array_merge($arrQuestionExits,$val->examsDetail()->pluck('question_id')->toArray());
            }  
        }
        $current_question_ids = null;

        if (!empty($request->get('EXAM_ID')) && $request->get('EXAM_ID') > 0) 
        {
            $current_question_ids = ExamsDetail::where('exam_id',$request->get('EXAM_ID'))->pluck('question_id')->toArray();    
        }
        
        $collectQuesions = $licenseType->questions()->whereNotIn('id',array_diff($arrQuestionExits, $current_question_ids));
        $totalData = $collectQuesions->count();
        $totalFiltered = $totalData;      // No filter at first so we can assign like this
        // Here are the parameters sent from client for paging 
        $start = $request->input ( 'start' );           // Skip first start records
        $length = $request->input ( 'length' );   //  Get length record from start
         /*
        * We built the structure required by BootStrap datatables
        */

        if ($request->has ( 'search' )) {
            if ($request->input ( 'search.value' ) != '') {
                $searchTerm = $request->input ( 'search.value' );
                /*
                * Seach clause : we only allow to search on user_name field
                */
                $collectQuesions->where ( 'questions.name', 'like', '%' . $searchTerm . '%');
            }
        }

        if ($request->has ( 'order' )) {
            if ($request->input ( 'order.0.column' ) != '') {
                $orderColumn = $request->input ( 'order.0.column' );
                $orderDirection = $request->input ( 'order.0.dir' );
                $collectQuesions->orderBy ( $columns [intval ( $orderColumn )], $orderDirection );
            }
        }

        $collectQuesions = $collectQuesions->skip ( $start )->take ( $length );

        $collectQuesions = $collectQuesions->get();
        $data = array ();
        foreach ( $collectQuesions as $qs ) {
            $nestedData = array ();
            $nestedData [0] = "<input class='chk_child' id=".$qs->id." name='exam[choosen][".$qs->id."]' type='checkbox' value='".$qs->id."'>";
            $nestedData [1] = $qs->id;
            $nestedData [2] = $qs->name;
            $nestedData [3] = $qs->questionType["name"];
            $data [] = $nestedData;
        }
   
        // var_dump($data);
        // // print_r($arrQuestionExits);
        // exit();
        $tableContent = array (
                "draw" => intval ( $request->input ( 'draw' ) ), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
                "recordsTotal" => intval ( $totalData ), // total number of records
                "recordsFiltered" => intval ( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
                "data" => $data
        );
        return $tableContent;
    }

    public function adminGetOption(Request $request){
        $data = [];
        $data[ 'questionTypes'] = QuestionType::pluck('name','id');
        if (!empty($request->get('TYPE')))
        {
            $arr_type = $request->get('TYPE');
            foreach ($arr_type as $value) {
                switch ($value) {
                case 'ranks':
                    $licenseType = LicenseType::findorFail($request->get('object'));
                    $data[$value] = $licenseType->licenseranks->pluck('name','id') ; 
                    break;
                case 'exams':
                    $licenseRank = LicenseRank::findorFail($request->get('object'));
                     $data[$value] = $licenseRank->exams->pluck('name','id');
                   break;
                }
            }
           
        }
        return  $data;
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
        $exam =  new Exam();
        $exam->licenserank_id = $request->get('exam')["licenserank"];
        $exam->name           = $request->get('exam')["name"];
        $exam->isactive       = 1;
        if($exam->save() && $exam->id){
            $arrDetail = $request->get('exam')['choosen'];
            foreach ($arrDetail as $key => $value) {
               $examDetail = new ExamsDetail();
               $examDetail->exam_id = $exam->id;
               $examDetail->question_id = $value;
               $examDetail->save();
           }
        }
        return redirect()->route('admin.exam.edit', $exam->id);

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

    public function adminEdit($id){
        $exam = Exam::findorFail($id);
        $objRank = LicenseRank::findorFail($exam->licenserank_id);

        $questionTypes = QuestionType::pluck('name', 'id');
        $licenseRanks=LicenseRank::pluck('name', 'id');
        $licenseTypes=LicenseType::pluck('name', 'id');

       
        $arrQuestionExits = [];
        $arrObjExams = $objRank->exams->whereNotIn('id',$id);
        foreach ($arrObjExams as $key => $value) {
             $arrQuestionExits = array_merge($arrQuestionExits,$value->examsDetail->pluck('question_id')->toArray());
        } // lay nhung question ma da co exam cua rank $id.

        $collectQuesions = $objRank->licenseType->questions; // lay question cua Licentype do
        $questions = $collectQuesions->whereNotIn('id',$arrQuestionExits); 
        //lay question ma chua nam trong exam cua rank $id phu thuoc LType
        

        $breadcrumb = "Edit Exam";
        return view('backend.exam.edit')
            ->with(['breadcrumb'=>$breadcrumb,'exam' => $exam,'licenseRanks'=>$licenseRanks,'objRank'=>$objRank,
                    'questionTypes'=>$questionTypes,'licenseTypes'=>$licenseTypes,'questions'=>$questions]);
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
         $exam = Exam::findorFail($id);
         $exam->licenserank_id = $request->get('exam')["licenserank"];
         $exam->name           = $request->get('exam')["name"];
         $exam->isactive       = 1;
        if($exam->save() && $exam->id){
            $examDetail = $exam->examsDetail;
            foreach ($examDetail as  $value) {
               $value->delete();
            }

            if(!empty($request->get('exam')['question_selected_ids'])){
               $arrDetail = explode(',', $request->get('exam')['question_selected_ids']);
               foreach ($arrDetail as  $value) {
                   if(empty($value)) continue ;
                   $examDetail = new ExamsDetail();
                   $examDetail->exam_id = $exam->id;
                   $examDetail->question_id = $value;
                   $examDetail->save();
                 }
            }         
        }
        return redirect()->route('admin.exam.edit', $exam->id);

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
        $exam = Exam::findorFail($id);
        $exam->delete();
        return array("result"=>"success");
    }
}
