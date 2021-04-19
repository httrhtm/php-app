<?php

//サーバー
define("DSN", "mysql:dbname=php_db;host=127.0.0.1:3306;charset=utf8");
// ユーザー名
define("DB_USER", "root");
// パスワード
define("DB_PASS", "hacchan82");

try {
    // PDO = PHP Data Object（データーを扱うオブジェクト）
    $db = new PDO(DSN, DB_USER, DB_PASS);
    // エラーをスロー
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    // 例外処理 = $eで表示する
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

?>