<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    // $stmt = $pdo->query("SELECT * FROM questions" );
    // $posts = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT * FROM choices");
    $posts = $stmt->fetchAll();
    // echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

$id = $_GET['id'];
// $Data = $pdo->prepare('SELECT * FROM questions WHERE big_question_id='.$id);
// $Data->execute(array($_REQUEST['id']));
// $image = $Data->fetchAll();

$choice = $pdo->prepare('SELECT * FROM choices WHERE big_question_id='.$id);
$choice->execute(array($_REQUEST['id']));
$choice_data = $choice->fetchAll();


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    
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

