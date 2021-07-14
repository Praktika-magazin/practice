<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM post WHERE id_post = {$_GET['del_id']}";
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
	<li> <a href="index_post_admin.php?sort=fullName-asc"> ФИО от А до Я
</a></li>
<li><a href="index_post_admin.php?sort=fullName-desc"> ФИО от Я до А
</a></li>
<li><a href="index_post_admin.php?sort=default"> ФИО по умолчанию
</a></li>
</ul>
	<form action="index_patients_insert.php" method="post">
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
	case "post-asc":
$sorting_sql = 'ORDER BY post ASC';
break;
case "post-desc":
$sorting_sql = 'ORDER BY post DESC';
break;
case "default":
$sorting_sql = '';
}
$poisk = $_POST['poisk'];
$reser = $_POST['reset']; if (empty($poisk))
{
$sql = "SELECT SELECT * FROM post $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>ID</td>'.
'<td>Должность</td>'.
        '<td>Заработная плата</td>'.
        
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo 
		'<tr>'.
		"<td> {$row['id_post']} </td>" .
"<td> {$row['post']}</td>".
            "<td> {$row['zp']}</td>".

            "<td><a href='?del_id={$row['id_post']}'>Удалить</a> </td>".
				"<td><a href='update_patients.php?red_id={$row['id_post']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
} else {
	$sqllike = "SELECT * FROM patients WHERE Id_patient LIKE '%$poisk%' OR fullName
LIKE '%$poisk%' OR Date_of_Birthe LIKE '%$poisk%' OR Phone LIKE '%$poisk%' OR Address LIKE '%$poisk%' $sorting_sql";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>ID</td>'.
'<td>ФИО</td>'.
'<td>Дата рождения</td>'.
'<td>Телефон</td>'.
'<td>Адрес</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['Id_patient']} </td>" .
"<td> {$row1['fullName']}</td>".
"<td> {$row1['Date_of_Birthe']}</td>".
"<td> {$row1['Phone']}</td>".
"<td> {$row1['Address']}</td>".
            "<td><a href='?del_id={$row['Id_patient']}'>Удалить</a> </td>".
				"<td><a href='update_patients.php?red_id={$row['Id_patient']}'>Изменить</a></td>".//////////////////////
		'</tr>';
	}
	echo '</table>';
}

?>