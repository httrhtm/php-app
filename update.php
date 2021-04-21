<?php
require 'db_connection.php';
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// PHP変数に入れる
$question_id = $_POST['question_id'];
$question = $_POST['question'];
$answer_id = $_POST['answer_id']; //配列
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
$sql = 'delete from correct_answers where questions_id = :id';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':id' => $id]);

// listページにリダイレクト
header("Location: list.php");

?>