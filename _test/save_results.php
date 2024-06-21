<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dot";

$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents('php://input'), true);
error_log("Received data: " . print_r($data, true));

$questionIndex = $data['questionIndex'];
$answer = $data['answer'];
$correct = $data['correct'];
$test_id = $_SESSION['user_id'];

$query = "SELECT * FROM test WHERE test_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $test_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    if ($questionIndex == 0) {
        $sql = "UPDATE test SET fir_ans = ?, fir_cor = ? WHERE test_id = ?";
    } elseif ($questionIndex == 1) {
        $sql = "UPDATE test SET sec_ans = ?, sec_cor = ? WHERE test_id = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $answer, $correct, $test_id);
} else {
    if ($questionIndex == 0) {
        $sql = "INSERT INTO test (test_id, fir_ans, fir_cor) VALUES (?, ?, ?)";
    } elseif ($questionIndex == 1) {
        $sql = "INSERT INTO test (test_id, sec_ans, sec_cor) VALUES (?, ?, ?)";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $test_id, $answer, $correct);
}

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    error_log("SQL Error: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
