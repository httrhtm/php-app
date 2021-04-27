<?php
// --------------------------------------------------
// バリデーション
// --------------------------------------------------
    session_start();
    if (!empty($_POST) && empty($_SESSION['input_data'])) {

        $question = $_POST['question'];
        $answers = $_POST['answer'];

        //問題
        if (empty($question)) {
            $error_message['question'] = '問題を入力して下さい';
        } elseif (mb_strlen($question) > 500) {
            $error_message['question'] = '問題を500文字以内で入力してください';
        }

        //答え
        foreach ($answers as $answer) {
            if (empty($answer)) {
                $error_message['answer'] = '答えを入力して下さい';
            } elseif (mb_strlen($answer) > 200) {
                $error_message['answer'] = '答えを200文字以内で入力してください';
            }

        }

        //エラー内容チェック -- エラーがなければregister_confirm.phpへリダイレクト
        if (empty($error_message)) {
            $_SESSION['input_data'] = $_POST;
            header('Location:./register_confirm.php', true, 307);
            exit();
        }
    } elseif (!empty($_SESSION['input_data'])) {
        $_POST = $_SESSION['input_data'];
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>register</title>
<script type="text/javascript">
//--------------------------------------------------
//追加ボタン
//--------------------------------------------------
var i = 1;
function addForm() {
	var table = document.getElementById("table");

	// 行を行末に追加
    var row = table.insertRow(-1);

	//td分追加
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
	var cell3 = row.insertCell(-1);

	// セルの内容入力
    cell1.innerHTML = '<p>答え:</p>';
	cell2.innerHTML = '<input name="answer[]" id ="answer' + i + '" class="input">'
	cell3.innerHTML = '<input type="button" value="削除" id="delBtn'+ i + '" class="delbtn" onclick="removeForm(this);">'

	i++;
}
//--------------------------------------------------
//削除ボタン
//--------------------------------------------------
 function removeForm(obj){
    if (!obj)
        return;

    var objTR = obj.parentNode.parentNode;
    var objTBL = objTR.parentNode;

    if (objTBL)
        objTBL.deleteRow(objTR.sectionRowIndex);

    // id/name ふり直し
    var tagElements = document.getElementsByTagName("input");
    if (!tagElements)
        return false;

    // <input type="text" id="txtN">
    var seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("input"))
        {
            tagElements[i].setAttribute("id", "answer" + seq);
            tagElements[i].setAttribute("name", "answer[]");
            ++seq;
        }
    }

    // <input type="button" id="delBtnN">
    seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("delbtn"))
        {
            tagElements[i].setAttribute("id", "delBtn" + seq);
            ++seq;
        }
    }
}
</script>
</head>
<body>
	<p>問題・答え登録</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="register">

		<form action="register.php" method="post" autocomplete="off">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<input name="question">
					</td>
				</tr>
			</table>
			<span>
				<?php echo isset($error_message['question']) ? $error_message['question'] : ''; ?>
			 </span>

			<!-- 答え -->
			<table id="table">
				<tr>
					<th>答え:</th>

					<td>
						<input name="answer[]" id ="answer0">
					</td>

					<td>
						<input type="hidden" value="削除" onclick="removeForm(this)">
					</td>

				</tr>
			</table>
			<span>
				<?php echo isset($error_message['answer']) ? $error_message['answer'] : ''; ?>
			 </span>

			<br>
			<button type="button" onclick="location.href='list.php'">戻る</button>
			<input type="button" value="追加" onclick="addForm()">
			<button type="submit">確認</button>

		</form>

	</div>
</body>
</html>