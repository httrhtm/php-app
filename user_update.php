<?php
require 'db_connection.php';
// --------------------------------------------------
// パラメータを取得
// --------------------------------------------------
$id = $_POST['id'];
$password = $_POST['pass'];
$admin_flag = $_POST['admin_flag'];

// --------------------------------------------------
// ユーザーを更新
// --------------------------------------------------
if (isset($db)) {
    $sql = 'update users set password = :password, admin_flag = :admin_flag, updated_at = current_timestamp() where id = :id';
    $stmt = $db->prepare($sql);
    $params = array(':password' => $password, ':admin_flag' => $admin_flag, ':id' => $id);
    $stmt->execute($params);
}

// listページにリダイレクト
header("Location: user_lists.php");
?>