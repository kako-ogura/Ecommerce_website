<?php
session_start();
require('common.php');


if (isset($_SESSION['cart'])) {
    $cart=$_SESSION['cart'];
    $kazu=$_SESSION['kazu'];
}
$pro_id = $_REQUEST['id'];
if ($pro_id > 0) {
$cart[]=$pro_id;
}
$kazu[]= 1;
$_SESSION['cart']=$cart;
$_SESSION['kazu']=$kazu;
$max = count($cart);

foreach ($cart as $key => $value) {

  $records = $dbh->prepare('SELECT * FROM items WHERE id = ?');
  $data[0]=$value;
  $records->execute($data);
  $rec = $records->fetch(PDO::FETCH_ASSOC);

   $pro_name[] = $rec['name'];
   $pro_image[] = 'http://kako-ogura.tonkotsu.jp/image/'.$rec['img'];
   $pro_price[] = $rec['price'];
}

$dbh=null;

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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

    #cart_empty{
      margin-top:2rem;
    }
    </style>
    <title>ショッピングカート</title>
  </head>
  <body>

      <div id="mis">
        <?php include('header.php') ?>
      </div>

      <!--container-->
      <div class="uk-container" style="margin-top:3rem">

        <!--category-->
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

            <!--shopping cart-->
            <div class="uk-width-2-6@s">
            <h3>ショッピングカート</h3>
              <form action="kazu_change.php" method="post">
                <?php if ($i==$max):?>
                  <div style="text-align:center;">

                    <img style="width:15%;height:auto" id="cart_empty"src="http://kako-ogura.tonkotsu.jp/image/shopping-cart.png" alt="shopping_cart"><br><br><br>
                    <p style="margin-left:4rem;">カートのに商品が入っていません</p>
                    <br>
                    <a class="uk-button uk-button-secondary uk-width-1-2@s uk-margin-small-bottom" href="index.php">ショッピングを続ける</a>
                  </div>
                <?php else: ?>
                  <?php for ($i=0; $i< $max; $i++):?>
                        <img class="uk-width-1-4@s" src="<?php echo $pro_image[$i];?>">
                          <div class="uk-text-normal">
                            <div class="uk-text-small"><?php print $pro_name[$i]; ?></div><br>
                            <span class="uk-margin-large-right"><strong>合計金額</strong> : <?php print$pro_price[$i]*$kazu[$i]; ?>円</span>
                            <input class="uk-input uk-form-width-xsmall" type="text" placeholder="数を入力してください"name="kazu<?php print$i;?>" value="<?php print$kazu[$i]; ?>">
                            <input type="hidden" name="max" value="<?php print$max; ?>">
                            <input class="uk-input uk-form-width-small uk-button uk-button-secondary" type="submit" value="数量を追加">
                            <input type="submit" name="delete<?php print $i; ?>" class="btn btn-link"  value="削除する">
                            <?php $total = $pro_price[$i]*$kazu[$i]; ?>
                          </div>
                  <?php endfor; ?>
                <?php endif; ?>
            </div>

            <!--options-->
                <div style="margin-right:2rem;"class="uk-align-center">
                  <a href="clear_cart.php"class="uk-button uk-button-secondary uk-width-1-1@s uk-margin-small-bottom">全てのカートを空にする</a>
                  <a href="index.php"class="uk-button uk-button-secondary uk-width-1-1@s uk-margin-small-bottom">ショッピングを続ける</a>
                  <button  type="button" uk-toggle="target: #modal-example" class="uk-button uk-button-secondary uk-width-1-1@s uk-margin-small-bottom"><a href=""></a>購入へ</button>
                </div>

                <!-- This is the modal -->
                <div id="modal-example" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">購入確認</h2>
                        <?php for ($i=0; $i< $max; $i++):?>
                              <img class="uk-width-1-4@s" src="<?php echo $pro_image[$i];?>">
                                <div class="uk-text-normal">
                                  <div class="uk-text-small"><?php print $pro_name[$i]; ?></div><br>
                                  <span class="uk-margin-large-right"><strong>合計金額</strong> : <?php print$pro_price[$i]*$kazu[$i]; ?>円</span>
                                </div>
                        <?php endfor; ?>
                        <p class="uk-text-right">
                            <p class="uk-text-danger">実際の購入画面にはすすみません</p>
                            <button class="uk-button uk-button-secondary uk-width-1-1@s uk-modal-close" type="button">閉じる</button>
                        </p>
                    </div>
                </div>
          </div>
        </div>

      </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>
