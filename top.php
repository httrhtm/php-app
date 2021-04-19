<?php

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
			<input type="button" value="logout"></input>
		</form>
	</div>

    <div class="main-nav">
		<form action="list.php" method="post">
			<input type="button" value="問題と答えを確認・登録する　＞"></input>
		</form>

		<form action="test.php" method="post">
			<input type="button" value="テストをする　＞"></input>
		</form>

		<form action="history.php" method="post">
			<input type="button" value="過去の採点結果をみる　＞"></input>
		</form>
	</div>
</body>
</html>