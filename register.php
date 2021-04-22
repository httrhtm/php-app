<?php
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
        foreach ($answers as $answer) {
            if (empty($answer)) {
                $error_message['answer'] = '答えを入力して下さい';
            } elseif (mb_strlen($answer) > 200) {
                $error_message['answer'] = '答えを200文字以内で入力してください';
            }

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
<title>register</title>
</head>
<body>
	<p>問題・答え登録</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="register">

		<form action="register.php" method="post">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<input name="question"
						value="<?php echo isset($question) ? htmlspecialchars($question,ENT_QUOTES) : ''; ?>">
					</td>
				</tr>
			</table>
			<span>
				<?php echo isset($error_message['question']) ? $error_message['question'] : ''; ?>
			 </span>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input name="answer[]"
						value="<?php echo isset($answer) ? htmlspecialchars($answer,ENT_QUOTES) : ''; ?>">
					</td>

					<td>
						<button>削除*</button>
					</td>

				</tr>
			</table>
			<span>
				<?php echo isset($error_message['answer']) ? $error_message['answer'] : ''; ?>
			 </span>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input name="answer[]"
						value="<?php echo isset($answer) ? htmlspecialchars($answer,ENT_QUOTES) : ''; ?>">
					</td>

					<td>
						<button>削除*</button>
					</td>

				</tr>
			</table>
			<span>
				<?php echo isset($error_message['answer']) ? $error_message['answer'] : ''; ?>
			 </span>

			<br>
			<button type="button" onclick="location.href='list.php'">戻る</button>
			<button>追加*</button>
			<button type="submit">確認</button>

		</form>

	</div>
</body>
</html>