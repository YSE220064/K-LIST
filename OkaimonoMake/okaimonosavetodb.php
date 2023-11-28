<?php
// okaimonosavetodb.php

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

$sql = "INSERT INTO okaimonolists (list_name, list_content, creation_datetime) VALUES ('$listName', '$listContent', '$creationDateTime')";

if ($conn->query($sql) === TRUE) {
    echo "List saved to database successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
