
<?php
require("./dbconnect.php");

$stmt = $pdo->query("SELECT * FROM study_languages ");
$study_languages = $stmt->fetchAll();

$stmt = $pdo->query("SELECT * FROM study_contents ");
$study_contents = $stmt->fetchAll();

$stmt = $pdo->query(
    "SELECT study_hour
    FROM study_data
    WHERE DATE(study_date) = DATE(now()) 
    ORDER BY study_date;"
);
$today_study_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;

$stmt = $pdo->query(
    "SELECT SUM(study_hour) 
    FROM study_data
    WHERE DATE_FORMAT(study_date, '%Y%m') = DATE_FORMAT(now(), '%Y%m') "
);
$month_study_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;

$stmt = $pdo->query("SELECT*FROM study_data WHERE DATE_FORMAT(study_date, '%Y%m') = DATE_FORMAT(now(), '%Y%m') "
);
$chart_graph_data = $stmt->fetchAll();

// // print_r($chart_graph_data);


$stmt = $pdo->query(
	"SELECT SUM(study_hour) 
    FROM study_data;"
);
$all_study_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;

$stmt = $pdo->query(
	"SELECT *FROM study_data;"
);
$graph_data = $stmt->fetchAll();
// print_r($graph_data);

$stmt = $pdo->query(
	"SELECT *FROM study_data
	INNER JOIN study_languages ON study_languages.id = study_data.study_language_id;"
);
$graph_data_languages  = $stmt->fetchAll();

$stmt = $pdo->query(
	"SELECT *FROM study_data
	INNER JOIN study_contents ON study_contents.id = study_data.study_content_id;"
);
$graph_data_contents  = $stmt->fetchAll();

?>



<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Webアプリケーション</title>
	<link rel="stylesheet" href="webapp.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	
			
<body>
	<!-- ヘッダー -->
	<header>
		<div class="header_left">
			<img src="https://raw.githubusercontent.com/posse-ap/gen1.0-ph1-posseapp/hayashi/posseLogotouka.png"
			alt="posse_logo" class="posse_logo">
			<span class="header_left_text">4th week</span>
		</div>
		<div class="header_right">
			<button class="header_button pc" id="open_modal_pc">記録・投稿</button>
		</div>
	</header>
	
	<!-- メインコンテンツ -->
	<main>
		<div class="main">
			<!-- mainの左側 -->
			<div class="left">
				<!-- today部分 -->
				<div class="left_box">
					<div class="box">
						<p class="today">Today</p>
						<p class="hour_number"><?php print_r($today_study_time) ?></p>
						<p class="hour">hour</p>
					</div>
					<!-- month部分 -->
					<div class="box">
						<p class="month">Month</p>
						<p class="hour_number"><?php print_r($month_study_time) ?></p>
						<p class="hour">hour</p>
					</div>
					<!-- total部分-->
					<div class="box">
						<p class="total">Total</p>
						<p class="hour_number"><?php print_r($all_study_time) ?></p>
						<p class="hour">hour</p>
					</div>
				</div>
				<!-- ３box下のgraph部分 -->
				<!-- <img src="./image/graph1.png" alt="棒グラフ" class="hour_graph"> -->
				<div class="hour_graph_whole">
					<div id="chart_div" class="hour_graph"></div>
					<script type="text/javascript">
						google.load('visualization', '1', { 'packages': ['corechart'] });

// グラフを描画する為のコールバック関数を指定
google.setOnLoadCallback(drawChart);

// グラフの描画   
function drawChart() {
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable([
        ['day', 'hour', { role: 'style' }],
		<?php foreach($chart_graph_data as $graph_data){
			$date = $graph_data['study_date'];
			$date_day = date('j', strtotime($date));	
					?>
		[<?php echo $date_day ?>, <?php echo $graph_data['study_hour'] ?>, 'color: #76A7FA'],
		<?php }; ?>
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

					</script>
				</div>
			</div>
			
			<!-- mainの右側 -->
			<div class="right">
				<!-- 学習言語right1 -->
				<div class="right_box">
					<div class="right_contents">
						<h3 class="right_box_titles">学習言語</h3>
						<!-- 学習言語の円グラフ -->
						<div id="chart_languages" class="chart circle_graph1"></div>
						<script type="text/javascript">
google.load('visualization', '1', { 'packages': ['corechart'] });

// グラフを描画する為のコールバック関数を指定
google.setOnLoadCallback(drawCircle_language);

// グラフの描画   
function drawCircle_language() {
    // 配列からデータの生成
    var data2 = new google.visualization.arrayToDataTable([
        ['language', 'hour'],
		<?php foreach($graph_data_languages as $graph_data){
								?>
		['<?php echo $graph_data['study_language'] ?>', <?php echo $graph_data['study_hour'] ?>],
		<?php }; ?>
    ]);
    
    var formatter2 = new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
    formatter2.format(data2, 1);

    // オプションの設定
    var options2 = {
        pieHole: 0.5,
        legend: 'none',
        colors: [<?php foreach($graph_data_languages as $graph_data){
								?>
		'#<?php echo $graph_data['color'] ?>',<?php }; ?>],
								
        width: '100%',
        height: '254',
        chartArea: { width: '100%', height: '100%', top: 0 },
    };

    var chart_languages = new google.visualization.PieChart(document.getElementById('chart_languages'));
    chart_languages.draw(data2, options2);
};

</script>
						<!-- 言語の詳細 -->
						<div class="study_languages">
							<?php foreach($study_languages  as $study_language){
								?>
							<section class="study_items"><span class="circle" id="i_color<?php  print($study_language['color']) ?>"></span><?= $study_language['study_language']?></section>
							<?php }; ?>
						</div>
					</div>
					
					<!-- 学習コンテンツ right2 -->
					<div class="right_contents">
						<h3 class="right_box_titles">学習コンテンツ</h3>
						<!-- 学習コンテンツの円グラフ -->
						<div id="chart_contents" class="chart circle_graph2"></div>
						<script type="text/javascript">
						google.setOnLoadCallback(drawCircle_content);

function drawCircle_content() {
    var data = new google.visualization.arrayToDataTable([
        ['language', 'hour'],
		<?php foreach($graph_data_contents as $graph_data){
								?>
		['<?php echo $graph_data['study_content'] ?>', <?php echo $graph_data['study_hour'] ?>],
		<?php }; ?>
    ]);

    var formatter = new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
    formatter.format(data, 1);

    var options = {
        pieHole: 0.5,
        legend: 'none',
        colors: [<?php foreach($graph_data_contents as $graph_data){
								?>
		'#<?php echo $graph_data['color'] ?>',<?php }; ?>],
        width: '100%',
        height: '254',
        chartArea: { width: '100%', height: '100%', top: 0 },
    };
    var chart_contents = new google.visualization.PieChart(document.getElementById('chart_contents'));
    chart_contents.draw(data, options);
};

</script>
						<div>
							<?php foreach($study_contents as $study_content){
								?>
							<section class="study_items"><span class="circle" id="i_color<?php  print($study_content['color']) ?>"></span><?= $study_content['study_content']?></section>
							<?php }; ?>
						</div>
					</div>
				</div>
				
			</div>
			<!-- スマホ版のフッターと記録・投稿ボタン -->
			<footer class="footer sp">
				<h5 class="footer_text sp">＜ 2021年 10月 ＞</h5>
			</footer>
			<div class="sp">
				<button class="header_button sp" id="open_modal_sp">記録・投稿</button>
			</div>
			<!-- この中はpc版では見えてない -->
		</div>
	</main>
	<!--モーダル -->
	<div id="modal_area" class="modal_area">
		<div id="close_modal" class="close_modal">×</div>
		<!-- モーダルのメイン部分 -->
		<div class="modal_main" id="modal_main">

			<!-- モーダルの左側 -->
			<div class="modal_left">
				<!-- 学習日 -->
				<div class="modal_day">
					<h3 class="title">学習日</h3>
					<input type="text" class="modal_day_input" id="study_day">
				</div>
				<!-- 学習コンテンツ -->
				<div class="modal_study_contents">
					<h3 class="title">学習コンテンツ（複数選択可）</h3>
					<form class="modal_study_contents_all" name="study_contents">
					<?php foreach($study_contents as $study_content){
						?>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
						id="c_box<?php  print($study_content['id']) ?>"  valueonclick="chebg('c_box<?php  print($study_content['id']) ?>')"><span
						class="check_content Checkbox-fontas"><?php print_r($study_content["study_content"])?></span></label>
						
						<?php }; ?>
					</form>
				</div>
				<!-- 学習言語 -->
				<div class="modal_study_languages">
					<h3 class="title">学習言語（複数選択可）</h3>
					<form class="modal_study_languages_all" name="study_languages">
					<?php foreach($study_languages as $study_language){
						?>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
						id="c_box<?php  print($study_language['id']) ?>" onclick="chebg('c_box<?php  print($study_language['id']) ?>')"><span
						class="check_content Checkbox-fontas"><?php print_r($study_language["study_language"])?></span></label>
						
						<?php }; ?>
						
					</form>
				</div>
			</div>

			<!-- モーダルの右側 -->
			<div class="modal_right">
				<div class="modal_hour">
					<h3 class="title">学習時間</h3>
					<input type="text" class="modal_hour_input" id="study_hour">
				</div>

				<div class="modal_tweeter_comnent">
					<h3 class="title">Twitter用コメント</h3>
					<textarea id="tweet_box" class="modal_twitter_textarea" name="texts"></textarea>
				</div>

				<div class="twitter">
					<label class="twitter_label"><input type="checkbox" class="Checkbox tw" id="twitter_check_box"
					checked><span class="twitter_check Checkbox-fontas">Twitterにシェアする</span>
					</label>
				</div>
			</div>
			<div class="modal_footer sp">
				<button class="modal_footer_btn" id="tweet2">記録・投稿</button>
			</div>
		</div>
		<!-- ロード画面（記録・投稿ボタンをクリック時に出現 -->
		<div class="load" id="load">
			<svg id="loading" width="100" height="100" viewBox="0 0 100 100">
				<circle cx="50" cy="50" r="40" />
			</svg>
			<img id="loaded" src="./image/awesome.png" alt="" class="awesome">
		</div>
		<!-- モーダルのフッター -->
		<div class="modal_footer pc">
			<button class="modal_footer_btn" id="tweet1">記録・投稿</button>
		</div>
	</div>
	<!-- フッター -->
	<div id="overlay" class=""></div>
	<footer class="footer pc">
		<h5 class="footer_text">＜ 2021年 12月 ＞</h5>
	</footer>
	<script src="webapp.js"></script>
	
</body>

</html>

