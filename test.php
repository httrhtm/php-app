<?php
require 'db_connection.php';
// --------------------------------------------------
// 問題を取得
// --------------------------------------------------
if (isset($db)) {

    $sql = 'select * from questions order by rand()';
    $stmt = $db->prepare($sql);

    // 実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_question = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>test</title>
</head>
<body>
	<p>テスト</p>

	<?php include('./nav.php'); ?>

	<!-- test -->
	<div class="test">

    	<form action="test_result.php" method="post" autocomplete="off">

        	<!-- question -->
    		<?php
    		foreach ( $array_question as $question) {
    		?>
            	<table>
            		<tr>
            			<!-- 問題番号 -->
            			<th><?= $question['id'] ?></th>

            			<!-- 問題 -->
            			<td><?= $question['question']; ?></td>
            		<tr>
            	</table>
            	<input type="hidden" name="question_id[]" value="<?= $question['id'] ?>">
            	<input type="hidden" name="question[]" value="<?= $question['question'] ?>">
            	<?php ?>
				<!-- answer -->
            	<table>
            		<tr>
            			<th>回答</th>

            			<!-- 答え -->
            			<td>
            				<input type ="text" name="answer[]">
            			</td>
            		</tr>
            	</table>
        	<?php
        	}
        	?>
    		<!-- 採点 -->
    		<button type="submit">採点</button>
    	</form>

	</div>
</body>
</html>