'use strict';

//1問目から１０問目までの正誤判定
function click_choices(quizNum,optionNum,correctNum){
  let choice1 = document.getElementById("choice" + quizNum + "_0");
  let choice2 = document.getElementById("choice" + quizNum + "_1");
  let choice3 = document.getElementById("choice" + quizNum + "_2");
  let answer_box  = document.getElementById("answer_box" + quizNum );
  let non_answer_box  = document.getElementById("non_answer_box" + quizNum );
  console.log(choice1)

if(optionNum === correctNum){
  //正解を選択した際の処理
  choice1.style.background='#2A7CFE';
  choice1.style.color='#ffffff';
  choice1.classList.add("once-point");
  choice2.classList.add("once-point");
  choice3.classList.add("once-point");
  answer_box.style="display: block;";

}else if(optionNum === 1){
  //不正解の際の処理１
  choice2.style.background='#FE5129';
  choice2.style.color='#ffffff';
  choice1.style.background='#2A7CFE';
  choice1.style.color='#ffffff';
  choice1.classList.add("once-point");
  choice2.classList.add("once-point");
  choice3.classList.add("once-point");
  non_answer_box.style="display: block;";

}else{
  //不正解の際の処理２
  choice3.style.background='#FE5129';
  choice3.style.color='#ffffff';
  choice1.style.background='#2A7CFE';
  choice1.style.color='#ffffff';
  choice1.classList.add("once-point");
  choice2.classList.add("once-point");
  choice3.classList.add("once-point");
  non_answer_box.style="display: block";   

}
  
};
