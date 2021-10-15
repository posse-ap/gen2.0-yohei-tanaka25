'use strict';

// function popupImage() {
//     var popup = document.getElementById('modal_area');
//     if(!popup) return;
  
//     var blackBg = document.getElementById('js-black-bg');
//     var closeBtn = document.getElementById('close_modal');
//     var showBtn = document.getElementById('open_modal');
  
//     closePopUp(blackBg);
//     closePopUp(closeBtn);
//     closePopUp(showBtn);
//     function closePopUp(elem) {
//       if(!elem) return;
//       elem.addEventListener('click', function() {
//         popup.classList.add('show');
//       });
//     }
//   }
//   popupImage();


var showBtn = document.getElementById('open_modal');
var closeBtn = document.getElementById('close_modal');
var popup = document.getElementById('modal_area');
var overlay = document.getElementById('overlay');

showBtn.addEventListener('click', function(){
    popup.classList.add('show');
    overlay.classList.add('overlay');

});

closeBtn.addEventListener('click', function(){
    popup.classList.remove('show');
    overlay.classList.remove('overlay');
});

// カレンダー
var sample = document.getElementById('sample');
var fp = flatpickr(sample, {
    enableTime: true,
    dateFormat: "Y-m-d",// フォーマットの変更
});

// ロード
var modal_main = document.getElementById('modal_main');
var load = document.getElementById('load');
var tweet = document.getElementById('tweet');
// var awesome = document.getElementById('awesome');

tweet.addEventListener('click', function(){
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet.classList.add('in_show');
    // awesome.classList.add('show_awesome');

});



