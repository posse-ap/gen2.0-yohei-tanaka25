
const loop = document.getElementById('loop');

//選択肢の配列
let classes = [['たかなわ','こうわ','たかわ'],//1問目の選択肢
               ['かめど','かめいど','かめと'],//2問目の選択肢
               ['おかとまち','こうじまち','かゆまち'],//3問目の選択肢
               ['おなりもん','おかどもん','ごせいもん'],//４問目の選択肢
               ['たたら','たたりき','とどろき'],//５問目の選択肢
               ['いじい','しゃくじい','せきこうい'],//６問目の選択肢
               ['ざっしき','ざっしょく','ぞうしき'],//７問目の選択肢
               ['みとちょう','ごしろちょう','おかちまち'],//８問目の選択肢
               ['ししぼね','しこね','ろっこつ'],//９問目の選択肢
               ['こしゃく','こばく','こぐれ'],//１０問目の選択肢
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

]


let main  ;
for(let i=0; i<10; i++  ){
  main += '<div> <h2 class="title"><span class="under">' + [i+1] +'.この地名は</span>なんて読む？</h2>'//問題１を１０個表示
  +'<div class="pic" style="text-align: center">'
  +'<img src="'+pic[i] +'" alt="問題画像" width="100%"></div>' //各問ごとに画像を表示
  +'<ul><li class="choice" id ="choice1"><b>' + classes[i][0] +'</b>'
  +'</li><li class="choice" id ="choice2"><b>' + classes[i][1]+'</b>'
  +'</li><li class="choice" id ="choice3"><b>' + classes[i][2]+'</b>'
  +'</li></ul></div> </div> '
  loop.innerHTML  = main;
   //何問目かを表示
  document.write(i);


}
 
'<div class="answer_box" id="answer_box">'
+'<span class="answer">正解!</span>'
+'<p>正解は「たかなわ」です！</p>'
+'</div><div class="non_answer_box" id= "non_answer_box">'
+'<span class="non_answer">不正解！</span>'
+'<p>正解は「たかなわ」です！</p></div> '
 
const choice1= document.getElementById('choice1');
const choice2= document.getElementById('choice2');
const choice3= document.getElementById('choice3');
const answer_box= document.getElementById('answer_box');
const non_answer_box= document.getElementById('non_answer_box');

 
// choice1を押した時の処理 不正解
choice1.addEventListener('click' ,function(){
    choice1.style.background='#FE5129';
    choice1.style.color='#ffffff';
    choice2.style.background='#2A7CFE';
    choice2.style.color='#ffffff';

    non_answer_box.style="display: block;";
})
// choice２を押した時の処理 正解
choice2.addEventListener('click' ,function(){ 
    choice2.style.background='#2A7CFE';
    choice2.style.color='#ffffff';
    
    answer_box.style="display: block;";
})
// choice３を押した時の処理 不正解
choice3.addEventListener('click' ,function(){
    choice3.style.background='#FE5129';
    choice3.style.color='#ffffff';
    choice2.style.background='#2A7CFE';
    choice2.style.color='#ffffff';

    non_answer_box.style="display: block;";
})



