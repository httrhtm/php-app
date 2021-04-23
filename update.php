<?php
require 'db_connection.php';
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// PHP変数に入れる
$question_id = $_POST['question_id'];
$question = $_POST['question'];
$answers_id = $_POST['answer_id']; //配列
$answers = $_POST['answer']; //配列

// --------------------------------------------------
// 問題を更新
// --------------------------------------------------
$sql = 'update questions set question = :question, updated_at = current_timestamp() where id = :id';
$stmt = $db->prepare($sql);

$params = array(':question' => $question, ':id' => $question_id);

//実行
$stmt->execute($params);

// --------------------------------------------------
// 答えを更新
// --------------------------------------------------
$sql = 'update correct_answers set answer = :answer, updated_at = current_timestamp() where id = :id';
$stmt = $db->prepare($sql);

for ($i = 0; $i < count($answers); $i++){

    $params = array(':answer' => $answers[$i], ':id' => $answers_id[$i]);

    $stmt->execute($params);

}

// listページにリダイレクト
header("Location: list.php");

?>