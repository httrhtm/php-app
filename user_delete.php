<?php
require 'db_connection.php';
// --------------------------------------------------
// パラメータを取得
// --------------------------------------------------
$id = $_POST['id'];
// --------------------------------------------------
// ユーザーをDBから論理的削除
// --------------------------------------------------
if (isset($db)) {
    $sql = 'update users set deleteflag = 1, deleted_at = current_timestamp() WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $id]);
}

// listページにリダイレクト
header("Location: user_lists.php");
?>