<?php
session_start();
require 'db_connection.php';
// --------------------------------------------------
// ログインユーザーを取得する
// --------------------------------------------------
$user_name = $_SESSION['name'];
$user_id = $_SESSION['id'];
// --------------------------------------------------
// 履歴を取得
// --------------------------------------------------
if (isset($db)) {
    $sql = 'select * from histories';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $array_history = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>history</title>
</head>
<body>
	<p>履歴</p>

	<?php include('./nav.php'); ?>

	<!-- history -->
	<div class="history">

		<table border = 1>
			<tr>
				<th>氏名</th>
				<th>得点</th>
				<th>採点時間</th>
			</tr>

    		<?php
    		foreach ( $array_history as $history ) {
    		    if (strcmp($history['users_id'], $user_id) == 0)
    		?>
			<tr>
				<td><?= $user_name ?></td>
				<td><?= $history['point'] ?></td>
				<td><?= $history['created_at'] ?></td>
			</tr>
			<?php
    		}
			?>
		</table>

	</div>
</body>
</html>