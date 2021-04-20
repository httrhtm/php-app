<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>register</title>
</head>
<body>
	<p>問題・答え登録</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="register">

		<form action="register_confirm.php" method="post">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<textarea name="question" rows="2"></textarea>
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<textarea name="answer" rows="1"></textarea>
					</td>

					<td>
						<button>削除*</button>
					</td>

				</tr>
			</table>

			<button type="button" onclick="location.href='list.php'">戻る</button>
			<button>追加*</button>
			<button type="submit">確認</button>

		</form>

	</div>
</body>
</html>