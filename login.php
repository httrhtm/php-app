<?php

session_start();
require 'db_connection.php';

// --------------------------------------------------
// POSTで送信されてきたIDがDBにあるか検索
// --------------------------------------------------

// 直接入れると参照できないためPHP変数に入れる
$id = $_POST['id'];
$password = $_POST['password'];

$sql = 'select id, name, password from users where id = :id';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':id' => $id]);

// PDO::FETCH_ASSOC：列名を記述し配列で取り出す
// fetch：取り出す
$result = $stmt->fetch(PDO::FETCH_ASSOC);



// --------------------------------------------------
// idに対してパスワードが正しいか検証
// --------------------------------------------------

// 【正しくないとき】
// password_verify：(a, b)：aがbにマッチするか調べる
if (! strcmp($password, $result['password']) == 0) {

    header('Location: login_form.php');
}

// 【正しいとき】
else {
    // session_idを発行
    session_regenerate_id(true);

    // loginセッションに登録
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['password'] = $result['password'];

    // topページにリダイレクト
    header("Location: top.php");
    exit();
}
