<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу department</h1>
	<form action="insert_department.php" method="post" name="action">
		<table>
			<tr>
				<td> Введите название отдела </td>
                <td> <input type="text" name="name"></td>
            <tr>
                <td> Bведите сотрудника, выполняющего процедуру</td>
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
            <td><input type="submit" value="Добавить данные">
                <input type ="reset" value="Очистить форму"></td>
			</tr>
		</table>
	</form>
    <form action="header_ser.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>