<?php
session_start();
session_regenerate_id(true);

require('common.php');
//安全対策
$post = sanitize($_POST);
//商品の数を$maxにコピーする
$max = $post['max'];
//現在のカートの内容をコピー
$favorite = $_SESSION['favorite'];

//逆ループで減らす指定した配列を一つずつ抜いていくループを作る
for ($i=$max; 0<=$i; $i--) {
  //もし、deleteボタンが押された時
  if (isset($_POST['delete'.$i])) {
    //$i個目の配列から１個指定
    array_splice($favorite,$i,1);
  }
}

//変更された個数を保存
$_SESSION['favorite'] = $favorite;
header('Location:favorite.php');
exit();

 ?>
