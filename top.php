<?php
session_start();
require 'db_connection.php';
// --------------------------------------------------
// ログインユーザーを取得する
// --------------------------------------------------
$user_id = $_SESSION['id'];
// --------------------------------------------------
// ユーザーをDBから取得する
// --------------------------------------------------
if (isset($db)) {
    $sql = 'select admin_flag from users where id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $user_id]);
    $user_admin = $stmt->fetch(PDO::FETCH_COLUMN);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>top</title>
</head>
<body>
	<p>トップページ</p>

	<div class="nav">
		<form action="logout.php" method="post">
			<button type="submit">logout</button>
		</form>
	</div>

	<div class="main-nav">
		<?php
		if (strcmp($user_admin, '1') == 0) {
		?>
		<form action="list.php" method="post">
			<button type="submit">問題と答えを確認・登録する　＞</button>
		</form>
		<?php
		}
		?>

		<form action="test.php" method="post">
			<button type="submit">テストをする　＞</button>
		</form>

		<form action="history.php" method="post">
			<button type="submit">過去の採点結果をみる　＞</button>
		</form>

		<?php
		if (strcmp($user_admin, '1') == 0) {
		?>
		<form action="user_lists.php" method="post">
			<button type="submit">ユーザを追加・編集する　＞</button>
		</form>
		<?php
		}
		?>
	</div>
</body>
</html>