<?php
$conn = mysqli_connect("localhost", "root", "", "dot");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
