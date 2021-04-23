<?php
require 'db_connection.php';

// --------------------------------------------------
// 問題を取得
// --------------------------------------------------
if (isset($db)) {

    $sql = 'select * from questions';
    $stmt = $db->prepare($sql);

    // 実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_question = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

// --------------------------------------------------
// 答えを取得
// --------------------------------------------------
if (isset($db)) {
    $sql = 'select * from correct_answers';
    $stmt = $db->prepare($sql);

    //実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_answer = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>list</title>
</head>
<body>
	<p>問題一覧</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="register">
		<form action="register.php" method="post">
			<button type="submit">新規登録</button>
		</form>
	</div>

	<!-- list -->
	<div class="list">

		<!-- question -->
		<?php
		foreach ( $array_question as $question) {
		?>
        	<table>
        		<tr>
        			<th>問題:</th>

        			<!-- 問題馬号 -->
        			<td><?= $question['id'] ?></td>

        			<!-- 問題 -->
        			<td><?= $question['question']; ?></td>

        			<!-- 編集ボタン -->
        			<!-- answerの値を渡せないのでanswerのループの中に移動 -->

        			<!-- 削除ボタン -->
        			<td>
        				<form action="delete_confirm.php" method="post">
        					<button type="submit">削除</button>
        					<input type="hidden" name="question_id" value="<?= $question['id'] ?>">
        					<input type="hidden" name="question" value="<?= $question['question']; ?>">
        				</form>
        			</td>

        		</tr>

        	</table>

        	<!-- answer -->
        	<?php
        	foreach ( $array_answer as $answer) {
        	    if ($answer['questions_id'] == $question['id']) {
        	?>
            	<table>
            		<tr>
            			<th>答え:</th>

            			<!-- 答え -->
            			<td><?= $answer['answer'] ?></td>

            			<!-- 編集ボタン -->
            			<td>
            				<form action="edit.php" method="post">
            					<button type="submit">編集</button>
            					<input type="hidden" name="question_id" value="<?= $question['id'] ?>">
            					<input type="hidden" name="question" value="<?= $question['question']; ?>">
            					<input type="hidden" name="answer_id" value="<?= $answer['id'] ?>">
            					<input type="hidden" name="answer" value="<?= $answer['answer']; ?>">
            				</form>
            			</td>
            		</tr>
            	</table>

    	<?php
    		  }
    	   }
    	}
    	?>

	</div>
</body>
</html>