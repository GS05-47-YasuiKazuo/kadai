<?php
include("bm_functions.php");
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["bookname"]) || $_POST["bookname"]=="" ||
  !isset($_POST["bookurl"]) || $_POST["bookurl"]=="" ||
  !isset($_POST["bookcmt"]) || $_POST["bookcmt"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["bookname"];
$url  = $_POST["bookurl"];
$cmt = $_POST["bookcmt"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, bookname, bookurl, bookcmt,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
  //５．bm_index.phpへリダイレクト
  header("Location: bm_index.php");
  exit;
}
?>


