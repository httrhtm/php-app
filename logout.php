<?php
session_start();
$_SESSION = array();
session_destroy();

// loginページにリダイレクト
header("Location: login_form.php");

?>