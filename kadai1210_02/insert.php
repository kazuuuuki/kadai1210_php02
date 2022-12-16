<?php
//1. POSTデータ取得
$title = $_POST["title"];
$url = $_POST["url"];
$coment = $_POST["coment"];

//2. DB接続
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}


//3. データ登録SQL作成

//3-1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                    gs_bm_table(id , title , url , coment , date)
                    VALUES(NULL , :title , :url , :coment , sysdate())");

//3-2. バインド変数を用意
//Integer 数値の場合 PDO::PARAM_INT
//String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':coment', $coment, PDO::PARAM_STR);

//3-3. 実行
$status = $stmt->execute();

//4. データ登録処理後
if($status === false){
    //SQL実行時にエラーがある場合(エラーオブジェクト取得して表示)
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    //5. index.phpへリダイレクト
    header('Location: index.php');
}
?>

