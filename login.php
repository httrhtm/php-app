<?php

session_start();
require 'db_connection.php';

// --------------------------------------------------
// POSTで送信されてきたIDがDBにあるか検索
// --------------------------------------------------

// 直接入れると参照できないためPHP変数に入れる
$id = $_POST['id'];
$password = $_POST['password'];

try {
    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = 'select id, name, password from users where id = :id';
    $stmt = $db->prepare($sql);

    //指定された変数名にパラメータをバインド
    $stmt->bindParam(':id', $id);

    //実行
    $stmt->execute();

    // PDO::FETCH_ASSOC：列名を記述し配列で取り出す
    // fetch：取り出す
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //例外処理
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

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
    $_SESSION['login'] = $result['id'];
    $_SESSION['login'] = $result['name'];
    $_SESSION['login'] = $result['password'];

    // topページにリダイレクト
    header("Location: top.php");
    exit();
}
