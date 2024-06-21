<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);



$username = $_SESSION['username'];
$title = $_POST['title'];
$content = $_POST['content'];

$stmt = $conn->prepare("INSERT INTO discussions (post_name, title, content) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $title, $content);

if ($stmt->execute()) {
    header("Location: ../_index.php");
    exit();
} else {
    echo json_encode(['success' => false, 'message' => "错误: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
