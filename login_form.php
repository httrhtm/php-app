<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');

  session_start();
}

 ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>Login</title>
 </head>
 <body>
   <p>ログイン</p>
   <form  action="login.php" method="post">
     <label for="id">ID</label>
     <input type="text" name="id">
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">login</button>
   </form>
 </body>
</html>