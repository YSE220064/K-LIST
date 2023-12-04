<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k-list";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user from the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $conn->close();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row;
        //echo "Login successful";
        header('Location: ../OkaimonoMake/okaimono.php');
        exit;
    } else {
        //echo "Incorrect password";
        header('Location: ./userLogin.php');
        exit;
    }
} else {
    echo "User not found";
}


// var_dump($_SESSION['user']);

?>
