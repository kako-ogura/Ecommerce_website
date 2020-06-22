<head>
  <!--fontawesome cdn-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>


<style>
  *{
    box-sizing: border-box;
  }

  body{
    margin:0;
  }

  header{
    background-color: rgb(40, 40, 40);
    height: 80px;
  }

  header p{
    float: left;
    color: #fff;
    font-size: 20px;
    padding: 22px 25px;
    font-weight: bold;
  }

  ul{
    list-style: none;
    text-align: right;
  }

  li{
    display: inline-block;
    margin-right: 25px;
    padding-top: 30px;
    font-size: 15px;
    font-family: 'Kosugi Maru', sans-serif;
  }

  ul a{
    color: #fff;
    text-decoration: none;
  }

  i.fa-heart{
    font-size: 20px;
  }

  i.fa-heart:hover{
    color: #FA8072;
  }

  i.fa-shopping-cart{
    font-size: 20px;
  }

  i.fa-shopping-cart:hover{
    color:rgb(255, 231, 125);
  }

  nav{
    background-color:rgb(192,192,192);
    padding: 15px 20px;
  }

  nav p{
    margin:0;
  }

  .login p{
    color: rgb(38, 39, 59);
    display: inline-block;
    letter-spacing: 3px;
    padding: 5px 15px;
  }

  .login span{
    color: rgb(38, 39, 59);
    font-size: 13px;
  }

</style>


<div>
  <header>
    <a href="index.php"><p>KAKO</p></a>
    <ul>
      <li><a href="favorite.php?id=<?php print ($record['id']);?>"><i class="fas fa-heart"></i></a></li>
      <li><a href="cartin.php?id=<?php print ($record['id']);?>"><i class="fas fa-shopping-cart"></i></a></li>
      <li><a href="register.php"> 新規会員登録</a></li>
      <?php if (!$_SESSION['login']): ?>
        <li><a href="login.php">ログイン</a></li>
      <?php else: ?>
        <li style="display:none"><a href="login.php">ログイン</a></li>
      <?php endif; ?>

      <li><a href="logout.php">ログアウト</a></li>
    </ul>
  </header>
  <nav>
    <div class="login">
      <?php if ($_SESSION['login']==false): ?>
        <p>ゲスト</p>
        <p> > </p>
        <p>login</p>
      <?php else: ?>
        <p><?php print $_SESSION['mail']; ?>様 > login</p>
      <?php endif; ?>
    </div>
  </nav>
</div>
