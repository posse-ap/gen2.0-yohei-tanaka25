<?php
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'yohei';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->query("SELECT * FROM questions");
    $posts = $stmt->fetchAll();
    foreach ($posts as $post) {
      printf(
        '%s %s' . PHP_EOL, 
        $post['id'], 
        $post['name']
      );
    }
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

