<?php

//セキュリティ対策
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
 }

 //1. DB接続
try {
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

 //2. データ取得SQL作成

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//3. データ表示
$view = "";
if($status==false){
    //exectute(SQL実行時にエラーがある場合)
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else{
    //elseの中はSQLを実行成功した場合
    //selectデータの数だけ自動でループしてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view.='<table border="1"><tr><th>Number:</th><th>'.$result['id'].'</th></tr>'.
        '<tr><th>Title:</th><th>'.h($result['title']).'</th></tr>'.
        '<tr><th>BookURL:</th><th>'.h($result['url']).'</th></tr>'.
        '<tr><th>Coment:</th><th>'.h($result['coment']).'</th></tr>'.
        '<tr><th>Date:</th><th>'.h($result['date']).'</th></tr><hr><br>';
    }
}
?>



<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&family=Noto+Serif+JP&family=Rubik+80s+Fade&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ブックマーク集計</title>
</head>
<body>
    <!-- header start -->
    <header>
        <h2 class="main_title">Real Bookmark</h2>
        <nav class="navbar">
            <div class="nav">
                <a class="nav_next" href="index.php">Entry</a>
            </div>
        </nav>
    </header>
    <!-- header end -->

    <!-- main start -->
    <div class="index_area">
        <div class="index"><?= $view ?></div>
    </div>
    <!-- main end -->
</body>
</html>