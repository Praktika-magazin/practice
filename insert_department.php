<?php
include 'connect.php';
$name=htmlentities(trim($_POST['name']));
$id_employee=array();
$id_employee=htmlentities(trim($_POST['id_employee']));

if (isset($name) && isset($id_employee))
{
    $sql="INSERT INTO department (name, id_employee) VALUES ('$name', '$id_employee')";
    $result=mysqli_query($link, $sql);
    if ($result){
        echo "Данные успешно добавлены";
    }
    else{
        echo "Произошла ошибка: ".mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных department</title>
</head>
<body>
	<form action="header_ser.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>