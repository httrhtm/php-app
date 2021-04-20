<?php
require 'db_connection.php';

// --------------------------------------------------
// 問題を取得
// --------------------------------------------------
try {
    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = 'select * from questions';
    $stmt = $db->prepare($sql);

    //実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_question = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //例外処理
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// --------------------------------------------------
// 答えを取得
// --------------------------------------------------

try {
    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = 'select * from correct_answers';
    $stmt = $db->prepare($sql);

    //実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_answer = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //例外処理
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
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
        			<td><?php echo $question['id']; ?></td>

        			<!-- 問題 -->
        			<td><?php echo $question['question']; ?></td>

        			<!-- 編集ボタン -->
        			<td>
        				<form action="edit.php" method="post">
        					<button type="submit">編集</button>
        				</form>
        			</td>

        			<!-- 削除ボタン -->
        			<td>
        				<form action="delete.php" method="post">
        					<button type="submit">削除</button>
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
            			<td><?php echo $answer['answer'];; ?></td>
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