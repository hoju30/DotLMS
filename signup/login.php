<?php
session_start();
include("connection.php");

$login = false;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        if (password_verify($password, $row["password"])) {
            $login = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['loggedin'] = true;


            $teach_sql = "INSERT INTO teach (teach_id, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = VALUES(value)";
            $teach_stmt = mysqli_prepare($conn, $teach_sql);
            $teach_value = "快去上課";
            mysqli_stmt_bind_param($teach_stmt, "is", $_SESSION['user_id'], $teach_value);
            mysqli_stmt_execute($teach_stmt);


            $test_sql = "INSERT INTO test (test_id, fir_ans, fir_cor, sec_ans, sec_cor) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE fir_ans = VALUES(fir_ans), fir_cor = VALUES(fir_cor), sec_ans = VALUES(sec_ans), sec_cor = VALUES(sec_cor)";
            $test_stmt = mysqli_prepare($conn, $test_sql);
            $test_value = "沒做";
            mysqli_stmt_bind_param($test_stmt, "issss", $_SESSION['user_id'], $test_value, $test_value, $test_value, $test_value);
            mysqli_stmt_execute($test_stmt);


            $quiz_sql = "INSERT INTO quiz (quiz_id, score) VALUES (?, ?) ON DUPLICATE KEY UPDATE score = VALUES(score)";
            $quiz_stmt = mysqli_prepare($conn, $quiz_sql);
            $quiz_score = 0;
            mysqli_stmt_bind_param($quiz_stmt, "ii", $_SESSION['user_id'], $quiz_score);
            mysqli_stmt_execute($quiz_stmt);

            header("Location:../_index.php");
            exit();
        } else {
            echo '<script>
                    alert("登入失敗。無效的用戶名或密碼！");
                    window.location.href = "login.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("登入失敗。無效的用戶名或密碼！");
                window.location.href = "login.php";
              </script>';
    }
}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
    <style>
        body {
            background: linear-gradient(to top right, #ef1515, #54ed4c);
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div id="form">
        <h1 id="heading">登入表單</h1>
        <form name="form" action="login.php" method="POST" onsubmit="return isvalid();">
            <label>輸入使用者名稱: </label>
            <input type="text" id="username" name="username" required></br></br>
            <label>輸入密碼: </label>
            <input type="password" id="password" name="password" required></br></br>
            <input type="submit" id="btn" value="登入" name="submit" />
            <input type="button" id="btn" onclick="location.href='../index.php'" value="回首頁" />
        </form>
    </div>
    <script>
        function isvalid() {
            var user = document.form.username.value;
            if (user.length == "") {
                alert(" Enter username!");
                return false;
            }
        }
    </script>
</body>
</html>
