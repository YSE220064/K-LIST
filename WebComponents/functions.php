<?php
function loginCheck() {
    session_start();
    $user = $_SESSION['user'];
    if (!$user) {
        header('Location: ../UserLogin/userlogin.php');
        exit;
    }
}
