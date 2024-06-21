<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teach_id = $_SESSION['user_id'];
    $value = $_POST['value'];

    switch ($value) {
        case 0:
            $stored_value = "上完abc";
            break;
        case 1:
            $stored_value = "上完def";
            break;
        case 2:
            $stored_value = "上完ghi";
            break;
        case 3:
            $stored_value = "上完jkl";
            break;
        case 4:
            $stored_value = "上完mno";
            break;
        case 5:
            $stored_value = "上完pqr";
            break;
        case 6:
            $stored_value = "上完stu";
            break;
        case 7:
            $stored_value = "上完vwx";
            break;
        case 8:
            $stored_value = "上完yz";
            break;
        case 9:
            $stored_value = "上完課了";
            break;
        case -1:
            $stored_value = "還沒上完課喔";
            break;
        default:
            $stored_value = "未知狀態";
            break;
    };


    $sql = "INSERT INTO teach (teach_id, value) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE value = VALUES(value)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $teach_id, $stored_value);

    if ($stmt->execute() === TRUE) {
        echo "資料創建或更新成功";
    } else {
        echo "錯誤: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
