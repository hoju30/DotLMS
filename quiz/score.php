<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = intval($_POST['score']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO quiz (quiz_id, score) VALUES (?, ?) ON DUPLICATE KEY UPDATE score = VALUES(score)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $score);

    if ($stmt->execute() === TRUE) {
        echo "成功新增或更新";
    } else {
        echo "錯誤: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
