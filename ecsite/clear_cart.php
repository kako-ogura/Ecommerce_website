<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true) {
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <!--bootstarpでフレックスのカードボックスを制作しています-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
  <!--Font fontawesome-->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <title>アイテム削除</title>
  <style>
  <style>
  header p{
    padding: 22px 25px;
  }

  header li{
    padding-top: 30px;
  }

  ul{
    margin-top: 0;
  }

  li{
    padding-top: 5px;
  }

  .choose{
    min-width:250px;
    margin-right: 5rem;
  }

  .choose a{
    color:rgb(38, 39, 59);
  }

  .brands{
    margin-bottom:5rem;
  }
  </style>
</head>
  <body>

    <?php include('header.php'); ?>

    <div class="container" style="margin-top:3rem">

      <div class="d-flex">
        <div class="choose">

          <div class="brands">
            <p>ブランド</p>
            <hr>
              <a href="17kg.php"><li>17キログラム</li></a>
              <a href="dholic.php"><li>DHOLIC</li></a>
              <a href="stylenanda.php"><li>STYLENANDA</li></a>
              <a href="jemiremi.php"><li>JEMIREMI</li></a>
              <a href="envylook.php"><li>ENVYLOOK</li></a>
          </div>
          <div class="categories">
            <p>カテゴリー</p>
            <hr>
              <a href="outer.php"><li>アウター</li></a>
              <a href="tops.php"><li>トップス</li></a>
              <a href="pants.php"><li>パンツ</li></a>
              <a href="footware.php"><li>フットウェア</li></a>
              <a href="bag.php"><li>バッグ</li></a>
              <a href="cosme.php"><li>コスメ</li></a>
          </div>

          </div>


          <div class="col-6" style="text-align:center;margin-top:5rem;margin-right:15rem;">

            <img style="width:15%;height:auto"src="http://kako-ogura.tonkotsu.jp/image/shopping-cart.png" alt="shopping-cart.png"><br><br><br>
            <p style="margin-left:3rem;">カートのに商品が入っていません</p>
            <br>
            <a class="uk-button uk-button-secondary uk-width-1-2@s uk-margin-small-bottom" href="index.php">ショッピングを続ける</a>
          </div>
      </div>

    </div>

    <?php include('footer.php'); ?>

  </body>
</html>
