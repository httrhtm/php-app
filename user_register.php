<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>user register</title>
</head>
<body>
<p>ユーザー登録</p>

<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="user-register">

		<form action="user_register_confirm.php" method="post" autocomplete="off">
			<table>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input type="text" name="user_name">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input type="text" name="pass">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input type="text" name="pass_conf">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>
					<td>
						<input type="hidden" name="admin_check" value="0">
						<input type="checkbox" name="admin_check" value="1">
					</td>
				</tr>
			</table>

			<button type="button" onclick="location.href='user_lists.php'">戻る</button>
			<button type="submit">確認</button>

		</form>
	</div>
</body>
</html>
