<?php
session_start();
session_regenerate_id(true);

require('common.php');

$post = sanitize($_POST);

$max = $post['max'];
for ($i=0; $i<$max; $i++) {
  if (isset($_POST['kazu'.$i])==true) {
    $kazu[] = $post['kazu'.$i];
  }

}

$cart = $_SESSION['cart'];

for ($i=$max; 0<=$i; $i--) {
  if (isset($_POST['delete'.$i])==true) {
    array_splice($cart,$i,1);
    array_splice($kazu,$i,1);
  }
}

$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;


header('Location:cartin.php');
exit();

 ?>
