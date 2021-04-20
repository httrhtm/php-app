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
		<form action="list.php" method="post">
			<button type="submit">問題と答えを確認・登録する　＞</button>
		</form>

		<form action="test.php" method="post">
			<button type="submit">テストをする　＞</button>
		</form>

		<form action="history.php" method="post">
			<button type="submit">過去の採点結果をみる　＞</button>
		</form>
	</div>
</body>
</html>