<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->query("SELECT * FROM questions");
    $posts = $stmt->fetchAll();

    $stmtt = $pdo->query("SELECT * FROM choices");
    $posts = $stmtt->fetchAll();
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

$Data = $pdo->prepare('SELECT * FROM questions');
$Data->execute(array($_REQUEST['id']));
$hyouji = $Data->fetchAll();

$choice = $pdo->prepare('SELECT * FROM choices ');
$choice->execute(array($_REQUEST['id']));
$choice_data = $choice->fetchAll();


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
    <!-- <?php
    print_r($choice_data);
    ?> -->
    <div>
        <h1></h1>
        <img src="./quizy_image/<?php echo $hyouji[0]['image']; ?>" alt="">
        <ul>
            <li><?php print($choice_data[0]['name']);?></li>
            <li><?php print($choice_data[1]['name']);?></li>
            <li><?php print($choice_data[2]['name']);?></li>
        </ul>
    </div>
    <div>
        <h1></h1>
        <img src="./quizy_image/<?php echo $hyouji[1]['image']; ?>" alt="">
        <ul>
            <li><?php print($choice_data[3]['name']);?></li>
            <li><?php print($choice_data[4]['name']);?></li>
            <li><?php print($choice_data[5]['name']);?></li>
        </ul>
    </div>
    
</body>
</html>

<!-- Array (
[0] => Array ( [id] => 1 [0] => 1 [question_id] => 1 [1] => 1 [name] => たかなわ [2] => たかなわ [valid] => 1 [3] => 1 ) 
[1] => Array ( [id] => 2 [0] => 2 [question_id] => 1 [1] => 1 [name] => たかわ [2] => たかわ [valid] => 0 [3] => 0 ) 
[2] => Array ( [id] => 3 [0] => 3 [question_id] => 1 [1] => 1 [name] => こうわ [2] => こうわ [valid] => 0 [3] => 0 ) 
[3] => Array ( [id] => 4 [0] => 4 [question_id] => 2 [1] => 2 [name] => かめと [2] => かめと [valid] => 0 [3] => 0 ) 
[4] => Array ( [id] => 5 [0] => 5 [question_id] => 2 [1] => 2 [name] => かめど [2] => かめど [valid] => 0 [3] => 0 ) 
[5] => Array ( [id] => 6 [0] => 6 [question_id] => 2 [1] => 2 [name] => かめいど [2] => かめいど [valid] => 1 [3] => 1 ) 
[6] => Array ( [id] => 7 [0] => 7 [question_id] => 3 [1] => 3 [name] => もこうひら [2] => もこうひら [valid] => 0 [3] => 0 ) 
[7] => Array ( [id] => 8 [0] => 8 [question_id] => 3 [1] => 3 [name] => むきひら [2] => むきひら [valid] => 0 [3] => 0 ) 
[8] => Array ( [id] => 9 [0] => 9 [question_id] => 3 [1] => 3 [name] => むかいなだ [2] => むかいなだ [valid] => 1 [3] => 1 ) ) -->