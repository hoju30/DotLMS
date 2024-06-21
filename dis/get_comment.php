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

// 獲取所有討論
$sql = "SELECT title, content, post_name FROM discussions";
$result = $conn->query($sql);

$discussions = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $discussionTitle = $row['title'];

        // 獲取與當前討論相關的評論
        $commentSql = "SELECT com_username, com_content FROM comment WHERE com_title = ?";
        $stmt = $conn->prepare($commentSql);
        $stmt->bind_param('s', $discussionTitle);
        $stmt->execute();
        $commentResult = $stmt->get_result();

        $comments = array();
        if ($commentResult->num_rows > 0) {
            while($commentRow = $commentResult->fetch_assoc()) {
                $comments[] = $commentRow;
            }
        }

        $row['comments'] = $comments;
        $discussions[] = $row;

        $stmt->close();
    }
}

$conn->close();

echo json_encode($discussions);
?>
