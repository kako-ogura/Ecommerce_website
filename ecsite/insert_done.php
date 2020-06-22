<?php
require('common.php');

$pro_code=$_GET['id'];
$post = sanitize($_POST);
$pro_name=$_POST['name'];
$pro_category=$_POST['category'];
$pro_price=$_POST['price'];
$pro_img=$_FILES['img']['name'];
$pro_intro=$_POST['introduction'];

$sql = 'INSERT INTO items (id,name,category,price,img,introduction) VALUES (?,?,?,?,?,?)';
$stmt = $dbh->prepare($sql);
$data[]=$pro_code;
$data[]=$pro_name;
$data[]=$pro_category;
$data[]=$pro_price;
$data[]=$pro_img;
$data[]=$pro_intro;
$stmt->execute($data);

$uploaddir = '/Applications/MAMP/htdocs/ECサイト/image/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    echo "<p>";

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }
 ?>
