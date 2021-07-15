<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM department WHERE id_department = {$_GET['del_id']}";
		$result_delete = mysqli_query($link, $sql_delete);
		if ($result_delete)
		{
			header('Location: index.php');
		}
		else
		{
			echo '<p>Произошла ошибка: '.mysqli_error($link).'</p>';
		}
	}
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Редактирование</title>
</head>
<body>
   <form method="post">
		<table>
			<tr>
				<td> Поле для поиска </td>
				<td><input	type="text"	name="poisk" value="<?=$_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="ОК"></td>
			</tr>
		</table>
	</form>
    <ul>
        <li> <a href="index_department_admin.php?sort=name-asc"> Название отдела от А до Я
</a></li>
<li><a href="index_department_admin.php?sort=name-desc"> Название отдела от Я до А
</a></li>
<li><a href="index_department_admin.php?sort=default"> Название отдела по умолчанию
</a></li>
    
    </ul>
    <form action="index_department_insert.php" method="post">
        <input type="submit" name="connect" value="Добавить">
    </form>
    <form action="header_tab.php" method="post">
<input type="submit" value="Вернуться назад">
</form>
</body>

</html>
<?php
include 'connect.php';

$sorting = $_GET['sort'];


switch ($sorting) {
	case "name-asc":
$sorting_sql = 'ORDER BY name ASC';
break;
case "name-desc":
$sorting_sql = 'ORDER BY name DESC';
break;
case "default":
$sorting_sql = '';
break;
       
}
$poisk = $_POST['poisk'];
$reser = $_POST['reset']; 
if (empty($poisk))
{
$sql = "SELECT department.id_department, department.name, employee.fullname\n" .
"FROM department INNER JOIN employee ON department.id_employee = employee.id_employee $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>ID</td>'.

        '<td>Отдел</td>'.
'<td>ФИО сотрудника</td>'.
        
        '<td>Удаление</td>'.
        '<td>Редактирование</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['id_department']} </td>" .
"<td> {$row['name']}</td>".
            "<td> {$row['fullname']}</td>".

				"<td><a href='?del_id={$row['id_department']}'>Удалить</a> </td>".
				"<td><a href='update_department.php?red_id={$row['id_department']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
} else {
    $sql1 = "SELECT department.id_department, department.name, employee.fullname\n" .
    "FROM department INNER JOIN employee ON department.id_employee = employee.id_employee $sorting_sql";
	$sqllike = "SELECT * FROM department WHERE id_department LIKE '%$poisk%' OR name LIKE '%$poisk%' OR id_employee LIKE '%$poisk%' ";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>ID</td>'.
'<td>Отдел</td>'.
'<td>Фио сотрудника</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['id_department']} </td>" .
"<td> {$row1['name']}</td>".
"<td> {$row1['fullname']}</td>".

            "<td><a href='?del_id={$row['id_department']}'>Удалить</a> </td>".
				"<td><a href='update_department.php?red_id={$row1['id_department']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
}
?>