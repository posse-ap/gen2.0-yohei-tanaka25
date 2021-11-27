<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->query("SELECT * FROM questions");
    $posts = $stmt->fetchAll();
    // foreach ($posts as $post) {
    // printf(
    //     '%s %s' . PHP_EOL, 
    //     $post['id'], 
    //     $post['name']
    // );
    // }
    $stmtt = $pdo->query("SELECT * FROM choices");
    $posts = $stmtt->fetchAll();
    // foreach ($posts as $post) {
    // printf(
    //     '%s %s' . PHP_EOL, 
    //     $post['id'], 
    //     $post['question_id'], 
    //     $post['name']
    // );
    // }
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

$Data = $pdo->prepare('SELECT * FROM questions WHERE id=?');
$Data->execute(array($_REQUEST['id']));
$hyouji = $Data->fetch();

$Data1 = $pdo->prepare('SELECT * FROM choices WHERE id=?');
$Data1->execute(array($_REQUEST['id']));
$hyouji1 = $Data1->fetch();




?>









<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print($hyouji['name']);?></title>
</head>
<body>
    <div>
        <h1></h1>
        <img src="" alt="">
        <ul>
            <li><?php print($hyouji1['name']);?></li>
            <li><?php print($hyouji1['name']);?></li>
            <li><?php print($hyouji1['name']);?></li>
        </ul>
    </div>
    
</body>
</html>