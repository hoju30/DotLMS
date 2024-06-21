<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    die("User ID is not set in the session.");
}

$user_id = $_SESSION['user_id'];

// Prepare and execute the SQL statement
$sql = "SELECT
            signup.username,
            teach.value,
            test.fir_ans,
            test.sec_ans,
            test.fir_cor,
            test.sec_cor,
            quiz.score
        FROM
            signup
        JOIN teach ON signup.user_id = teach.teach_id
        JOIN test ON signup.user_id = test.test_id
        JOIN quiz ON signup.user_id = quiz.quiz_id
        WHERE signup.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
