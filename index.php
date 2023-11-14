<?php
// Specify the URL for the redirect
$redirect_url = 'UserWelcome/userwelcome.php';

// Use the header function to redirect
header('Location: ' . $redirect_url);

// Make sure that no other output is sent before the redirect
exit;
?>
