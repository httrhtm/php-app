<?php
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------
$user_name = $_POST['user_name'];
$pass = $_POST['pass'];
$pass_conf = $_POST['pass_conf'];
$admin_check = $_POST['admin_check'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>user register</title>
</head>
<body>
<p>ユーザー登録確認</p>

<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="user-register">

		<form action="user_insert.php" method="post" autocomplete="off">
			<table>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input readonly type="text" name="user_name" value="<?= $user_name ?>">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input readonly type="text" name="pass" value="<?= $pass ?>">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input readonly type="text" name="pass_conf" value="<?= $pass_conf ?>">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>

    				 <?php
    				 if (strcmp($admin_check, '1') == 0) {
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

			<button type="button" onclick="location.href='user_lists.php'">戻る</button>
			<button type="submit">登録</button>

		</form>
	</div>
</body>
</html>
