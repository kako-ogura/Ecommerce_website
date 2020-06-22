<?php
require('common.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $dbh->prepare('SELECT * FROM register WHERE mail=? AND password=?');
$data[]=$email;
$data[]=$password;
$stmt->execute($data);
$dbh=null;
$rec = $stmt->fetch();

$_SESSION['login']=1;
$_SESSION['mail']=$email;
$_SESSION['password']=$password;

if ($rec) {
  header('Location: index.php');
  exit();
}
 ?>

 <?php include('header.php'); ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <!-- UIkit CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />

     <!-- UIkit JS -->
     <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
     <!--jQuery-->
     <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
     <!--Font fontawesome-->
     <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
     <style>
     body{
       box-sizing: border-box;
       min-height: 100vh;
       margin:0;
     }

     .container{
       font-family: 'Kosugi Maru', sans-serif;
       text-align:center;
       margin:0 auto;
       margin-top: 30px;
       border-radius: 5px;
       box-shadow: 0 2px 5px rgba(0,0,0,0.3);
       overflow: hidden;
       width: 500px;
       max-width: 100%;
     }

     h4{
       padding: 20px 40px;
     }
     </style>
   </head>
   <body>

     <div class="container">
       <h4>ユーザーログイン</h4>
       <hr>
       <form method="post"enctype="multipart/form-data" action="login.php">

           <div class="uk-margin">
               <p>メールアドレス</p>
               <div class="uk-inline">
                   <span class="uk-form-icon" uk-icon="icon: user"></span>
                   <input name="email"class="uk-input" type="text">
               </div>
           </div>

           <div class="uk-margin">
               <p>パスワード</p>
               <div class="uk-inline">
                   <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                   <input name="password"class="uk-input" type="text">
               </div>
           </div>

           <button class="uk-button uk-button-primary">ログイン</button>

       </form>
     </div>



     <?php include('footer.php'); ?>


  </body>
</html>
