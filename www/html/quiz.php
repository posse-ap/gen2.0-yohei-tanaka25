<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    // $stmt = $pdo->query("SELECT * FROM questions" );
    // $posts = $stmt->fetchAll();

    // $stmt = $pdo->query("SELECT * FROM choices");
    // $posts = $stmt->fetchAll();
    // echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

$id = $_GET['id'];

$choice = $pdo->prepare('SELECT * FROM choices WHERE big_question_id='.$id);
$choice->execute(array($_REQUEST['id']));
$choice_data = $choice->fetchAll();

$question = $pdo->prepare('SELECT * FROM questions WHERE big_question_id='.$id);
$question->execute(array($_REQUEST['id']));
$question_data = $question->fetchAll();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= print($question_data[0][1]); ?></title>
</head>
<body>
    <!-- ヘッダー -->
<header id="header">
  <div class="content-wrapper">
    <!-- ヘッダーの左部分の三本線 -->
    <a href="javascript:void(0);" id="open-menu" class="open-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -3 24 24">
        <path d="M0 0h24v24H0z" fill="none"></path>
        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
      </svg>
    </a>
    <!-- ヘッダーの左部分のkuizyマーク -->
    <h4>
      <a href="https://kuizy.net/">
        <svg width="67px" height="90px" viewBox="0 0 228 86" version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink">
          <desc>Kuizy</desc>
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <path
              d="M45.072,66 L31.824,66 C29.4559882,62.8639843 27.2160106,59.8880141 25.104,57.072 C23.2479907,54.6399878 21.4080091,52.1920123 19.584,49.728 C17.7599909,47.2639877 16.3360051,45.2960074 15.312,43.824 L15.312,36.912 L30.864,19.632 L44.592,19.632 L25.776,40.368 L45.072,66 Z M12.624,66 L0.336,66 L0.336,0.816 L12.624,0.816 L12.624,66 Z M83.616,19.632 L95.904,19.632 L95.904,66 L84.96,66 L83.616,59.952 C83.0399971,60.8480045 82.3040045,61.7119958 81.408,62.544 C80.5119955,63.3760042 79.4880058,64.1439965 78.336,64.848 C77.1839942,65.5520035 75.9360067,66.1119979 74.592,66.528 C73.2479933,66.9440021 71.8080077,67.152 70.272,67.152 C65.1519744,67.152 61.1840141,65.6800147 58.368,62.736 C55.5519859,59.7919853 54.144,55.4080291 54.144,49.584 L54.144,19.632 L66.432,19.632 L66.432,49.2 C66.432,52.1440147 67.0239941,54.2399938 68.208,55.488 C69.3920059,56.7360062 71.1999878,57.36 73.632,57.36 C75.6800102,57.36 77.5359917,56.7520061 79.2,55.536 C80.8640083,54.3199939 82.3359936,52.8800083 83.616,51.216 L83.616,19.632 Z M124.056,66 L111.768,66 L111.768,19.632 L124.056,19.632 L124.056,66 Z M117.912,0.144 C120.280012,0.144 122.103994,0.83199312 123.384,2.208 C124.664006,3.58400688 125.304,5.19999072 125.304,7.056 C125.304,8.91200928 124.664006,10.5279931 123.384,11.904 C122.103994,13.2800069 120.280012,13.968 117.912,13.968 C115.543988,13.968 113.720006,13.2800069 112.44,11.904 C111.159994,10.5279931 110.52,8.91200928 110.52,7.056 C110.52,5.19999072 111.159994,3.58400688 112.44,2.208 C113.720006,0.83199312 115.543988,0.144 117.912,0.144 Z M136.848,59.664 L158.16,28.272 L138.576,28.272 L138.576,19.632 L173.136,19.632 L173.136,25.968 L151.824,57.36 L173.904,57.36 L173.904,66 L136.848,66 L136.848,59.664 Z M215.496,58.8 C214.919997,59.6960045 214.168005,60.5599958 213.24,61.392 C212.311995,62.2240042 211.272006,62.9919965 210.12,63.696 C208.967994,64.4000035 207.704007,64.9599979 206.328,65.376 C204.951993,65.7920021 203.496008,66 201.96,66 C196.839974,66 192.872014,64.5280147 190.056,61.584 C187.239986,58.6399853 185.832,54.2560291 185.832,48.432 L185.832,19.632 L198.12,19.632 L198.12,48.048 C198.12,50.9920147 198.711994,53.0879938 199.896,54.336 C201.080006,55.5840062 202.887988,56.208 205.32,56.208 C207.36801,56.208 209.223992,55.6000061 210.888,54.384 C212.552008,53.1679939 214.023994,51.7280083 215.304,50.064 L215.304,19.632 L227.592,19.632 L227.592,62.256 C227.592,66.4160208 227.000006,69.9679853 225.816,72.912 C224.631994,75.8560147 223.01601,78.2559907 220.968,80.112 C218.91999,81.9680093 216.488014,83.3279957 213.672,84.192 C210.855986,85.0560043 207.816016,85.488 204.552,85.488 C200.903982,85.488 197.512016,85.0720042 194.376,84.24 C191.239984,83.4079958 188.616011,82.288007 186.504,80.88 L189.576,71.376 C191.752011,72.784007 193.991988,73.7759971 196.296,74.352 C198.600012,74.9280029 200.839989,75.216 203.016,75.216 C206.98402,75.216 210.055989,74.3040091 212.232,72.48 C214.408011,70.6559909 215.496,67.440023 215.496,62.832 L215.496,58.8 Z"
              id="kuizy" fill="#25ABD8"></path>
          </g>
        </svg></a>
    </h4>

    <!-- ヘッダーの右の部分 -->
    <div class="header-right">
      <a class="header-right-create" href="https://kuizy.net/prepare">クイズ・診断を作る</a>
      <a class="header-right-search" href="https://kuizy.net/search">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="3 1 20 20" fill="#fff">
          <path
            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
          </path>
          <path d="M0 0h24v24H0z" fill="none"></path>
        </svg>
        <span>検索</span>
      </a>
    </div>
  </div>
</header>

<!-- ヘッダーより下の部分 -->

<div class="tabbar-container">
  <ul class="tabbar">
    <li>
      <a href="/quiz">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-book svg-menu-selected">
          <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
          <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
        </svg>
        <span class="tab-selected">クイズ</span>
      </a>
    </li>
    <li>
      <a href="/analysis">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-file-text ">
          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
          <polyline points="14 2 14 8 20 8"></polyline>
          <line x1="16" y1="13" x2="8" y2="13"></line>
          <line x1="16" y1="17" x2="8" y2="17"></line>
          <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
        <span class="off">診断</span>
      </a>
    </li>
    <li>
      <a href="/sketch">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-pen-tool ">
          <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
          <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
          <path d="M2 2l7.586 7.586"></path>
          <circle cx="11" cy="11" r="2"></circle>
        </svg>
        <span class="off">お絵描き診断</span>
      </a>
    </li>
    <li>
      <a href="/me">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-log-in ">
          <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
          <polyline points="10 17 15 12 10 7"></polyline>
          <line x1="15" y1="12" x2="3" y2="12"></line>
        </svg>
        <span class="off">ログイン</span>
      </a>
    </li>
  </ul>
</div>
    
    <?php foreach ($choice_data as $choice_data){
        $shuffle_number = [0,1,2];
        shuffle($shuffle_number);
    ?>
    <div class="container">
        <div>
            <h1 class="title"> 
                <span class="under"><?php echo $choice_data['question_id'] ?>.この地名は</span>何と読む？
            </h1>
            <div>
                <img  class="pic" src="./quizy_image/<?php echo $choice_data['image']; ?>" alt="難読地名画像" >
            </div>
            <ul>
                <li class="choice" id="choice<?php  print($choice_data['question_id']) ?>_<?= $shuffle_number[0]?>" onclick="click_choices(<?php  print($choice_data['question_id']) ?>,<?= $shuffle_number[0]?>,0)"><?= $choice_data["choice$shuffle_number[0]"];?></li>
                <li class="choice" id="choice<?php  print($choice_data['question_id']) ?>_<?= $shuffle_number[1]?>" onclick="click_choices(<?php  print($choice_data['question_id']) ?>,<?= $shuffle_number[1]?>,0)"><?= $choice_data["choice$shuffle_number[1]"];?></li>
                <li class="choice" id="choice<?php  print($choice_data['question_id']) ?>_<?= $shuffle_number[2]?>" onclick="click_choices(<?php  print($choice_data['question_id']) ?>,<?= $shuffle_number[2]?>,0)"><?= $choice_data["choice$shuffle_number[2]"];?></li>
            </ul>
        </div>
        <div class="answer_box" id="answer_box<?php  print($choice_data['question_id']) ?>">
            <span class="answer">正解!</span>
            <p>正解は「<?php print($choice_data['choice0']);?>」です！</p>
        </div>
        <div class="non_answer_box" id="non_answer_box<?php  print($choice_data['question_id']) ?>">
            <span class="non_answer">不正解!</span>
            <p>正解は「<?php print($choice_data['choice0']);?>」です！</p>
        </div>
    </div>

        <?php }; ?>

<script src="quizy.js"></script>
</body>
</html>

