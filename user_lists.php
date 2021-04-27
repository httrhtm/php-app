<?php
require 'db_connection.php';
// --------------------------------------------------
// ユーザーをDBから取得する
// --------------------------------------------------
if (isset($db)) {
    $sql = 'select * from users where deleteflag = 0';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>list</title>
</head>
<body>
	<p>ユーザー一覧</p>

	<?php include('./nav.php'); ?>

	<!-- user register -->
	<div class="user-register">
		<form action="user_register.php" method="post">
			<button type="submit">新規登録</button>
		</form>
	</div>

	<!-- user list -->
	<div class="user-list">
		<table>
			<tr>
				<th>ID</th>
				<th>権限</th>
				<th>ユーザー名</th>
			</tr>

			<?php
    		foreach ( $users as $user ) {
      		?>
			<tr>
				<!-- ID -->
				<td><?= $user['id'] ?></td>

				<!-- admin_flagが1の場合 -->
				<?php
				if (strcmp($user['admin_flag'], '1') == 0){
				?>
					<td>管理者</td>
				<?php
				} else {
				?>
				<!-- admin_flagが1以外の場合 -->
					<td>一般</td>
				<?php
				}
				?>

				<!-- ユーザー名 -->
				<td><?= $user['name'] ?></td>

				<!-- 編集ボタン -->
    			<td>
    				<form action="user_edit.php" method="post">
    					<button type="submit">編集</button>
    					<input type="hidden" name="id" value="<?= $user['id'] ?>">
    					<input type="hidden" name="name" value="<?= $user['name'] ?>" >
    					<input type="hidden" name="password" value="<?= $user['password'] ?>" >
    					<input type="hidden" name="admin_flag" value="<?= $user['admin_flag'] ?>" >
    				</form>
    			</td>

    			<!-- 削除ボタン -->
    			<td>
    				<form action="user_delete_confirm.php" method="post">
    					<button type="submit">削除</button>
    					<input type="hidden" name="id" value="<?= $user['id'] ?>">
    					<input type="hidden" name="name" value="<?= $user['name'] ?>" >
    					<input type="hidden" name="password" value="<?= $user['password'] ?>" >
    					<input type="hidden" name="admin_flag" value="<?= $user['admin_flag'] ?>" >
    				</form>
    			</td>
			<?php
    		}
			?>
			</tr>
		</table>
	</div>
</body>
</html>