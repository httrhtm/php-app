<?php
require 'db_connection.php';
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// PHP変数に入れる
$id = $_POST['question_id'];

// --------------------------------------------------
// 問題を削除
// --------------------------------------------------
$sql = 'delete from questions where id = :id';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':id' => $id]);

// PDO::FETCH_ASSOC：列名を記述し配列で取り出す
// fetch：取り出す
$result_answer = $stmt->fetchAll(PDO::FETCH_ASSOC);


// --------------------------------------------------
// 問題のidと一致する答えを削除
// --------------------------------------------------
$sql = 'delete from correct_answers where questions_id = :id';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':id' => $id]);

// listページにリダイレクト
header("Location: list.php");

?>