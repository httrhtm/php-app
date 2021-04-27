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
<title>user edit</title>

<script type="text/javascript">
<!-- バリデーション -->
function valid(){

	if (document.form.pass.value == null || !document.form.pass.value.match(/^[A-Za-z0-9]+$/)){
		alert('パスワードを半角英数字で入力してください');
	}
	else if(document.form.pass.value !== document.form.pass_conf.value) {
		alert('PWとPW確認が一致しませんでした');
	}
	else if(document.form.pass.value.length < 8){
        alert('パスワードを8文字以上で入力してください。');
    }
	else{
        document.form.submit();
     }
}
</script>
</head>
<body>
<p>ユーザー編集</p>

<?php include('./nav.php'); ?>

	<!-- edit -->
	<div class="user-edit">
	<form action="user_edit_confirm.php" method="post" autocomplete="off" name="form">
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
						<input readonly type="text" name="name" value="<?= $name ?>">
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
						<input type="text" name="pass_conf" value="<?= $password ?>">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>
					<?php
    				if (strcmp($admin_flag, '1') == 0) {
    				?>
						<td>
							<input type="hidden" name="admin_flag" value="0">
							<input type="checkbox" name="admin_flag" value="1" checked>
						</td>
					<?php
    				} else {
					?>
						<td>
							<input type="hidden" name="admin_flag" value="0">
							<input type="checkbox" name="admin_flag" value="1">
						</td>
					<?php
    				 }
					?>
				</tr>
			</table>

			<button type="button" onclick="location.href='user_lists.php'">戻る</button>
			<input type="button" value="確認" onClick="valid()"></input>

		</form>
	</div>
</body>
</html>
