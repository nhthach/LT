<template>
	<div class="question-item"  :id="'question-item-'+index">
		<li class="ex_ProQuiz_listItem">
		 	<h5 style="display: inline-block;" class="ex_ProQuiz_header">{{+index}}. Câu hỏi</h5>
		 	<span style="float: right;">1 điểm</span>
		 	<div style="clear: both;"></div>
		    <div class="ex_ProQuiz_question" style="margin: 10px 0 0 0;">
				<div class="ex_ProQuiz_question_text">
                    <p v-html="question.content"></p>
                </div>
                <ul class="ex_ProQuiz_questionList" data-question_id="141" data-type="multiple" ref="ulquestionItem">   
					 <li class="ex_ProQuiz_questionListItem" data-pos="0" v-for="(item,index) in question.answers">
					 	<span>{{index+1}}.{{item.correct}} </span> 
					 	<label>
					 		<input  class="ex_ProQuiz_questionInput" type="checkbox" :name='"ck_check_answer_"+question.id' :id='"ck_check_answer"' :value="item.correct" @change="checkItemCorrect">
                         	<span v-html="item.content"> </span> 
                         </label>
					 </li>
					 <div ref='result' class="alert" style="display: none;">
					  Kết quả: <strong><label>Sai</label></strong>
					</div>
                </ul>
		    </div>
		</li>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['question','index'],
		data(){
			return{
				
				result:false,
			}
		},
		methods:{
			checkItemCorrect(){
				// var arrChecked= [];
				// var allCheckBox  = this.$refs.ulquestionItem.querySelectorAll("input[type='checkbox'");
				// for (var i = 0; i < allCheckBox.length; i++) {
				// 	if(allCheckBox[i].value==1 && allCheckBox[i].checked){
				// 		arrChecked.push(true);
				// 	}else{
				// 		arrChecked.push(false);
				// 	}
				// }
				// console.log(ulquestionItem);
			}
		}
	}
</script>