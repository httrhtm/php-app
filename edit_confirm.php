<?php
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// 直接入れると参照できないためPHP変数に入れる
$question_id = $_POST['question_id'];
$question = $_POST['question'];
$answer_id = $_POST['answer_id']; //配列
$answer = $_POST['answer']; //配列
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>edit confirm</title>
</head>
<body>
	<p>問題・答え編集確認</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="edit-confirm">

		<form action="update.php" method="post">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<input readonly name="question" value="<?= $question ?>">
						<input type="hidden" name="question_id" value="<?= $question_id ?>">
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input readonly name="answer" value="<?= $answer ?>">
					</td>
				</tr>
			</table>


    		<input type="hidden" name="answer_id" value="<?= $answer_id ?>">

			<button type="button" onclick="location.href='edit.php'">戻る</button>
			<button type="submit">更新</button>

		</form>

	</div>
</body>
