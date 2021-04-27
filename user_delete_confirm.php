<?php
// --------------------------------------------------
// パラメータを取得
// --------------------------------------------------
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$admin_flag = $_POST['admin_flag'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>user delete</title>
</head>
<body>
<p>ユーザー削除確認</p>

<?php include('./nav.php'); ?>

	<!-- delete -->
	<div class="user-delete-confirm">

		<form action="user_delete.php" method="post" autocomplete="off">
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
						<input readonly type="text" value="<?= $password ?>">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input readonly type="text" value="<?= $password ?>">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>

    				 <?php
    				 if (strcmp($admin_flag, '1') == 0) {
    				 ?>
						<td>
							あり
						</td>
					<?php
    				 } else {
					?>
						<td>
							なし
						</td>
					<?php
    				 }
					?>

				</tr>
			</table>

			<button type="button" onclick="location.href='user_lists.php'">戻る</button>
			<button type="submit">削除</button>

		</form>
	</div>
</body>
</html>