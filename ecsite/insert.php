<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form enctype="multipart/form-data"action="insert_done.php" method="post">
      <input type="text" name="name">
      名前<br>
      <input type="text" name="category">
      カテゴリー<br>
      <input type="text" name="price">
      値段<br>
      <input type="file" name="img">
      画像ファイル<br>
      <input type="text" name="introduction" style="width:20rem; height:20rem;">
      説明<br>
      <button type="submit" value="submit">SUBMIT</button>
    </form>
  </body>
</html>
