<?php
require 'db_connection.php';
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------
$user_name = $_POST['user_name'];
$pass = $_POST['pass'];
$admin_check = $_POST['admin_check'];

// --------------------------------------------------
// DBに登録
// --------------------------------------------------
$sql = 'insert into users (name, password, created_at, admin_flag)
            values (:name, :password, current_timestamp(), :admin_flag)';
$stmt = $db->prepare($sql);
$params = array(':name' => $user_name, ':password' => $pass, ':admin_flag' => $admin_check);
$stmt->execute($params);

// topページにリダイレクト
header("Location: user_lists.php");
?>
