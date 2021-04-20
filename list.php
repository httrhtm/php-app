<?php
require 'db_connection.php';

// --------------------------------------------------
// DBから問題と答えを取得
// --------------------------------------------------
try {
    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = 'select * from questions';
    $stmt = $db->prepare($sql);

    //実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_question = $stmt->fetch(PDO::FETCH_ASSOC);

    //例外処理
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// --------------------------------------------------
// 問題のIDと一致する答えを取得
// --------------------------------------------------
$id = $array_question['id'];

try {
    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = 'select * from correct_answers where id = :id';
    $stmt = $db->prepare($sql);

    //実行
    $stmt->execute([':id' => $id]);

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $array_answer = $stmt->fetch(PDO::FETCH_ASSOC);

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
		<table>
			<tr>
				<th>問題:</th>

				<!-- 問題馬号 -->
				<td><?php echo $array_question['id']; ?></td>

				<!-- 問題 -->
				<td><?php echo $array_question['question']; ?></td>

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
		<table>
			<tr>
				<th>答え:</th>

				<!-- 答え -->
				<?php
			    if ($array_answer['questions_id'] == $array_question['id']) {

			        $answer = $array_answer['answer'];

			    }
				?>
				<td><?php echo $answer; ?></td>
			</tr>
		</table>

	</div>
</body>
</html>