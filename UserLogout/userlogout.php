<!-- userlogout.php -->
<?php
// Start the session
// session_start();

// Check if the user is logged in
// if (!isset($_SESSION['user'])) {
//     // Redirect to the login page if the user is not logged in
//     header("Location: ../UserLogin/userlogin.php");
//     exit;
// }

session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../UserLogin/userlogin.php');
} else {
    $user = $_SESSION['user'];
}

// Handle logout
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../UserLogin/userlogin.php");
    exit;
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
        <header>
        <h1>さようなら！ <?php echo $_SESSION['username']; ?></h1>
        <h2><?= $user['username'] ?>　さん</h2>
    </header>

    <!-- <section>
        <p>This is a simple web page created with PHP.</p>
        <p>Current Date: <?php echo date("Y-m-d H:i:s"); ?></p>
    </section> -->

    <form method="post">
        <input type="submit" name="logout" value="逃げるんだよ！">
    </form>
    </div>
    <br>

    <?php include '../WebComponents/footer.php'; ?>

</body>

</html>
