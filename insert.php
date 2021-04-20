<?php
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