<?php
// //テスト
// $name = $_POST["name"];
// $age = $_POST["age"];
// $genre = $_POST["genre"];
// $title = $_POST["title"];
// $review = $_POST["review"];
// $date = $_POST["date"];

// // // ファイルに書き込み
// $file = fopen("data/data.txt","a");


// fwrite($file,
//         "<div class='write'>投稿者：".$name."\n"."年齢："
//         .$age."歳"."\n"."ジャンル：".$genre."\n"."作品名：".$title."\n"
//         ."評価：".$review."\n"."鑑賞日：".$date."</div>");

// fclose($file);
// //テストここまで

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//1. DB接続
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch(PDOException $e){
    exit('DBConnectError' . $e->getMessage());
}

//2. データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai1210");
$status = $stmt->execute();

//3. データ表示
$view = "";
if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //elseの中はSQLを実行成功した場合
    //selectデータの数だけ自動でループしてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view.=
        '<table class="write_tb" border="1"><tr><th>Number:</th><th>'.$result['id'].'</th></tr>'.
        '<tr><th>名前:</th><th>'.h($result['name']).'</th></tr>'.
        '<tr><th>年齢:</th><th>'.h($result['age']).'</th></tr>'.
        '<tr><th>ジャンル:</th><th>'.h($result['genre']).'</th></tr>'.
        '<tr><th>作品名:</th><th>'.h($result['title']).'</th></tr>'.
        '<tr><th>スコア:</th><th>'.h($result['review']).'</th></tr>'.
        '<tr><th>鑑賞日:</th><th>'.h($result['date']).'</th></tr><hr>';
    }

}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>読み込み用</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="main_wrapper">
        <h1 class="main_title read_title">#徒然映画記</h1>
        <a href="input.php" class="entry">記録する</a>
    
    </header>
    <div class="write_wrapper">
        <?= $view ?>
        <!-- // //ファイルを開く
        // $openFile = fopen("./data/data.txt", "r");
        // //ファイル内容を1行ずつ読み込んで出力
        // while ($str = fgets($openFile)){
        //     echo nl2br($str);
        // }

        // fclose($openFile);
        
        // var_dump($view); -->
    
    </div>
</body>

</html>