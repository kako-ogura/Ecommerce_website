<?php
session_start();
$email = $_POST['mail'];
$code = $_POST['password'];
$code02 = $_POST['password02'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $code;
$_SESSION['lastname'] = $lastname;
$_SESSION['firstname'] = $firstname;


$email = htmlspecialchars($email,ENT_QUOTES,'UTF-8');
$code = htmlspecialchars($code,ENT_QUOTES,'UTF-8');
$code02 = htmlspecialchars($code02,ENT_QUOTES,'UTF-8');
$lastname = htmlspecialchars($lastname,ENT_QUOTES,'UTF-8');
$firstname = htmlspecialchars($firstname,ENT_QUOTES,'UTF-8');

 ?>

     <style>

     #mis header p{
       padding:5px 25px;
     }

     .container{
       font-family: 'Kosugi Maru', sans-serif;
       text-align:center;
       margin:0 auto;
       margin-top: 100px;
       border-radius: 5px;
       box-shadow: 0 2px 5px rgba(0,0,0,0.3);
       overflow: hidden;
       width: 500px;
       max-width: 100%;
     }

     .print{
       padding:10px;
     }

     button{
       background: rgb(40, 40, 40);
       border:2px solid rgb(40, 40, 40);
       border-radius: 4px;
       color: #fff;
       padding:15px;
       margin-top: 30px;
       margin-bottom: 20px;
       width: 50%;
       font-size: 16px;
     }
     </style>

   <body>

     <div id="mis">
       <?php include('header.php') ?>
     </div>

     <div class="container">
       <h4>確認画面</h4>
       <hr>
       <p>以下の内容で送信します</p>
       <form action="register_done.php" method="post" enctype="multipart/form-data">
          <div class="print">
            <label>姓:</label>
            <?php print $lastname; ?>
          </div>
          <div class="print">
            <label>名:</label>
            <?php print $firstname; ?>
          </div>
          <div class="print">
            <label>メールアドレス:</label>
            <?php print $email; ?>
          </div>
          <div class="print">
            <label>パスワード:</label>
            <?php print $code; ?>
          </div>
          <button>登録する</button>
       </form>
     </div>



  </body>
</html>
