<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true) {
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
 ?>

<?php include('header.php'); ?>
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
  <title>お気に入り削除</title>
  <style>
  header p{
    padding: 22px 25px;
  }

  header li{
    padding-top: 30px;
  }

  li{
    padding-top: 5px;
  }

  li.uk-active{
    margin-bottom: 2rem;
  }

  a.uk-nav-sub{
    letter-spacing: 3px;
  }
  </style>
</head>

  <body>


    <div class="uk-container" style="margin-top:3rem">

      <div class="uk-flex">
        <div class="uk-width-1-5@m" style="margin-right:5rem">
            <ul class="uk-nav uk-nav-default">
              <li class="uk-active">
                  <a href="#">ブランドで探す</a>
                  <ul class="uk-nav-sub">
                      <li>
                        <a href="17kg.php">17キログラム</a>
                      </li>
                      <li>
                          <a href="dholic.php">DHOLIC</a>
                      </li>
                      <li>
                        <a href="stylenanda.php">STYLENANDA</a>
                      </li>
                      <li>
                          <a href="jemiremi.php">JEMIREMI</a>
                      </li>
                      <li>
                        <a href="envylook.php">ENVYLOOK</a>
                      </li>
                  </ul>
              </li>
              <br>
              <li class="uk-active">
                  <a href="#">カテゴリーで探す</a>
                  <ul class="uk-nav-sub">
                        <li>
                          <a href="outer.php">アウター</a>
                        </li>
                        <li>
                            <a href="tops.php">トップス</a>
                        </li>
                        <li>
                          <a href="pants.php">パンツ</a>
                        </li>
                        <li>
                            <a href="footer.php">シューズ</a>
                        </li>
                        <li>
                          <a href="bag.php">バック</a>
                        </li>
                        <li>
                            <a href="cosme.php">メイク</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </div>

        <div class="col-6" style="text-align:center;margin-top:5rem;margin-right:15rem;">

          <img style="width:15%;height:auto"src="http://kako-ogura.tonkotsu.jp/image/heart.png"><br><br><br>
          <p style="margin-left:3rem;">カートのに商品が入っていません</p>
          <br>
          <a class="uk-button uk-button-secondary uk-width-1-2@s uk-margin-small-bottom" href="index.php">ショッピングを続ける</a>
        </div>
      </div>
    </div>
    </div>

    <?php include('footer.php'); ?>

  </body>
</html>
