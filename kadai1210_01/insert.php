<?php
//1. POSTデート取得
$name = $_POST["name"];
$age = $_POST["age"];
$genre = $_POST["genre"];
$title = $_POST["title"];
$review = $_POST["review"];
$date = $_POST["date"];


//2. DB接続
try {
    //ID:'root, Password: xamppは空白 ''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}


//3. データ登録SQL作成

//3-1. SQL文を用意
$stmt = $pdo->prepare(
    "INSERT INTO
    kadai1210(id, name , age , genre , title , review , date)
    VALUES(null , :name , :age , :genre , :title , :review , :date)");

//3-2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO:: PARAM_STR

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':review', $review, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);

//3. 実行
$status = $stmt->execute();

//4. データ登録処理
if($status === false){
    //SQL実行時にエラーがある場合(エラーオブジェクト取得して表示)
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
}else{
    //5. input.phpへリダイレクト
    header("Location:input.php");
}


?>