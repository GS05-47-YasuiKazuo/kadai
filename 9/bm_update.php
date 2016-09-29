<?php
include("bm_functions.php");
//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["bookname"];
$url    = $_POST["bookurl"];
$cmt    = $_POST["bookcmt"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookname=:bookname, bookurl=:bookurl, bookcmt=:bookcmt WHERE id=:id");
$stmt->bindValue(':bookname',  $name,   PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $email,  PDO::PARAM_STR);
$stmt->bindValue(':bookcmt',$naiyou, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: bm_select.php");
  exit;
}

?>
