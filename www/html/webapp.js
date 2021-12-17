'use strict';


//ファーストビューの記録・投稿ボタンを押した時の処理
var showBtn1 = document.getElementById('open_modal_pc');//pc版
var showBtn2 = document.getElementById('open_modal_sp');//sp版
var closeBtn = document.getElementById('close_modal');
var popup = document.getElementById('modal_area');//モーダル
var overlay = document.getElementById('overlay');//モーダル出現時のグレー背景

//pc版(ファーストビューにある記録投稿ボタンをクリック時にモーダルとその後ろのグレー背景を表示)
showBtn1.addEventListener('click', function () {
    popup.classList.add('show');
    overlay.classList.add('overlay');
});
//sp版(ファーストビューにある記録投稿ボタンをクリック時にモーダルとその後ろのグレー背景を表示)
showBtn2.addEventListener('click', function () {
    popup.classList.add('show');
    overlay.classList.add('overlay');
});


// モーダル画面内の処理

// カレンダー（学習日のインプットタグの中にflatpickerでカレンダーを読み込む）
var study_day = document.getElementById('study_day');
var fp = flatpickr(study_day, {
    enableTime: true,
    dateFormat: "Y-m-d",// フォーマットの変更
});

//チェック時に背景色を変更
function chebg(chkID){
    var  Myid=document.getElementById(chkID);
    if(Myid.checked){
    Myid.parentNode.style.backgroundColor = '#C6E5FF';
}else{Myid.parentNode.style.backgroundColor = '#f4f5f9';}
    };

var modal_main = document.getElementById('modal_main');//モーダルのメイン部分
var load = document.getElementById('load');//ロード
var loading = document.getElementById('loading');//ローディング中画像
var loaded = document.getElementById('loaded');//ロード完了画像
var tweet1 = document.getElementById('tweet1');//pc版
var tweet2 = document.getElementById('tweet2');//sp版
var twitter_check_box = document.getElementById('twitter_check_box');//Twitter用コメント
var input = document.getElementsByTagName('input');

//pc版（モーダルないの記録投稿ボタンをクリック時にローディング画面を表示するとともに約3秒ごにロード完了画面、twitter_checked関数を発火させる）
tweet1.addEventListener('click', function () {
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet1.classList.add('in_show');

    setTimeout(() => {
        loading.classList.add('in_show');
        loaded.style.display = 'block';
        twitter_checked();
    }, 3300);
});

//sp版（モーダルないの記録投稿ボタンをクリック時にローディング画面を表示するとともに約3秒ごにロード完了画面、twitter_checked関数を発火させる）
tweet2.addEventListener('click', function () {
    modal_main.className = 'in_show'
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet2.classList.add('in_show');

    setTimeout(() => {
        loading.classList.add('in_show');
        loaded.style.display = 'block';
        twitter_checked();
    }, 3300);
});


//ツイート処理
//ツイート投稿内容に入力されたテキストを取得するとともに、ツイートのチェックボックスがチェックされている場合にはその内容が反映されたtwitter画面へと飛ぶ
function twitter_checked() {
    let twitter_text = document.getElementById("tweet_box").value;//Twitterようコメントの内容
    if (twitter_check_box.checked) window.open("https://twitter.com/intent/tweet?text=" + twitter_text);//チェックされている場合にTwitterに飛ぶ＋内容も反映
};

var ElementsCount1 = document.study_contents.elements.length;//モーダルの1つ目のインプットタグ一覧
var ElementsCount2 = document.study_languages.elements.length;//モーダルの２目のインプットタグ一覧
var texts = document.getElementById('tweet_box');//Twitter用コメント
var study_hour = document.getElementById('study_hour');//学習時間
var checked = document.getElementsByName('checked');

//クローズ（×）ボタンを押した時の処理
closeBtn.addEventListener('click', function () {
    popup.classList.remove('show');
    overlay.classList.remove('overlay');
    load.classList.remove('show_load');
    modal_main.className = 'modal_main';
    tweet1.classList.remove('in_show');
    tweet2.classList.remove('in_show');
    loading.classList.remove('in_show');
    loaded.style.display = 'none';
    //選択したチェックボックス の背景色を元に戻す
    checked.forEach(e => {
        e.style.background ="#f4f5f9" ;     
    });
    
    texts.value = '';       //記入内容をリセット
    study_day.value = '';//記入内容をリセット
    study_hour.value = '';//記入内容をリセット

    for (let i = 0; i < ElementsCount1; i++) {
        document.study_contents.elements[i].checked = false; // チェック内容をリセット
    }
    for (let i = 0; i < ElementsCount2; i++) {
        document.study_languages.elements[i].checked = false; //チェック内容をリセット
    }
});


// グラフ
// ライブラリのロード
// name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
google.load('visualization', '1', { 'packages': ['corechart'] });

// グラフを描画する為のコールバック関数を指定
google.setOnLoadCallback(drawChart);

// グラフの描画   
function drawChart() {
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable([
        ['day', 'hour', { role: 'style' }],
        [1, 3, 'color: #76A7FA'],
        [2, 4, 'color: #76A7FA'],
        [3, 5, 'color: #76A7FA'],
        [4, 3, 'color: #76A7FA'],
        [5, 2, 'color: #76A7FA'],
        [6, 1, 'color: #76A7FA'],
        [7, 0, 'color: #76A7FA'],
        [8, 2, 'color: #76A7FA'],
        [9, 2, 'color: #76A7FA'],
        [10, 8, 'color: #76A7FA'],
        [11, 3, 'color: #76A7FA'],
        [12, 2, 'color: #76A7FA'],
        [13, 2, 'color: #76A7FA'],
        [14, 1, 'color: #76A7FA'],
        [15, 5, 'color: #76A7FA'],
        [16, 0, 'color: #76A7FA'],
        [17, 0, 'color: #76A7FA'],
        [18, 0, 'color: #76A7FA'],
        [19, 0, 'color: #76A7FA'],
        [20, 0, 'color: #76A7FA'],
        [21, 0, 'color: #76A7FA'],
        [22, 0, 'color: #76A7FA'],
        [23, 0, 'color: #76A7FA'],
        [24, 0, 'color: #76A7FA'],
        [25, 0, 'color: #76A7FA'],
        [26, 0, 'color: #76A7FA'],
        [27, 0, 'color: #76A7FA'],
        [28, 0, 'color: #76A7FA'],
        [29, 0, 'color: #76A7FA'],
        [30, 0, 'color: #76A7FA']
    ]);

    // オプションの設定
    var options = {
        legend: { position: 'none' },
        width: "100%",
        height: '400',
        bar: { groupWidth: "60%" },
        //x軸
        hAxis: {
            gridlines: { color: 'none' },
            ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],
            titleTextStyle: { color: '#137DC4' }
        },
        //y軸
        vAxis: {
            title: '', format: "#.#h",
            minValue: 0,
            gridlines: { color: 'none' },
            baselineColor: 'block',
            textPosition: 'out',
            ticks: [2, 4, 6, 8]
        },
    };
    // 指定されたIDの要素に棒グラフを作成
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    // グラフの描画
    chart.draw(data, options);
};

// グラフの大きさを動的に変更
// window.onresize = function () {
//     drawChart();
//     drawCircle_language();
//     drawCircle_content();
// };