<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$comment = $data['comment'];
$com_username = $_SESSION['username'];
$com_title = $data['title'];

$sql = "INSERT INTO comment (com_content, com_username, com_title) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $comment, $com_username, $com_title);

$response = array();
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
