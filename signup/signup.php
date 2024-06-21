<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM signup WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count_user = mysqli_num_rows($result);

    if ($count_user == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO signup (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            echo '<script>
                    alert("註冊過程中出現錯誤");
                    window.location.href = "../index.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("用戶名已存在");
                window.location.href = "../index.php";
              </script>';
    }
}
?>
