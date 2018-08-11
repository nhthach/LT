<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\LicenseType;
use App\LicenseRank;
use App\Exam;
use App\ExamsDetail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function loadQuestion(Request $request){
        $response = array();
        $quizId = $request["quiz"];
        $rankId = $request["rank"];
        $typeId = $request["type"];

        $objRank = LicenseRank::with('LicenseType')->where(array(['id','=',$rankId],['licensetype_id','=',$typeId]))->first();
        
        if($objRank->id && $objRank->licenseType["id"]==$typeId)
        {    
            $response['info']['nbq']  = $objRank['nbquestion'];
            $response['info']['nbc']  = $objRank['nbcorrect'];
            $response['info']['time'] = $objRank['timework'];

            $arrQuestionText =  Question::with('answers')->where(
                                                    array(['licensetype_id', '=', $typeId],
                                                    ['questiontype_id', '=', 1]
                                                    ));// lay cau hoi text
            $arrQuestionIcon =  Question::with('answers')->where(
                                                array(['licensetype_id', '=', $typeId],
                                                ['questiontype_id', '=', 2]));
            $arrQuestionPic  =  Question::with('answers')->where(
                                                array(['licensetype_id', '=', $typeId],
                                                ['questiontype_id', '=', 3]));
            if($quizId==null || $quizId==""){

                // $arrQuestionText->orderByRaw('RAND()')->take($objRank['qt_type_text']);
                // $arrQuestionIcon->orderByRaw('RAND()')->take($objRank['qt_type_icon']);
                // $arrQuestionPic->orderByRaw('RAND()')->take($objRank['qt_type_pic']);   
                $arrQuestionText->orderByRaw('RANDOM()')->take($objRank['qt_type_text']);
                $arrQuestionIcon->orderByRaw('RANDOM()')->take($objRank['qt_type_icon']);
                $arrQuestionPic->orderByRaw('RANDOM()')->take($objRank['qt_type_pic']);   
                
            }else{

                $objQuiz = Exam::findOrFail($quizId);
                if(!empty($objQuiz)){
                    $arrExam = ExamsDetail::where(array(['exam_id','=',$objQuiz->id]))->get(['question_id'])->toArray();

                    $arrQuestionText->whereIn('id', $arrExam);
                    $arrQuestionIcon->whereIn('id', $arrExam);
                    $arrQuestionPic->whereIn('id', $arrExam);   
                }else{
                    $response["type"] = "error";
                    $response["msg"]  = "Đề thi không hợp lệ";
                }
               
            }
            $response["type"] = "success";
            $response["data"] = array_merge($arrQuestionText->get()->toArray(),
                                        $arrQuestionIcon->get()->toArray(),
                                        $arrQuestionPic->get()->toArray());
             $response["msg"]  = "";

        }else{
             $response["type"] = "error";
             $response["msg"]  = "Giá trị không hợp lệ";
        }
        
        return $response;

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
}
