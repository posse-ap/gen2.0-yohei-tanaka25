'use strict';


// カレンダー
var sample = document.getElementById('sample');
var fp = flatpickr(sample, {
    enableTime: true,
    dateFormat: "Y-m-d",// フォーマットの変更
});

var showBtn1 = document.getElementById('open_modal_pc');
var showBtn2 = document.getElementById('open_modal_sp');
var closeBtn = document.getElementById('close_modal');
var popup = document.getElementById('modal_area');
var overlay = document.getElementById('overlay');

showBtn1.addEventListener('click', function(){
    popup.classList.add('show');
    overlay.classList.add('overlay');

});
showBtn2.addEventListener('click', function(){
    popup.classList.add('show');
    overlay.classList.add('overlay');


});

// ロード
var modal_main = document.getElementById('modal_main');
var load = document.getElementById('load');
var tweet1 = document.getElementById('tweet1');//pc版
var tweet2 = document.getElementById('tweet2');//sp版

closeBtn.addEventListener('click', function(){
    popup.classList.remove('show');
    overlay.classList.remove('overlay');
    load.classList.remove('show_load');
    modal_main.className = 'modal_main';
    tweet1.classList.remove('in_show');
    tweet2.classList.remove('in_show');
});



tweet1.addEventListener('click', function(){
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet1.classList.add('in_show');
});

tweet2.addEventListener('click', function(){
    modal_main.className = 'in_show'
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet2.classList.add('in_show');
});



