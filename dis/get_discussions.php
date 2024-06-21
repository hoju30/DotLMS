<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT title, content, post_name FROM discussions";
$result = $conn->query($sql);

$discussions = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $discussions[] = $row;
    }
}

$conn->close();

echo json_encode($discussions);
?>