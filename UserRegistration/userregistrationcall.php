<?php
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
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$email = $_POST['email'];

// Insert user into the database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['user'] = $row;
        //echo "Login successful";
        header('Location: ../OkaimonoMake/okaimono.php');
        exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
