<!--新規会員登録画面-->
<?php
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['mail'];
$code = $_POST['password'];
$code02 = $_POST['password02'];

 ?>
  <?php include('header.php'); ?>
  <head>
  <style>
    body{
      box-sizing: border-box;
      min-height: 100vh;
      margin:0;
    }

    header p{
      padding: 5px 25px;
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

    .header{
      background: #f7f7f7;
      padding: 20px 40px;
      border-bottom: 1px solid #f0f0f0;
    }

    .header h2{
      margin: 0;
    }

    .form{
      padding:30px 40px;
    }

    .form-control{
      margin-bottom:10px;
      padding-bottom:20px;
      position: relative;
    }

    .flex{
      display: flex;
    }

    .container span{
      margin-right: 60px;
    }

    .form-control label{
      display: inline-block;
      margin-bottom:5px;
    }

    .form-control input {
      border: 2px solid #f0f0f0;
      border-radius: 4px;
      display: block;
      font-size: 14px;
      padding:15px;
      margin-bottom: 10px;
      width: 100%;
    }

    .form-control.success input{
      border-color: #2ecc71;
    }

    .form-control.error input{
      border-color: #e74c3c;
    }

    .form-control i{
      position: absolute;
      top: 40px;
      right: 10px;
      visibility: hidden;
    }

    .form-control.success i.fa-check-circle{
      color: #2ecc71;
      visibility: visible;
    }

    .form-control.error i.fa-exclamation-circle{
      color: #e74c3c;
      visibility: visible;
    }

    .form-control small{
      color:#e74c3c;
      visibility: hidden;
      position: absolute;
      bottom: 0;
      left: 0;
    }

    .form-control.error small{
      color: #e74c3c;
      visibility: visible;
    }

    button{
      background: rgb(40, 40, 40);
      border:2px solid rgb(40, 40, 40);
      border-radius: 4px;
      color: #fff;
      padding:15px;
      margin-top: 10px;
      width: 100%;
      font-size: 16px;
    }

    </style>
  </head>

  <body>

    <!--フォーム欄-->
    <div class="container">
      <div class="header">
        <h2>新規会員登録</h2>
      </div>
      <form id="form" class="form" action="register_check.php" method="post">
        <div class="flex">
          <div class="form-control">
            <label>姓</label>
            <input type="text" name="lastname" id="lastname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <span></span>
          <div class="form-control">
            <label>名</label>
            <input type="text" name="firstname" id="firstname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
        </div>
        <div class="form-control">
          <label>メールアドレス</label>
          <input type="email" name="mail" id="email">
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error Message</small>
        </div>
        <div class="flex">
          <div class="form-control">
            <label>パスワード</label>
            <input type="password" name="password" id="password">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <span></span>
          <div class="form-control">
            <label>パスワード（確認）</label>
            <input type="password" name="password02" id="password2">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
        </div>


        <button>確認画面へ</button>
      </form>
    </div>


    <script>
      const form = document.getElementById('form');
      const lastname = document.getElementById('lastname');
      const firstname = document.getElementById('firstname');
      const email = document.getElementById('email');
      const password = document.getElementById('password');
      const password2 = document.getElementById('password2');

      form.addEventListener('submit', (e) => {
        e.preventDefault();

        checkInput();

      });

      function checkInput(){
        const lastnameValue = lastname.value.trim();
        const firstnameValue = firstname.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const password2Value = password2.value.trim();

        if (lastnameValue === '') {
          setErrorFor(lastname, '入力されておりません');
        }else {
          setSuccessFor(lastname);
        }

        if (firstnameValue === '') {
          setErrorFor(firstname, '入力されておりません');
        }else {
          setSuccessFor(firstname);
        }

        if (emailValue === '') {
          setErrorFor(email,'入力されておりません');
        }else if(!isEmail(emailValue)){
          setErrorFor(email,'こちらのメールアドレスは使用できません');
        }else {
          setSuccessFor(email);
        }

        if (passwordValue === '') {
          setErrorFor(password,'入力されておりません');
        }else {
          setSuccessFor(password);
        }

        if (password2Value === '') {
          setErrorFor(password2,'入力されておりません');
        }else if (passwordValue !== password2Value) {
          setErrorFor(password2,"上記で登録したパスワードが違います");
        }else {
          setSuccessFor(password2);
        }

        if (lastnameValue && firstnameValue && emailValue && passwordValue && password2Value) {
          document.getElementById('form').submit();
        }

      }

      function setErrorFor(input,message){
      const formControl = input.parentElement; //.form-control
      const small = formControl.querySelector('small');

      small.innerText = message;

      formControl.className = 'form-control error';
      return false;
      }

      function setSuccessFor(input){
        const formControl = input.parentElement; //.form-control
        formControl.className = 'form-control success';
      }

      function isEmail(email){　//.comがあるかどうか
        return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
      }
    </script>
  </body>
