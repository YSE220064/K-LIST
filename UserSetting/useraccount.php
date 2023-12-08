<!-- useraccount.php -->

<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../UserLogin/userlogin.php');
} else {
    $user = $_SESSION['user'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k-list";

// Function to connect to the database
function connectDB()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update username
    if (isset($_POST['new_username'])) {
        $newUsername = $_POST['new_username'];
        // Perform validation and update logic (replace this with your logic)
        // Example: updateUsername($userId, $newUsername);
        $username = $newUsername; // Update for this example
    }

    // Update email
    if (isset($_POST['new_email'])) {
        $newEmail = $_POST['new_email'];
        // Perform validation and update logic (replace this with your logic)
        // Example: updateEmail($userId, $newEmail);
        $email = $newEmail; // Update for this example
    }

    // Update password
    if (isset($_POST['new_password'])) {
        $newPassword = $_POST['new_password'];
        // Perform validation and update logic (replace this with your logic)
        // Example: updatePassword($userId, $newPassword);
    }
}
?>

<!DOCTYPE html>
<html lang="en jp">

<?php include '../WebComponents/head.php'; ?>

<body>

    <?php include '../WebComponents/navigation.php'; ?>  

    <br>

    <div class="container">
        <img src="../WebResources/K-List-Logo.jpg" width="200" alt="K-List"></a></p>
        <h1>User Settings</h1>

        <h2>Username = <?= $user['username'] ?></h2>
    <h2>Change Username</h2>
    <form method="post" action="">
        <label for="new_username">New Username:</label>
        <input type="text" id="new_username" name="new_username" required>
        <button type="submit">Change Username</button>
    </form>

    <h2>Change Email</h2>
    <h2>Email = <?= $user['email'] ?></h2>
    <form method="post" action="">
        <label for="new_email">New Email:</label>
        <input type="email" id="new_email" name="new_email" required>
        <button type="submit">Change Email</button>
    </form>

    <h2>Change Password</h2>
    <h2>Password = <?= $user['password'] ?></h2>
    <form method="post" action="">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Change Password</button>
    </form>
        </h1>
    </div>
    <br>

    <?php include '../WebComponents/footer.php'; ?>

</body>

</html>
