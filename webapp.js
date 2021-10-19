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
                    ['', ''],
                    [1, 3],
                    [2, 4],
                    [3, 5],
                    [4, 3],
                    [5, 2],
                    [6, 1],
                    [7, 0],
                    [8, 2],
                    [9, 2],
                    [10, 8],
                    [11, 3],
                    [12, 2],
                    [13, 2],
                    [14, 1],
                    [15, 5],
                    [16, 0],
                    [17, 0],
                    [18, 0],
                    [19, 0],
                    [20, 0],
                    [21, 0],
                    [22, 0],
                    [23, 0],
                    [24, 0],
                    [25, 0],
                    [26, 0],
                    [27, 0],
                    [28, 0],
                    [29, 0],
                    [30, 0]

                ]);

                // オプションの設定
                var options = {
                    legend: { position: 'none' },
                    width: "100%",
                    height: '400',
                    bar: { groupWidth: "60%" },
                    hAxis: {
                        gridlines: { color: 'none', count: 3 },
                        ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],

                    },
                    vAxis: {
                        title: '', format: "#.#h",
                        minValue: 0,
                        gridlines: { color: 'none', count: 3 },
                        baselineColor: 'block',
                        textPosition: 'out',
                        ticks: [2, 4, 6, 8]
                    },
                };

                // 指定されたIDの要素に棒グラフを作成
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

                // グラフの描画
                chart.draw(data, options);
            }
           //学習言語円グラフ
            google.setOnLoadCallback(drawCircle_language);

            function drawCircle_language() {
                var data2 = new google.visualization.arrayToDataTable([
                    ['language', 'hour'],
                    ['javascript', 5.9],
                    ['css', 11.8],
                    ['php', 12],
                    ['html', 30],
                    ['laravel', 5],
                    ['sql', 20],
                    ['shell', 20],
                    ['others', 10]
                ]);

                var formatter2 = new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
                formatter2.format(data2, 1);

                var options2 = {
                    pieHole: 0.5,
                    legend: 'none',
                    colors: ['#2A54EF', '#1B71BD', '#21BDDE', '#3DCEFD', '#B39EF3', '#6D47EC', '#4A18EF', '#3107BF'],
                    width: '100%',
                    height: '254',
                    chartArea: { width: '100%', height: '100%', top: 0 },
                };

                var chart_languages = new google.visualization.PieChart(document.getElementById('chart_languages'));
                chart_languages.draw(data2, options2);
            }

            // 学習コンテンツ円グラフ
            google.setOnLoadCallback(drawCircle_content);

            function drawCircle_content() {
                var data = new google.visualization.arrayToDataTable([
                    ['language', 'hour'],
                    ['ドットインストール', 19.9],
                    ['N予備校', 11.8],
                    ['posse課題', 12],
                ]);

                var formatter= new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
                formatter.format(data, 1);

                var options = {
                    pieHole: 0.5,
                    legend: 'none',
                    colors: ['#2A54EF', '#1B71BD', '#21BDDE'],
                    width: '100%',
                    height: '254',
                    chartArea: { width: '100%', height: '100%', top: 0 },
                };
                var chart_contents = new google.visualization.PieChart(document.getElementById('chart_contents'));
                chart_contents.draw(data, options);
            }
// グラフの大きさを動的に変更
            window.onresize = function(){
    
                drawChart();
                drawCircle_language();
                drawCircle_content();
              }