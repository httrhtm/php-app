<?php
// --------------------------------------------------
// パラメータを取得
// --------------------------------------------------
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['pass'];
$admin_flag = $_POST['admin_flag'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>user edit confirm</title>
</head>
<body>
<p>ユーザー編集確認</p>

<?php include('./nav.php'); ?>

	<!-- edit confirm -->
	<div class="user-edit">
	<form action="user_update.php" method="post" autocomplete="off">
			<table>
				<tr>
					<th>ID:</th>
					<td>
						<input readonly type="text" name="id" value="<?= $id ?>">
					</td>
				</tr>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input readonly type="text" value="<?= $name ?>">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input type="text" name="pass" value="<?= $password ?>">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input type="text" value="<?= $password ?>">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>
					<?php
    				 if (strcmp($admin_flag, '1') == 0) {
    				 ?>
						<td>
							あり
							<input type="hidden" name="admin_check" value="1">
						</td>
					<?php
    				 } else {
					?>
						<td>
							なし
							<input type="hidden" name="admin_check" value="0">
						</td>
					<?php
    				 }
					?>
				</tr>
			</table>

			<button type="button" onclick="location.href='user_edit.php'">戻る</button>
			<button type="submit">更新</button>

		</form>
	</div>
</body>
</html>
