<?php
	include 'connect.php';
	if (isset($_POST['department'])) {

if (isset($_GET['red_id'])) {
$sql_update = "UPDATE department SET name =
'{$_POST['name']}', id_employee = '{$_POST['id_employee']}' WHERE id_department = {$_GET['red_id']}";
$result_update = mysqli_query($link, $sql_update);
}
if ($result_update) {
echo '<p>Успешно!</p>';
} else {
echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
}
}
if (isset($_GET['red_id'])) {
$sql_select = "SELECT * FROM department WHERE id_department = {$_GET['red_id']}";
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
<td>Название отдела</td>
<td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $row['name'] : ''; ?>"></td>
</tr>

<tr>
<td>Cотрудник</td>
<td> <select name="id_employee">
                    <?php
include 'connect.php';
$sql_select="SELECT id_employee, fullname FROM employee";
$result_select=mysqli_query($link, $sql_select);
while($row=mysqli_fetch_array($result_select))
{
echo "<option value = '".$row['id_employee']."'>".$row['fullname']."</option>";
}
?>

</select>
                    </td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Сохранить"></td>
</tr>
</table>
</form>

<form action="header_ser.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>