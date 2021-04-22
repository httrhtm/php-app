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
$answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --------------------------------------------------
// バリデーション
// --------------------------------------------------
session_start();
if (!empty($_POST) && empty($_SESSION['input_data'])) {

    $question = $_POST['question'];
    $answers = $_POST['answer'];

    //問題
    if (empty($question)) {
        $error_message['question'] = '問題を入力して下さい';
    } elseif (mb_strlen($question) > 500) {
        $error_message['question'] = '問題を500文字以内で入力してください';
    }

    //答え
    if (empty($answers['answer'])) {
        $error_message['answer'] = '答えを入力して下さい';
    } elseif (mb_strlen($answers['answer']) > 200) {
        $error_message['answer'] = '答えを200文字以内で入力してください';
    }



    //エラー内容チェック -- エラーがなければregister_confirm.phpへリダイレクト
    if (empty($error_message)) {
        $_SESSION['input_data'] = $_POST;
        header('Location:./register_confirm.php', true, 307);
        exit();
    }
} elseif (!empty($_SESSION['input_data'])) {
    $_POST = $_SESSION['input_data'];
}

session_destroy();

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

		<form action="edit.php" method="post" autocomplete="off">

			<!-- 問題 -->
			<table>
				<tr>
					<th>問題:</th>
					<td>
						<input name="question" value="<?= $question ?>">
						<input type="hidden" name="question_id" value="<?= $id ?>">
					</td>

				</tr>
			</table>
			<span>
				<?php echo isset($error_message['question']) ? $error_message['question'] : ''; ?>
			 </span>

			<!-- 答え -->
			<?php
			foreach ( $answers as $answer) {
        	?>

			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input name="answer[]" value ="<?= $answer['answer'] ?>">
    					<input type="hidden" name="answer_id[]" value="<?= $answer['id'] ?>">
    				</td>
					<td>
						<button>削除*</button>
					</td>
				</tr>
			</table>
			<span>
				<?php echo isset($error_message['answer']) ? $error_message['answer'] : ''; ?>
			 </span>

			<span>
				<?php echo isset($error_message['answer']) ? $error_message['answer'] : ''; ?>
			 </span>

			<?php
            }
            ?>

			<br>
			<button type="button" onclick="location.href='list.php'">戻る</button>
			<button>追加*</button>
			<button type="submit">確認</button>

		</form>

	</div>
</body>
</html>