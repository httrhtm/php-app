<?php
require 'db_connection.php';
session_start();
// --------------------------------------------------
// ログインユーザーを取得する
// --------------------------------------------------
$user_name = $_SESSION['name'];
// --------------------------------------------------
// パラメーターを取得する
// --------------------------------------------------
$questions_id = $_POST['question_id'];
$questions = $_POST['question'];
$input_answers = $_POST['answer'];
// --------------------------------------------------
// 答え（正解）をDBから取得する
// --------------------------------------------------
if (isset($db)) {
    $sql = 'select id, questions_id, answer from correct_answers';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $array_answer = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// --------------------------------------------------
// 配列の中身を変数に入れる
// --------------------------------------------------
$question_id = array_column($array_answer, 'questions_id');
$answer = array_column($array_answer, 'answer');
// --------------------------------------------------
// 問題数、答えの数を変数に入れる
// --------------------------------------------------
$question_total = count($questions);
$answer_total = count(array_column($array_answer, 'answer'));
// --------------------------------------------------
// 正誤判定を行、正解数を取得する
// --------------------------------------------------
$point = 0;

//問題の数ループする
for($i = 0; $i < $question_total; $i++){

    //答えの数ループする
    for($j = 0; $j < $answer_total; $j++){

        //idとquestions_idが同じでない場合、以下の処理をスキップ
        if(!strcmp($questions_id[$i], $question_id[$j]) == 0){
            continue;
        }

        //入力値の数ループする
        for($k = 0; $k < count($input_answers); $k++) {

            //入力値と回答が同じ場合ポイントを追加
            if(strcmp($input_answers[$k], ($answer[$j])) == 0) {
                $point++;
                break;
            }
        }
    }
}
// --------------------------------------------------
// 正解数から得点を算出する
// --------------------------------------------------
$score = round(($point * 100) / $question_total);
// --------------------------------------------------
// 現在時刻を取得する
// --------------------------------------------------
$date = date("Y/m/d H:i:s");
// --------------------------------------------------
// DBに登録する
// --------------------------------------------------

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>test result</title>
</head>
<body>
	<p>テスト結果</p>

	<?php include('./nav.php'); ?>


	<!-- 詳細 -->
	<div class="test-result">
		<table>
			<tr>
    			<!-- ログインユーザー名 -->
    			<td><?= $user_name ?>さん</td>
    		</tr>
    		<tr>
    			<!-- 問題数と正解数 -->
    			<td><?= $question_total ?>問中<?= $point ?>問正解です。</td>
    		</tr>
    		<tr>
    			<!-- 点数 -->
    			<td><?= $score ?>点でした</td>
			</tr>
		</table>

	   <!-- 現在時刻 -->
    	<div class="date">
    		<p><?= $date ?></p>
    	</div>
	</div>
</body>
</html>