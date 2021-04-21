<?php
require 'db_connection.php';
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// PHP変数に入れる
$id = $_POST['question_id'];
$question = $_POST['question'];

// --------------------------------------------------
// 問題のidと一致する答えを取得
// --------------------------------------------------
$sql = 'select id, answer from correct_answers where questions_id = :id';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':id' => $id]);

// PDO::FETCH_ASSOC：列名を記述し配列で取り出す
// fetch：取り出す
$result_answer = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>edit</title>
</head>
<body>
	<p>問題・答え編集</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="edit">

		<form action="edit_confirm.php" method="post">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<textarea name="question" rows="2">
							<?= $question ?>
						</textarea>
						<input type="hidden" name="question_id" value="<?= $id ?>">
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<?php
			foreach ( $result_answer as $answer) {
        	?>

			<table>
				<tr>
					<th>答え:</th>
					<td><textarea name="answer[]" rows="2">
    							<?= $answer['answer'] ?>
    						</textarea></td>
					<td>
						<button>削除*</button>
					</td>
				</tr>
			</table>

			<?php
            }
            ?>

			<button type="button" onclick="location.href='list.php'">戻る</button>
			<button>追加*</button>
			<button type="submit">確認</button>

		</form>

	</div>
</body>
</html>