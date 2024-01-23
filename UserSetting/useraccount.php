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
        <h1>アカウント管理</h1>

    <p>
    <h2>ユーザー名は　<?= $user['username'] ?>　です。</h2>
    <h2>ユーザー名変更</h2>
    <form method="post" action="">
        <label for="new_username">新しいユーザー名</label>
        <input type="text" id="new_username" name="new_username" required>
        <button type="submit">変更</button>
    </form>
    </p>

    <p>
    <h2>メールアドレスは　<?= $user['email'] ?>　です。</h2>
    <h2>メールアドレス変更</h2>
    <form method="post" action="">
        <label for="new_email">新しいメールアドレス</label>
        <input type="email" id="new_email" name="new_email" required>
        <button type="submit">変更</button>
    </form>
    </p>

    <p>
    <h2>パスワードは　<?= $user['password'] ?>　です。</h2>
    <h2>パスワード変更</h2>
    <form method="post" action="">
        <label for="new_password">新しいパスワード</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">変更</button>
    </form>
    </p>
    
    <!--<h2>Change Profile Picture</h2>
<form method="post" action="" enctype="multipart/form-data">
    <label for="profile_picture">Upload New Profile Picture:</label>
    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
    <button type="submit" name="change_picture">Change Profile Picture</button>
    <?php include "../UserSetting/profilepic.php"; ?>
</form>-->

    </div>
    <br>

    <?php include '../WebComponents/footer.php'; ?>

</body>

</html>
