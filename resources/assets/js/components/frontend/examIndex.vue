<template>
	<div>
		<div class="ex ex_option_license">
                    <div class="licentype" id="licensetype">
                        <div class="row">  
	                        <div class="col-xs-6 col-md-6 col-centered " v-for="item in licensentypes">
	                                <div class="type border border-danger">
	                                    <div class="text-center">
	                                       <a v-on:click="getLicenseRanks(item)" >
	                                         <h4>{{item.name}}</h4>   
	                                             <img  :src="item.img"  class="img-rounded" alt="" width="150" height="150">
                                           </a>
	                                    </div>
	                                </div>
	                        </div>
                            
                        </div>
                        <div class="row" v-if="showDivLicenseRank">
                        	<div class="col-xs-12 col-md-12 col-centered "id="licenserank">
                        		<h4 class="exam-heading-h4">Các loại hạng của bằng lái</h4>
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
                        	
                    	<div class="row" v-if="showDivLicenseRank & showDivQuizz" >
                    		<h4 class="exam-heading-h4">Tổng hợp các đề thi hiện có của hệ thống</h4>
                			<div class="row" >
                				<div class="col-xs-12 col-md-12"id="quizs" >
                					<a v-on:click="showQuizz(item)" type="button" class="btn quiz_button" v-for="item in quizs">{{item.name}}</a>
                					<a v-on:click="showQuizz(null)" type="button" class="btn quiz_button">Ngẫu nhiên</a>
                				</div>
                			</div>
                    	</div>
                    </div>
                        <hr>
                    <div class="ex intro">
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
        <div class="ex ex_question" id="queston-list" v-if="showDivQuizz">
        	<h4 class="exam-heading-h4">Bạn đang tham gia khóa luyện đề thi {{licenseTypeName}} </h4>
        	<div class="ex_question_header" v-if="showDivQuestionHeader">
                    <div class="ex_question_header_lable">
                        <div class="time  doexam">
                            <div class="exam-info">Loại: {{licenseTypeName}}</div>
                            <div class="exam-info">Hạng: {{licenseRankName}}</div>
                            <div class="exam-info">Đề thi: {{quizName}} </div>
                            <div class="exam-info">Thời gian: {{timework}}</div>
                        </div>
                        <div class="doexam">
                            <div class="exam-info">Số câu: {{nbquestion}}</div>
                            <div class="exam-info">Đúng:  </div>
                            <div class="exam-info">Sai:  </div>
                            <div class="exam-info">Kết quả:  (<span>10%</span>) </div>
                            <div class="exam-info fb">Share FB</div>
                        </div>
                    </div> 
                    <div class="ex_question_header_progress" id="progress">
                        <p>Thời gian còn lại: <code>12 </code>phút.</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
                       </div>
                       <div class="ex_question_header_listquestion">
                           <div class="ex_reviewDiv" style="display: block;">
                                <div class="ex_reviewQuestion">
                                    <ol style="margin-top: 0px !important">
                                        <!-- <li class="ex_reviewQuestionWrong" v-for="nb in nbquestion">{{nb}}</li> -->
                                        <!-- <li class="ex_reviewQuestionDid">2</li> -->
                                        <li v-for="nb in nbquestion">{{nb}}</li>  
                                    </ol>
                                    <div style="top: 0px; display: block;"></div>
                                </div>
                                <div class="ex_reviewLegend">
                                    <ol>
                                       
                                        <li>
                                            <span class="ex_reviewColor" style="background-color: #6CA54C;"></span>
                                            <span class="wpProQuiz_reviewText">Đã trả lời</span>
                                        </li>
                                         <li>
                                            <span class="ex_reviewColor" style="background-color: #2c0fa9;"></span>
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
                            <input class=" btn btn-primary" type="button" name="backRank" value="Quay lại">
                            <input class="ex_ProQuiz_button btn btn-success" type="button" name="restartQuiz" value="Làm lại">
                            <input v-on:click="getQuestions()" class="ex_ProQuiz_button btn btn-success" type="button" name="startQuiz" value="Bắt đầu">
                            <input class="ex_ProQuiz_button btn btn-success" type="button" name="showAnswer" value="Xem đáp án">
                        </div>
                	</div>
            </div>
            <hr>
			<div class="ex_question_content" v-if="showDivQuestionContent">
				<div style="text-align: left; display: block;" class="ex_ProQuiz_list">
					<ol class="ex_ProQuiz_list">
						 
					</ol>
				</div>
			</div>
			<div class="ex_question_footer" style="text-align: center;" v-if="showDivQuestionContent">
                <input class=" btn btn-primary" type="button" name="finishQuiz" value="Xong">
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
	#licenserank_list{
		cursor: pointer !important;
	}
</style>

<script type="text/javascript">
	import quizIndex from '../frontend/quizIndex' 
	export default{
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
	 	  		timework     : 0,

	 	  		showDivLicenseRank    : false,
	 	  		showDivQuizz	      : false,
	 	  		showDivQuestion   	  : false,
	 	  		showDivQuestionHeader : false,
	 	  		showDivQuestionContent:false,

	 	  		licensentypes: [],
	 	  		licenseranks : [],
	 	  		quizs        : [],
	 	  		questions    : [],

	 	  	}
	 	  },
 	    beforeMount(){
 	      this.showDivLicenseRank = false;
 	      this.showDivQuizz      = false;
 	      // this.showQuestion    = false;
    	  this.getLicenseTypes()
    	},
 	    mounted(){
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
            },
            showQuizz(obj){
            	this.showDivQuestionHeader = true
            	if(obj==null){
            		this.quizId =  null
            		this.quizName = "Ngẫu nhiên"
            	}else{
            		this.quizId =  obj.id
            		this.quizName = obj.name
            	}
            	
            },
            getQuestions(){
            	 if (confirm("Xác nhận làm bài. Đề số ")) {
        	 	    axios.post('api/v1/questions',
	                {
	                	"type": this.licenseTypeId,
	                	"rank": this.licenseRankId,
	                	"quiz": this.quizId,
	                })
                    .then((response) => {
                        if(response.type == "success"){
                        	this.questions  = response.data
                        	this.nbquestion = response.info.nbq
                        	this.nbcorrect  = response.info.nbc
                        	this.timework   = response.info.time

                        }
                        
                	})
                    //this.showQuizz = true
            	 }
            },
            

 	    },
 	       
	}
</script>