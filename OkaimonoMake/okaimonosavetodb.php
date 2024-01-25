<?php
session_start();
// okaimonosavetodb.php

// userlogin check
require_once('../WebComponents/functions.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    echo '';
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k-list";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$listName = $_POST['listName'];
$listContent = $_POST['listContent'];
$creationDateTime = date('Y-m-d H:i:s');

$user_id = $user['id'];
$sql = "INSERT INTO okaimonolists (user_id, list_name, list_content, creation_datetime) VALUES ($user_id, '$listName', '$listContent', '$creationDateTime')";

if ($conn->query($sql) === TRUE) {
    echo "リスト　保存されましたよ！";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
