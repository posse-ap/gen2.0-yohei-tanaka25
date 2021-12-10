
<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    // $stmt = $pdo->query("SELECT * FROM questions" );
    // $posts = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT * FROM study_contents");
    $posts = $stmt->fetchAll();
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

// $id = $_GET['id'];
// $choice = $pdo->prepare('SELECT * FROM choices WHERE big_question_id='.$id);
// $choice->execute(array($_REQUEST['id']));
// $choice_data = $choice->fetchAll();


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
						<p class="hour_number">3</p>
						<p class="hour">hour</p>
					</div>
					<!-- month部分 -->
					<div class="box">
						<p class="month">Month</p>
						<p class="hour_number">120</p>
						<p class="hour">hour</p>
					</div>
					<!-- total部分-->
					<div class="box">
						<p class="total">Total</p>
						<p class="hour_number">1348</p>
						<p class="hour">hour</p>
					</div>
				</div>
				<!-- ３box下のgraph部分 -->
				<!-- <img src="./image/graph1.png" alt="棒グラフ" class="hour_graph"> -->
				<div class="hour_graph_whole">
					<div id="chart_div" class="hour_graph"></div>
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
						<!-- 言語の詳細 -->
						<div class="study_languages">
							<section class="study_items"><span class="circle" id="i_color1754EF"></span>JavaScrpt</section>
							<section class="study_items"><span class="circle" id="i_color1071BD"></span>CSS</section>
							<section class="study_items"><span class="circle" id="i_color20BEDE"></span>PHP</section>
							<section class="study_items"><span class="circle" id="i_color3CCEFE"></span>HTML</section>
							<section class="study_items"><span class="circle" id="i_colorB29EF3"></span>Laravel</section>
							<section class="study_items"><span class="circle" id="i_color6D46EC"></span>SQL</section>
							<section class="study_items"><span class="circle" id="i_color4A18EF"></span>SHELL</section>
							<section class="study_items"><span class="circle" id="i_color3105C0"></span>情報システム基礎知識（その他）</section>
						</div>
					</div>

					<!-- 学習コンテンツ right2 -->
					<div class="right_contents">
						<h3 class="right_box_titles">学習コンテンツ</h3>
						<!-- 学習コンテンツの円グラフ -->
						<div id="chart_contents" class="chart circle_graph2"></div>
						<div>
							<section class="study_contents"><span class="circle" id="s_color1754EF"></span>ドットインストール</section>
							<section class="study_contents"><span class="circle" id="s_color1071BD"></span>N予備校</section>
							<section class="study_contents"><span class="circle" id="s_color20BEDE"></span>POSSE課題</section>
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
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box1" onclick="chebg('c_box1')"><span
								class="check_content Checkbox-fontas">N予備校</span></label>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box2" onclick="chebg('c_box2')"><span
								class="check_content Checkbox-fontas">ドットインストール</span></label>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box3" onclick="chebg('c_box3')"><span
								class="check_content Checkbox-fontas">POSSE課題</span></label>
					</form>
				</div>
				<!-- 学習言語 -->
				<div class="modal_study_languages">
					<h3 class="title">学習言語（複数選択可）</h3>
					<form class="modal_study_languages_all" name="study_languages">
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box4" onclick="chebg('c_box4')"><span
								class="check_language Checkbox-fontas">HTML</span></label>
						<label class="modal_study_languages_check " name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box5" onclick="chebg('c_box5')"><span
								class="check_language Checkbox-fontas">CSS</span></label>
						<label class="modal_study_languages_check " name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box6" onclick="chebg('c_box6')"><span
								class="check_language Checkbox-fontas">JavaScrpt</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box7" onclick="chebg('c_box7')"><span
								class="check_language Checkbox-fontas">PHP</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box8" onclick="chebg('c_box8')"><span
								class="check_language Checkbox-fontas">Laravel</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box9" onclick="chebg('c_box9')"><span
								class="check_language Checkbox-fontas">SQL</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box10" onclick="chebg('c_box10')"><span
								class="check_language Checkbox-fontas">SHELL</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box11" onclick="chebg('c_box11')"><span
								class="check_language Checkbox-fontas">情報システム基礎知識（その他）</span></label>
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
		<h5 class="footer_text">＜ 2021年 10月 ＞</h5>
	</footer>

	<script src="webapp.js"></script>
</body>

</html>