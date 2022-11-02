<?php
session_start();
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
setcookie('authenticated', null, -1, '/');
setcookie('broadcastdigioffice', null, -1, '/');
header("Location: login.php");
exit;
?>

