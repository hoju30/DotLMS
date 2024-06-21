<?php
include("connection.php");
include("signup.php")
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="signup.css">
</head>

<body>
  <div id="form">
    <h1 id="heading">註冊表單</h1><br>
    <form name="form" action="signup.php" method="POST">
      <i class="fa fa-user fa-lg"></i>
      <input type="text" id="username" name="username" placeholder="使用者名稱" required></br></br>
      <i class="fa-solid fa-lock fa-lg"></i>
      <input type="text" id="password" name="password" placeholder="密碼" required></br></br>
      <input type="submit" id="btn" value="確認" name="submit" />
      <input type="button" id="btn" onclick="location.href='../index.php'" value="回首頁" />
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>