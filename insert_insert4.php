<?php
//подключаем файл сonnect.php
include 'connect.php';
//объявлем переменные, имя переменной должно соответствовать атрибуту name в
//поле input или select
//htmlentities используетсядляпредотвращениявнедрениявредоносныхскриптов. Trim удаляет пробелы перед и после значения переменной
$fullname = htmlentities(trim($_POST['fullname']));
$id_employee = htmlentities(trim($_POST['id_employee']));
$date_of_birthday = htmlentities(trim($_POST['date_of_birthday']));
$id_post = array();
$id_post = htmlentities(trim($_POST['id_post']));
///проверяем, переданы ли значения в переменные
if (isset($fullname) && isset($id_employee) && isset($date_of_birthday) &&
isset($id_post))
{
//формируем запрос на добавление
$sql = "INSERT INTO employee (fullname, id_employee, date_of_birthday, id_post) 
VALUES ('$fullname', '$id_employee', '$date_of_birthday',
'$id_post')";
$result = mysqli_query($link, $sql);
//проверка результат на добавления
if($result) {
echo "Данные успешно добвлены";
}
else {
echo "Произошла ошибка: " . mysqli_error($link);
}
}
//закрываем подключение к бд
mysqli_close($link);
?>
<!--//формируем форму для кнопки возврата назад-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Добавление в таблицу данных state</title>
</head>
<body>
<form action="header.php" method="post">
<input type="submit" value="Вернуться назад">
</form>
</body>
</html>
