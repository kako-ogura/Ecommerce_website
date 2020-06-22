<?php
session_start();
require('common.php');


$records = $dbh->prepare('SELECT * FROM items WHERE id = ?');
$records->execute(array($_REQUEST['id']));
$record = $records->fetch();


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
    <style>

      #mis header p{
        padding:22px 25px;
      }

      header p{
        padding: 22px 25px;
      }

      ul{
        margin-top: 0;
      }

    </style>
    <title>商品詳細</title>
  </head>
  <body>

      <div id="mis">
        <?php include('header.php'); ?>
      </div>

      <div class="container" style="margin-top:5rem;">
        <div class="row justify-content-between" style="display:flex">
          <div class="col-7">

              <img class="image" src="<?php echo 'http://kako-ogura.tonkotsu.jp/image/'.$record['img'];?>">
          </div>
          <div class="col-4" style="margin-right:3rem;">
              <p class="card-text"><?php print $record['name']; ?></p>
              <p class="card-text">¥<?php print $record['price']; ?>円</p>
              <p style="margin-bottom:2rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div>
                <a  class="uk-button uk-button-secondary uk-width-1-1@s uk-margin-small-bottom" href="favorite.php?id=<?php print ($record['id']);?>">お気に入りする</a>
                <a  class="uk-button uk-button-secondary uk-width-1-1@s uk-margin-small-bottom" href="cartin.php?id=<?php print ($record['id']);?>">カートに入れる</a>
              </div>


          </div>
        </div>
      </div>

      <?php include('footer.php'); ?>
  </body>
</html>
