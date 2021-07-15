<?php
//подключаем файл сonnect.php
include 'connect.php';
//объявлем переменные, имя переменной должно соответствовать атрибуту name в
//поле input или select
//htmlentities используетсядляпредотвращениявнедрениявредоносныхскриптов. Trim удаляет пробелы перед и после значения переменной
$id_contract = htmlentities(trim($_POST['id_contract']));
$id_employee = htmlentities(trim($_POST['id_employee']));
$id_post = htmlentities(trim($_POST['id_post']));
$id_department = htmlentities(trim($_POST['id_department']));
$date_of_issue = htmlentities(trim($_POST['date_of_issue']));
$id_contract = htmlentities(trim($_POST['education']));
$date_of_issue = htmlentities(trim($_POST['premium']));
///проверяем, переданы ли значения в переменные
if (isset($id_contract) && isset($id_employee) && isset($id_post) &&
isset($id_department)&& isset($date_of_issue)&& isset($education)&& isset($premium))
{
//формируем запрос на добавление
$sql = "INSERT INTO contract (id_contract, id_employee, id_post, id_department, date_of_issue, education, premium) 
VALUES ('$id_contract', '$id_employee', '$id_post','$id_department','$date_of_issue','$education','$premium')";
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
<form action="header_contr.php" method="post">
<input type="submit" value="Вернуться назад">
</form>
</body>
</html>