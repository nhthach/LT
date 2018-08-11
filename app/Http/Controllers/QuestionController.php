<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\LicenseType;
use App\QuestionType;
use App\LicenseRank;
use App\Exam;
use App\Answer;
use App\ExamsDetail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $breadcrumb = "Manage Question";
    }

    public function index()
    {
        //
    }

    public function adminIndex(){

        $questions = Question::with('questionType','licenseType')->get();
        $breadcrumb = "Manage Question";
        return view('backend.question',['breadcrumb'=>$breadcrumb,'questions' => $questions]);
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
        $question = new Question();
        $licenseType=LicenseType::pluck('name', 'id');
        $questiontypes=QuestionType::pluck('name', 'id');
        $licenseRanks= new LicenseRank();
        $exams = $licenseRanks->first()->exams->pluck('name', 'id');
        $breadcrumb = "Create Question";
        return view('backend.question.create')
            ->with(['breadcrumb'=>$breadcrumb,'question' => $question,
                    'licenseType'=>$licenseType,'questiontypes'=>$questiontypes,
                    'licenseRanks' => $licenseRanks, 'exams' => $exams]);
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
        $question = new Question();
        $question->questiontype_id = $request->get('question')["licenseType"];
        $question->licensetype_id  = $request->get('question')["questionType"];
        $question->name            = $request->get('question')["name"];
        $question->content         = $request->get('question')["content"];
        $question->suggestions     = $request->get('question')["suggestions"];
        $question->isactive        = self::convertBoolData(1);
        if($question->save() && $question->id){
            $arrAnsCur = $request->get('question')['answers'];
            foreach ($arrAnsCur as $key => $value){
                    $answer =new Answer();
                    $answer->question_id = $question->id;
                    $answer->correct     = self::convertBoolData(isset($value['correct']));
                    $answer->content     = $value['content'];
                    $answer->save();
            }
            $ex_detail = new ExamsDetail ();
            $ex_detail->exam_id = $request->get('question')["exam"]; 
            $ex_detail->question_id = $question->id; 
            $ex_detail->save();
        }
         return redirect()->route('admin.question.index');
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
        $question = Question::findorFail($id);
        $licenseType=LicenseType::pluck('name', 'id');
        $questiontypes=QuestionType::pluck('name', 'id');
        $breadcrumb = "Edit Question";

        $licenseRanks= LicenseRank::where('licensetype_id', $question->licensetype_id)->get()->pluck('name','id');

        return view('backend.question.edit')
            ->with(['breadcrumb'=>$breadcrumb,'question' => $question,
                    'licenseType'=>$licenseType,'questiontypes'=>$questiontypes,
                    'licenseRanks' => $licenseRanks]);
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

        $question = Question::findorFail($id);
        $question->questiontype_id = $request->get('question')["licenseType"];
        $question->licensetype_id  = $request->get('question')["questionType"];
        $question->name            = $request->get('question')["name"];
        $question->content         = $request->get('question')["content"];
        $question->suggestions     = $request->get('question')["suggestions"];
        $question->isactive        = self::convertBoolData($request->get('question')["isactive"]);

       if( $question->save() && $question->id ){
             $arrAnsCur = $request->get('question')['answers'];
             $arrAnsPre= $question->answers()->pluck('id')->toArray();
             foreach ($arrAnsCur as $key => $value){
                  $answer = Answer::find($key);  
                 if(!empty($answer)){
                      $answer->correct     = self::convertBoolData(isset($value['correct']));
                      $answer->content     = $value['content']; 
                      $answer->save();
                 }else{
                    $answer =new Answer();
                    $answer->question_id = $question->id;
                    $answer->correct     = self::convertBoolData(isset($value['correct']));
                    $answer->content     = $value['content'];
                    $answer->save();

                 }
                  
             }
            $arrAnsDel = self::isInArray($arrAnsCur,$arrAnsPre);

            if(!empty($arrAnsDel)){
                foreach ($arrAnsDel as $value) {
                      $answer = Answer::find($value); 
                       if(!empty($answer)) 
                            $answer->delete();
                }
            }

            $question->updateExamDetail($request->get('question')["exam"] );

        }

        return redirect()->route('admin.question.index');
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
        $question = Question::findorFail($id);
        $question->delete();
        return array("result"=>"success");
    }

    public function convertBoolData($value){
        return $result =  $value == 1 || $value ==true ? 1:0;
    }

    public function isInArray($array,$searchArray){
        if(empty($searchArray)) {return $array;}
        static $arr = array();
        $i = 0;
        foreach($array as $key =>$value){
            if(in_array($key,$searchArray)){
               array_push($arr, $key);
               $i ++;
            }
        }
        $searchArray = array_diff($searchArray,$arr);
        return $searchArray;
    }
}
