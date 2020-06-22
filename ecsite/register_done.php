<?php
require_once('common.php');
session_start();

$email = $_SESSION['email'];
$code = $_SESSION['password'];
$lastname = $_SESSION['lastname'];
$firstname = $_SESSION['firstname'];

$sql = $dbh->prepare('INSERT INTO register(mail,password,lastname,firstname) VALUES (?,?,?,?)');
$data[]=$email;
$data[]=$code;
$data[]=$lastname;
$data[]=$firstname;
$sql->execute($data);

$dbh=null;
 ?>

<style>
    #mis header p{
      padding:5px 25px;
    }

  .container{
    font-family: 'Kosugi Maru', sans-serif;
    text-align:center;
    margin:0 auto;
    margin-top: 150px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    overflow: hidden;
    width: 500px;
    max-width: 100%;
    padding: 3rem;
  }

  h1{
    padding: 10px;
  }

  .back_top{
    margin:32px;
  }

  .container a{
    border: 2px solid  rgb(40, 40, 40);
    background:  rgb(40, 40, 40);
    border-radius: 4px;
    font-size: 14px;
    padding: 15px;
    color: #fff;
    text-decoration: none;
    letter-spacing: 0.2px;
  }
</style>

<body>

  <div id="mis">
    <?php include('header.php') ?>
  </div>

  <div class="container">
    <h4>登録完了しました</h4>
    <hr>
    <div class="back_top">
      <a href="index.php">トップ画面にもどる</a>
    </div>
  </div>

</body>
