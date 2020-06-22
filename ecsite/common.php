<?php
$dsn = 'mysql:host=localhost;dbname=ecsite;charset=utf8';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}


function sanitize($before)
{
  foreach ($before as $key => $value) {
    $after[$key]=htmlspecialchars($value,ENT_QUOTES,'UTF-8');
  }
  return $after;
}
 ?>
