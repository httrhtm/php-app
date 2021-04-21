<?php

require 'db_connection.php';

// 変数に入れる
$question = $_POST['question'];
$answers = $_POST['answer']; //配列

// --------------------------------------------------
// 問題の登録
// --------------------------------------------------
$sql = 'insert into questions (question, created_at) values (:question, current_timestamp())';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':question' => $question]);
?>