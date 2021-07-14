<?php
	include 'connect.php';
	if (isset($_POST['post'])) {

if (isset($_GET['red_id'])) {
$sql_update = "UPDATE post SET post =
'{$_POST['post']}', zp = '{$_POST['zp']}' WHERE id_post = {$_GET['red_id']}";
$result_update = mysqli_query($link, $sql_update);
}
if ($result_update) {
echo '<p>Успешно!</p>';
} else {
echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
}
}
if (isset($_GET['red_id'])) {
$sql_select = "SELECT id_post, post, zp FROM post WHERE id_post = {$_GET['red_id']}";
$result_select = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result_select);
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Редактирование </title>
</head>
<body>
<form action="" method="post">
<table>
<tr>
<td>Должность</td>
<td><input type="text" name="post" value="<?= isset($_GET['red_id']) ? $row['post'] : ''; ?>"></td>
</tr>
    <tr>
<td>Заработная плата</td>
<td><input type="text" name="zp" value="<?= isset($_GET['red_id']) ? $row['zp'] : ''; ?>"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" value="Сохранить"></td>
</tr>
</table>
</form>

<form action="header_pat.php" method="post">
<input type="submit" value="Вернуться назад">
</form>
</body>
</html>