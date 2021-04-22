<?php
// $error_message = array();


if (empty($question)) {

    // $error_message[] = "問題を入力してください";
    header('Location:./register.php');
} elseif (mb_strlen($question) > 500) {

    // $error_message[] = "問題の文字数が500文字を超えています";
    header('Location:./register.php');
} else {

    foreach ($answers as $answer) {

        if (empty($answer)) {

            // $error_message[] = "答えを入力してください";
            header('Location:./register.php');
        } elseif (mb_strlen($answer) > 200) {

            // $error_message[] = "答えの文字数が200文字を超えています";
            header('Location:./register.php');
        }
    }
}


// header('Location:./register.php');
?>