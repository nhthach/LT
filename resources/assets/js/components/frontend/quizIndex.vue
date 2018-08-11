<template>
	<div>
		<div class="ex ex_option_license">
                    <div class="licentype" id="licensetype">
                        <div class="row" v-if="showDivLicenseType">  
	                        <div class="col-xs-6 col-md-6 col-centered " v-for="item in licensentypes">
	                                <div class="type border border-danger">
	                                    <div class="text-center" id="licensen_type">
	                                       <a v-on:click="getLicenseRanks(item)" >
	                                         <h4>{{item.name}}</h4>   
	                                             <img :src="item.img"  class="img-rounded" alt="" width="100%" >
                                           </a>
	                                    </div>
	                                </div>
	                        </div>
                            
                        </div>

                        <div id="license_rank">
                            <div class="row" v-if="showDivLicenseRank">
                                <div class="col-xs-12 col-md-12 col-centered "id="licenserank">
                                    <h4 class="exam-heading-h4">Các loại hạng của bằng lái {{licenseTypeName}}</h4>
                                    <div class="row" >
                                        <div class="col-md-3"  v-for="item in licenseranks">
                                            <div class="list-group" id="licenserank_list" >
                                              <a class="list-group-item list-group-item-action active center">
                                                Hạng: {{item.name}}
                                              </a>
                                              <a class="list-group-item list-group-item-action">Số đề hiện có: {{ item.examCount}}</a>
                                              <a class="list-group-item list-group-item-action">Số câu hỏi: {{item.nbquestion}}</a>
                                              <a class="list-group-item list-group-item-action">-- Kiến thức: {{item.qt_type_text}}</a>
                                              <a class="list-group-item list-group-item-action">-- Biển báo: {{item.qt_type_icon}}</a>
                                              <a class="list-group-item list-group-item-action">-- Sa hình: {{item.qt_type_pic}}</a>
                                              <a class="list-group-item list-group-item-action">Câu trả lời đúng: {{item.nbcorrect}}</a>
                                              <a class="list-group-item list-group-item-action">Thời gian làm: {{item.timework}} p</a>
                                              <a  v-on:click="getQuiz(item)" class="list-group-item list-group-item-danger active center">
                                                XÁC NHẬN
                                              </a>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="quiz_list">
                          <div v-if="showDivQuizz" >
                            <h4 class="exam-heading-h1">Tổng hợp các đề thi {{licenseTypeName}} hiện có của hệ thống</h4>
                            <div class="row" >
                                <div class="col-xs-12 col-md-12"id="quizs" >
                                    <a v-on:click="showQuizz(item)" type="button" class="btn quiz_button" v-for="item in quizs">{{item.name}}</a>
                                    <a v-on:click="showQuizz(null)" type="button" class="btn quiz_button">Ngẫu nhiên</a>
                                </div>
                            </div>
                          </div>  
                        </div>
                            
                    </div>
                    <hr v-if="showDivLicenseType">
                    <div id="ex-intro" class="ex intro">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="license-detail">
                                  <h3> PHẦN MỀM LUYỆN THI LÝ THUYẾT</h3>
                                    <p>Phần mềm lấy từ bộ đề thi sát hạch lý thuyết lái xe mô tô, ô tô năm 2017</p>
                                    <p>Phần mềm tương ứng với bộ câu hỏi luật giao thông đường bộ dùng cho học viên thi bằng lái hai bánh, bốn bánh</p>
                                    <p>Phần mềm được thiết kế tương thích với mọi loại thiết bị (máy tính để bàn, laptop, máy tính bảng, điện thoại) nhằm giúp học viên dễ dàng sử dụng.</p>
                                    <p>Bằng cách thực hành nhuần nhuyễn qua đề thi, bạn sẽ vượt qua phần thi sát hạch lý thuyết một cách dễ dàng.</p>
                                    <p>Trong quá trình ôn tập, bạn hãy thảo luận bằng cách comment ý kiến của mình bên dưới.</p>
                                </div>  
                            </div>
                        </div>
                    </div>
        </div>
        <div id="queston-list">
            <div class="ex ex_question"  v-if="showDivQuestionHeader">
            <h4 class="exam-heading-h4">Bạn đang tham gia khóa luyện đề thi {{licenseTypeName}} - Hạng {{licenseTypeName}} </h4>
            <div class="ex_question_header" id="ex_question_header" v-if="showDivQuestionHeader">
                    <div id="ex_question_header_lable" class="ex_question_header_lable">
                        <div class="time  doexam">
                            <div class="exam-info">Loại: {{licenseTypeName}}</div>
                            <div class="exam-info">Hạng: {{licenseRankName}}</div>
                            <div class="exam-info">Đề thi: {{quizName}} </div>
                            <div class="exam-info">Thời gian: {{timework}}</div>
                        </div>
                        <div class="doexam">
                            <div class="exam-info">Số câu: {{nbquestion}}</div>
                            <div class="exam-info">Đúng: {{nbcurrentcorrect}} </div>
                            <div class="exam-info">Sai: {{nbcurrentwrong}} </div>
                            <div class="exam-info">Kết quả: {{result}}  (<span>{{percent}} %</span>) </div>
                            <div class="exam-info">Share FB</div>
                        </div>
                         <input type="hidden" name="ip_licensen_type" id="ip_licensen_type" :value="licenseTypeId" >
                         <input type="hidden" name="ip_licensen_rank" id="ip_licensen_rank" :value="licenseRankId" >
                    </div> 
                    <div id="ex_question_header_progress" class="ex_question_header_progress">
                          <p>Thời gian còn lại:  <strong>{{minutes}} phút {{seconds}} giây </strong>.</p>
                        <div class="progress">
                            <div id="timework-progress" class="progress-bar progress-bar-danger" ></div>
                       </div>
                    </div>
                    <div id="ex_question_header_listquestion">
                       <div class="ex_question_header_listquestion">
                           <div class="ex_reviewDiv" style="display: block;">
                                <div class="ex_reviewQuestion" >
                                    <ol style="margin-top: 0px !important" ref="olreviewQuestion" data-type="multiple">
                                        <li v-on:click="reviewAnswer(nb)"  v-for="nb in nbquestion">{{nb}}</li>  
                                    </ol>
                                    <div style="top: 0px; display: block;"></div>
                                </div>
                                <div class="ex_reviewLegend">
                                    <ol>
                                       
                                        <!-- <li>
                                            <span class="ex_reviewColor" style="background-color: #2c0fa9;"></span>
                                            <span class="wpProQuiz_reviewText">Đã trả lời</span>
                                        </li> -->
                                         <li>
                                            <span class="ex_reviewColor" style="background-color: #6CA54C;"></span>
                                            <span class="wpProQuiz_reviewText">Đúng</span>
                                        </li>
                                        <li>
                                            <span class="ex_reviewColor ex_reviewQuestionWrong" style="background-color: #6CA54C;"></span>
                                            <span class="wpProQuiz_reviewText">Sai</span>
                                        </li>
                                       
                                    </ol>
                                    <span>*Chú ý: Thời gian sẽ được tính khi bạn bấm bắt đầu</span>
                                    <div style="clear: both;"></div>
                                </div>
                   
                           </div>
                       </div>
                       <div style="text-align: center;">
                            <input v-on:click="cancelQuiz()"class=" btn btn-danger" type="button" name="backRank" value="Hủy bỏ">
                            <input data-toggle="modal" data-target="#modalComfirm" class="ex_ProQuiz_button btn btn-success" type="button" name="restartQuiz" value="Làm lại" v-if="quizFinished">
                            <input  data-toggle="modal" data-target="#modalComfirm" class="ex_ProQuiz_button btn btn-success" type="button" name="startQuiz" value="Bắt đầu"  v-if="quizStart" >
                            
                            <input v-on:click="viewAnswer()" class="ex_ProQuiz_button btn btn-info" type="button" name="showAnswer" value="Xem đáp án" v-if="quizFinished">
                        </div>
                    </div>
            </div>
            <hr v-if="showDivQuestionContent">
            <!-- add content question -->
            <div id="ex_question_content" class="ex_question_content" v-if="showDivQuestionContent">
                <div style="text-align: left; display: block;" class="ex_ProQuiz_list">
                    <ol class="ex_ProQuiz_list">
                         <question v-for="(item,index) in questions"    :index="index+1" :question="item" :key="item.id"></question>    
                    </ol>
                </div>
            </div>
            <hr v-if="showDivQuestionContent">
            <div class="ex_question_footer" style="text-align: center;" v-if="showDivQuestionContent">
                <input v-if="!quizFinished" @click="finished()" class=" btn btn-primary" type="button" name="btQuizFinish" value="Xong">
            </div> 
            <div class="ex_question_footer" style="text-align: center;" v-if="showErrorLoadQuestion">
                <label>Hệ thống đang cập nhật câu hỏi. Vui lòng quay lại sau.</label>
            </div>
        </div>    
    </div>
        <!-- Modal -->
          <div class="modal fade" id="modalComfirm" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-body">
                  <p style="text-align: center;">
                    Xác nhận làm bài.<br> Đề {{quizName}} - Hạng {{licenseRankName}} - Loại {{licenseTypeName}}
                  </p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                  <input v-on:click="getQuestions()" class="ex_ProQuiz_button btn btn-info" type="button" name="startQuiz" value="Bắt đầu" data-dismiss="modal" >
                  <button type="button" class="btn btn-danger" id="btnCloseModal" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
          </div>
	</div>
</template>

<style type="text/css">
  .exam-heading-h4 {
	    font: 13px "Open Sans", Arial, sans-serif;
	    text-transform: uppercase;
	    border-left: 3px solid #e54e53;
	    padding-left: 14px;
	    line-height: 2;
	    margin-bottom: 20px;
	    font-weight: 600;
	}
	#licenserank_detaill, #quizs{
		text-align: center;
	}
	#licenserank_list, #licensen_type{
		cursor: pointer !important;
	}
    .fixed {
      position: fixed !important;
      top:0; left:0;
      width: 100%; 
      background: #eee;
      z-index:99;
    }
</style>

<script type="text/javascript">
	import question from '../frontend/quiz/question' 
	export default{
        components:{question},
		data(){
	 	  	return{
	 	  		licenseTypeId  : null,
	 	  		licenseRankId  : null,
	 	  		licenseTypeName: "",
	 	  		licenseRankName: "",
	 	  		quizId         : "",
	 	  		quizName	   : "",
	 	  		nbquestion   : 0,
	 	  		nbcorrect    : 0,
                nbcurrentcorrect: 0,
                nbcurrentwrong  :0,
	 	  		timework     : 0,
                result:"Loading..",
                percent: 0,
                positionDesciption: 0,
                positionQuestion: 0,

                showErrorLoadQuestion : false,
                showDivLicenseType    : true,
	 	  		showDivLicenseRank    : false,
	 	  		showDivQuizz	      : false,
	 	  		showDivQuestion   	  : false,
	 	  		showDivQuestionHeader : false,
	 	  		showDivQuestionContent: false,
                quizFinished          : false,
                quizStart             : true,

	 	  		licensentypes: [],
	 	  		licenseranks : [],
	 	  		quizs        : [],
	 	  		questions    : [],

                rightcolor: "#75ec75",
                wrongcolor: "#f16662",
                arrayScore: new Array(this.nbquestion),

                timeworkProgress: $("#timework-progress"),
                isRunning: false,
                totalTime: 0,
                time: 0,
                timer:null,
                minutes: 0,
                seconds: 0,
                timeOut:false,
                sound:new Audio("http://s1download-universal-soundbank.com/wav/nudge.wav")

	 	  	}
	 	  },
 	    beforeMount(){
 	      this.showDivLicenseRank = false;
 	      this.showDivQuizz      = false;
    	  this.getLicenseTypes()
         
    	},
 	    mounted(){
             this.positionDesciption = this.getPosition("queston-list")
	 	},
	 	methods: {
	 	    getLicenseTypes () {
	 	    	// /api/v1/licensentypes
	                axios.post('api/v1/licensentypes')
	                    .then((response) => {
	                        this.licensentypes = response.data
	                    })
	            },
             getLicenseRanks(obj) {
	            axios.post('api/v1/licenseranks',
	            {
	            	"lity":obj.id,
	            })
	            .then((response) => {
	                this.licenseranks = response.data
	            })
	            this.showDivLicenseRank = true
	            this.showDivQuizz   = false
	            this.licenseTypeId = obj.id
	            this.licenseTypeName = obj.name
                this.goToByScroll("license_rank")
            },
            getQuiz(obj){
            	 axios.post('api/v1/quizs',
	                {
	                	"lira":obj.id,
	                })
                    .then((response) => {
                        this.quizs = response.data
                })
                    this.showDivQuizz = true
                    this.licenseRankId = obj.id
	            	this.licenseRankName = obj.name
	            	this.timework    = obj.timework
	            	this.nbquestion  = obj.nbquestion
	            	this.nbcorrect   = obj.nbcorrect 	
                    this.goToByScroll('quiz_list')
            },
            showQuizz(obj){

                // this.goToByScroll('quiz_list')

                this.showDivLicenseType = false
                this.showDivLicenseRank = false
            	this.showDivQuestionHeader = true
                this.quizStart             = true
            	if(obj==null){
            		this.quizId =  null
            		this.quizName = "Ngẫu nhiên"
            	}else{
            		this.quizId =  obj.id
            		this.quizName = obj.name
            	}

                this.showDivQuizz  = false
                this.clearData()
                $('html,body').animate({scrollTop:this.positionDesciption},'slow');
                this.positionQuestion = this.getPosition("queston-list")
                if(this.positionDesciption+100<this.positionQuestion)
                    this.positionQuestion = this.positionDesciption+100
                    
            },
            getQuestions(){
        	 	    axios.post('api/v1/questions',
	                {
	                	"type": this.licenseTypeId,
	                	"rank": this.licenseRankId,
	                	"quiz": this.quizId,
	                })
                    .then((response) => {
                        if(response.data.type == "success" ){
                            this.clearData();
                        	this.questions  = response.data.data
                        	this.nbquestion = response.data.info.nbq
                        	this.nbcorrect  = response.data.info.nbc
                        	this.timework   = response.data.info.time
                            this.quizFinished = false
                            this.showDivQuestionContent = true
                            this.btStartQuiz   = false
                            this.btfinishExam = false
                            if(this.questions.length>0){
                                this.arrayScore = new Array(this.nbquestion)
                                this.time = parseInt(response.data.info.time)*60
                                this.totalTime =response.data.info.time

                                this.startCoutDownTimer();
                                this.showDivQuestionContent = true
                                this.showErrorLoadQuestion  = false
                                this.quizStart  = false
                               }else{
                                this.showDivQuestionContent = false
                                this.showErrorLoadQuestion  = true
                               }
                        }  
                	})
                     
                    $('html,body').animate({scrollTop:this.positionQuestion},'slow');
            },
            finished(){
                    if(!this.btfinishExam)  {
                        this.clearData();
                        this.checkCorrectAnswer();
                        for (var i = 0; i < this.arrayScore.length; i++) {
                            if(this.arrayScore[i]==true)
                                this.nbcurrentcorrect ++;
                            else 
                                this.nbcurrentwrong ++;
                        }
                         this.result = this.nbcorrect<=this.nbcurrentcorrect?"ĐẠT":"KHÔNG ĐẠT"
                         this.btfinishExam = true; 
                         this.stopTimer()
                         this.goToByScroll('queston-list')
                         this.quizFinished = true
                    }
                },
            checkCorrectAnswer(){
                var reviewQuestion = this.$refs.olreviewQuestion.childNodes;
                
                for (var i = 0; i < this.$children.length; i++) {
                  var arrCheckedItem= new Array();     
                  var allCheckBox  = this.$children[i].$refs.ulquestionItem.querySelectorAll("input[type='checkbox'");
                  var result = this.$children[i].$refs.result;
                 
                  for (var j = 0; j < allCheckBox.length; j++) {
                        if(allCheckBox[j].value==1){
                                if(allCheckBox[j].checked){
                                    arrCheckedItem.push(true);
                                }else{
                                    arrCheckedItem.push(false);
                                }
                            }else{
                                if(allCheckBox[j].checked){
                                    arrCheckedItem.push(false);
                                }
                            }       

                       if(allCheckBox[j].value==1)
                       {
                            allCheckBox[j].closest("li").setAttribute('style', 'background:'+this.rightcolor);
                        }
                        else 
                        {
                            allCheckBox[j].closest("li").setAttribute('style', 'background:'+this.wrongcolor) ;
                        }
                        allCheckBox[j].setAttribute("disabled","disabled");    
                  }
                  var isRight = false;
                    for (var x = 0; x < arrCheckedItem.length; x++) {
                        if (arrCheckedItem[x]==false) {
                            isRight = false;
                            break;
                        }else isRight=true;
                    }

                    result.setAttribute('style','display: block;');
                    if(isRight){
                        reviewQuestion[i].setAttribute('class','ex_reviewQuestionDid');
                        result.setAttribute('class','alert alert-success');
                        result.querySelector('label').innerHTML = "Đúng";  
                    }
                    else
                    {
                        result.setAttribute('class','alert  alert-danger');  
                        result.querySelector('label').innerHTML = "Sai";  
                        reviewQuestion[i].setAttribute('class','ex_reviewQuestionWrong');     
                    }
                    this.arrayScore[i] = isRight;  
                }
            },
            clearData(){
                    this.result ="Loading..";
                    this.nbcurrentcorrect = 0;
                    this.nbcurrentwrong = 0;
            },
            cancelQuiz(){
                this.questions = []
                this.showDivQuestionContent = false
                this.quizStart              = true
                this.quizFinished = false
                this.showDivQuizz  = true
                this.arrayScore = new Array(0)
                this.time = 0
                this.stopTimer()
                this.goToByScroll('quiz_list')
                $('#timework-progress').attr('style','width:0%');
                this.minutes = 0
                this.seconds = 0
            },
            viewAnswer(){
                this.goToByScroll('ex_question_content')
            },
            reviewAnswer(idquestion){
                if(this.quizFinished){
                    var id = "question-item-"+idquestion;
                    this.goToByScroll(id)
                }
               
            },
            startCoutDownTimer(){
                   if (!this.timer) {
                        this.timer = setInterval( () => {
                             this.minutes = parseInt(this.time/60);
                              this.seconds = Math.round((this.time/60 - this.minutes) * 60);
                              var withPercent = 100 - ((this.totalTime*60)-this.time)*100/(this.totalTime*60);
                              $('#timework-progress').attr('style','width:'+withPercent+'%');
                            if(this.time>0){
                                this.time--;
                                
                            }else{
                                clearInterval(this.timer)
                                this.sound.play()
                                this.secondes = 0
                                this.minutes = 0
                                // this.confirmFinish()
                                this.timeOut = true
                            }
                        },1000);
                        
                    }
            },
            offTimer () {
               
            },
            stopTimer () {
                 clearInterval(this.timer)
                 this.timer = null
                 this.sound.pause()
            },
            goToByScroll(id){
                id = id.replace("link", "");
                console.log(id)
                $('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
            },
            getPosition(id){
                id = id.replace("link", "");
                return $("#"+id).offset().top
            }
 	    },
        filters: {
             prettify : function(value) {
                let minutes = value;
                 if (minutes < 10) {
                    minutes = "0"+minutes
                 }

             }
            
        }   
 	       
	}
</script>