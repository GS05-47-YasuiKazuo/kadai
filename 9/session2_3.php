<?php
/************************************************************
 *  session2_3.php
 *  SESSION表示
 *  他ページに移動してもSESSIONに値が残ってる事を確認
 ************************************************************/
session_start();
echo $_SESSION['test']."<br>";
echo 'END';
?>
