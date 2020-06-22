<?php
session_start();
require('common.php');

$pro_id = $_REQUEST['id'];

//一番最初のデータは空っぽだからコピーする必要性がない
if (isset($_SESSION['favorite'])) {
//$_SESSION['key']で現在のデータを保存
$favorite=$_SESSION['favorite'];
}

//取り出すIDは常に０よりも上であるから
if ($pro_id > 0) {
//引き継いだIDを$favorite[]の配列変数に新しいデータとして格納
$favorite[] = $pro_id;
}

//$_SESSION['key']に配列変数で格納した新たなデータを保存する
$_SESSION['favorite']= array_unique($favorite);

//名前と値段と画像の3つの配列を表示したいためcount命令とforループで回す
$max = count($favorite);

//keyは保存したidでデータを表示する
foreach ($favorite as $key => $val) {

  $records = $dbh->prepare('SELECT * FROM items WHERE id = ?');
  //データ表示の$valでループを止めておく
  $data[0]= $val;
  //実行するたびに一つずつ取り出していく
  $records->execute($data);
  $rec = $records->fetch();

   $pro_name[] = $rec['name'];
   $pro_image[] = 'http://kako-ogura.tonkotsu.jp/image/'.$rec['img'];
   $pro_price[] = $rec['price'];
   $pro_brand[] = $rec['brands'];
}

$dbh=null;

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
    <title>お気に入り</title>
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

    <div id="mis">
      <?php include('header.php') ?>
    </div>

    <div class="uk-container" style="margin-top:3rem">

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



            <div class="uk-width-2-6@m">
              <h3>お気に入りアイテム</h3>

              <!--お気に入りをクリアにする-->
              <?php if ($i==$max): ?>
                <a style="display:none"class="uk-button uk-button-secondary"href="clear_favorite.php">おきにいりをすべてクリアにする</a>
                <?php else: ?>
                  <a style="margin-bottom:2rem;"class="uk-button uk-button-secondary"href="clear_favorite.php">おきにいりをすべてクリアにする</a>
              <?php endif; ?>

              <form action="favorite_change.php" method="post">
                <?php if ($i==$max):?>
                  <div style="text-align:center;margin-top:5rem;">
                    <img style="width:60px;height:auto;margin-bottom:3rem;"src="http://kako-ogura.tonkotsu.jp/image/heart.png" alt="お気に入り">
                    <p>お気に入りはありません</p>
                    <p>あなたのお気に入りをリストアップしましょう！</p>
                  </div>
                <?php else: ?>
              <!--配列をfor文でデータの数だけ回す-->
                <?php for ($i=0; $i < $max; $i++):?>
                  <div style="display:flex;margin-bottom:1rem;">
                    <div style="margin-right:2rem;"class="uk-width-1-4@s">
                      <img src="<?php echo $pro_image[$i];?>">
                    </div>
                    <div>
                      <div style="color:rgb(128,128,128);font-size:0.8rem;"><?php print $pro_name[$i]; ?></div>
                      <div style="letter-spacing:0.1rem;"><?php print $pro_price[$i]; ?>円</div><br>
                      <p><?php print $pro_brand[$i]; ?></p>


                      <!--カートにidで追加する機能-->
                      <a class="uk-button uk-button-secondary" href="cartin.php?id=<?php print ($rec['id']);?>">カートに追加する</a>
                      <!--カートから削除する機能-->
                      <input type="submit" name="delete<?php print $i; ?>" class="btn btn-link" value="削除する">
                      <input type="hidden" name="max" value="<?php print $max; ?>">
                    </div>
                  </div>

                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <?php include('footer.php') ?>

  </body>

</html>
