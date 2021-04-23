<?php
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// PHP変数に入れる
$question_id = $_POST['question_id'];
$question = $_POST['question'];
$answers_id = $_POST['answer_id']; //配列
$answers = $_POST['answer']; //配列

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
			<?php
			foreach ( $answers as $answer ) {
        	?>
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input readonly name="answer[]" value="<?= $answer ?>">
					</td>
				</tr>
			</table>
			<?php
			}
			?>

			<?php
            foreach ($answers_id as $answer_id) {
            ?>
    			<input type="hidden" name="answer_id[]" value="<?= $answer_id ?>">
    		<?php
            }
            ?>

			<button type="button" onclick="location.href='list.php'">戻る</button>
			<button type="submit">更新</button>

		</form>

	</div>
</body>
