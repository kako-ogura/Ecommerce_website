<?php
//PDO型で書いています
require('common.php');
session_start();

$statement = $dbh->prepare('SELECT * FROM items');
$statement->execute();

$results = [];
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $results[] = $row;
}
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
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
      #mis header p{
        padding:22px 25px;
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

      .grid{
        display: grid;
      }

      #slideshow{
        margin-bottom: 50px;
      }

      #black_button{
        color:rgb(38, 39, 59);
      }

    </style>
  </head>


  <body>

      <div id="mis">
        <?php include('header.php') ?>
      </div>


      <!--container-->
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


              <div class="grid">
                <div id="slideshow" class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="animation: push">

                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                <img src="jeremi01.jpg" alt="jemiremi" uk-cover>
                            </div>
                        </li>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                                <img src="d-holi.jpg" alt="" uk-cover>
                            </div>
                        </li>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                                <img src="17kgm2.png" alt="" uk-cover>
                            </div>
                        </li>
                    </ul>


                      <a id="black_button"class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                      <a id="black_button"class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>


                </div>
                <div class="uk-flex flex-wrap">


                  <?php foreach ($results as $item) {;?>
                    <div class="uk-width-1-4">
                    <a href="product_look.php?id=<?php print($item['id']);?>"><img class="uk-width-1-2" src="<?php echo 'http://kako-ogura.tonkotsu.jp/image/'.$item['img'];?>" class="img-fluid"></a><br>
                    <span style="color:rgb(128,128,128);letter-spacing:0.3rem;"><?php print $item['brands']; ?></span><br>
                    <span style="letter-spacing:0.1rem;">¥<?php print $item['price']; ?>円</span><br><br>
                    </div>
                  <?php };?>


                </div>
              </div>



            </div>
          </div>

  <?php include('footer.php') ?>

  </body>

</html>
