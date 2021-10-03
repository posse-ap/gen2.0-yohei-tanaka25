'use strict';
// 選択肢配列
let arr = new Array();
arr.push(['たかなわ','たかわ','こうわ']);
arr.push(['かめいど','かめど','かめと']);
arr.push(['こうじまち','おかとまち','かゆまち']);
arr.push(['おなりもん','おかどもん','ごせいもん']);
arr.push(['とどろき','たたりき','たたら']);
arr.push(['しゃくじい','いじい','せきこうい']);
arr.push(['ぞうしき','ざっしょく','ざっしき']);
arr.push(['おかちまち','ごしろちょう','みとちょう']);
arr.push(['ししぼね','しこね','ろっこつ']);
arr.push(['こぐれ','こばく','こしゃく']);


//画像配列
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

//ブラウザを読み込んだ後に発火する
//これによりcreatequestion関数も発火
function createhtml(){
    arr.forEach(function (question, index) {
      
        createquestion(index, question,0);
    });

}

//問題と選択肢を生成
function createquestion(questionNum,selectionList,correctNum){
    let contents = `<div>`
    +`<h1>${questionNum+1}.この地名はなんと読む？</h1>`
    +`<img src="${pic[questionNum]}">`
    +`<ul>`

    selectionList.forEach(function(selection,index){
        contents += `<li id="selection_${questionNum}_${index}" class="selections" name="selections_${questionNum}"`
                  +`onclick="click_choices(${questionNum},${index},${correctNum})">${selection}</li>`
    });

    contents += `<li  id="answer_box_${questionNum}" class="answer_box">`
    +`<div ></div>`
    +`<div>正解は「${arr[questionNum][0]}」です</div>`
    +`</li>`
    +`</ul>`
    +`</div>`
    document.getElementById('main').insertAdjacentHTML('beforeend', contents);
}

//クリック時の処理(onclick)
function click_choices(questionNum,optionNum,correctNum){
    //1回しか押せなくする処理 
    let selections_each = document.getElementsByName('selections_'+questionNum) ;
    selections_each.forEach(selections_each => {
        selections_each.style.pointerEvents = 'none';
     })

     //正誤判定
     if(optionNum===correctNum){


     }else if(optionNum===1){

     }else{

     };


 
}
window.onload = createhtml();