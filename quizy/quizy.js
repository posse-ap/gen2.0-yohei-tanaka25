'use strict';
const loop = document.getElementById('loop');


//選択肢の配列
let classes = [['たかなわ','たかわ','こうわ'],//1問目の選択肢
               ['かめいど','かめど','かめと'],//2問目の選択肢
               ['こうじまち','おかとまち','かゆまち'],//3問目の選択肢
               ['おなりもん','おかどもん','ごせいもん'],//４問目の選択肢
               ['とどろき','たたりき','たたら'],//５問目の選択肢
               ['しゃくじい','いじい','せきこうい'],//６問目の選択肢
               ['ぞうしき','ざっしょく','ざっしき'],//７問目の選択肢
               ['おかちまち','ごしろちょう','みとちょう'],//８問目の選択肢
               ['ししぼね','しこね','ろっこつ'],//９問目の選択肢
               ['こぐれ','こばく','こしゃく'],//１０問目の選択肢
];



//画像の配列
let pic =['https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png',//画像１
          'https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png',//画像２
          'https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png',//画像3
          'https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png',//画像4
          'https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png',//画像5
          'https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png',//画像6
          'https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png',//画像7
          'https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png',//画像8
          'https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png',//画像9
          'https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png',//画像１0

];

//問題文・選択肢・解答ボックスをfor文で作成
let main  ;
for(let i=0; i<classes.length; i++  ){
  main += 
    '<div>'
    +'<h1 class="title"><span class="under">' + [i+1] +'.この地名は</span>なんて読む？</h1>'//問題１を１０個表示
    +'<div class="pic" style="text-align: center">'
    +'<img src="'+pic[i] +'" alt="問題画像" width="100%"></div>' //各問ごとに画像を表示
    +'<ul>'
    +'<li class="choice" id ="choice'+[i]+'1" onclick="click_choices('+[i]+',0,0)" ><b>' + classes[i][0] +'</b></li>'//選択肢の表示
    +'<li class="choice" id ="choice'+[i]+'2" onclick="click_choices('+[i]+',1,0)"><b>' + classes[i][1]+'</b></li>'//選択肢の表示
    +'<li class="choice" id ="choice'+[i]+'3" onclick="click_choices('+[i]+',2,0)"><b>' + classes[i][2]+'</b></li>'//選択肢の表示
    +'</ul>'
    +'</div> </div> '
    //正解ボックス(初めは見えていない)
    +'<div class="answer_box" id="answer_box'+[i]+'">'
    +'<span class="answer">正解!</span>'
    +'<p>正解は ' + classes[i][0] + 'です！</p></div>'
    //不正解ボックス(初めは見えていない)
    +'<div class="non_answer_box" id= "non_answer_box'+[i]+'">'
    +'<span class="non_answer">不正解！</span>'
    +'<p>正解は' + classes[i][0] + 'です！</p>'
    +'</div>'
  //mainをhtml上に表示
  loop.innerHTML  = main;

}




//1問目から１０問目までの正誤判定
function click_choices(quizNum,optionNum,correctNum){
  let choice1 = document.getElementById("choice" + quizNum + "1");
  let choice2 = document.getElementById("choice" + quizNum + "2");
  let choice3 = document.getElementById("choice" + quizNum + "3");
  let answer_box  = document.getElementById("answer_box" + quizNum );
  let non_answer_box  = document.getElementById("non_answer_box" + quizNum );

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
}

  