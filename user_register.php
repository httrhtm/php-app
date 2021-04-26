<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>user register</title>

<script type="text/javascript">
<!-- バリデーション -->
function valid(){

	console.log(document.form.pass.value.length);
	console.log(document.form.user_name.value);

	if(document.form.user_name.value == null || !document.form.user_name.value.match(/^[A-Za-z0-9]+$/)) {
		alert('ユーザ名を半角英数字で入力してください');
	}
	else if (document.form.pass.value == null || !document.form.pass.value.match(/^[A-Za-z0-9]+$/)){
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
<p>ユーザー登録</p>

<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="user-register">

		<form action="user_register_confirm.php" method="post" autocomplete="off" name="form">
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
			<input type="button" value="確認" onClick="valid()"></input>

		</form>
	</div>
</body>
</html>
