<?php 
include 'connect.php'; 
 //Если переменная Name передана
 if (isset($_POST['fullname'])) { 
 //Если это запрос на обновление, то обновляем
 if (isset($_GET['red_id'])) { 
 $sql_update = "UPDATE employee SET fullname = 
'{$_POST['fullname']}', id_employee = '{$_POST['id_employee']}', date_of_birthday = 
'{$_POST['date_of_birthday']}'
id_post = '{$_POST['id_post']}' WHERE id_employee = 
{$_GET['red_id']}"; 
 $result_update = mysqli_query($link, $sql_update); 
 } 
 
 if ($result_update) { 
 echo '<p>Успешно!</p>';
 } else { 
 echo '<p>Произошла ошибка: ' . mysqli_error($link) 
. '</p>'; 
 } 
 } 
 
 if (isset($_GET['red_id'])) { 
     $sql_select = "SELECT fullname, id_employee, date_of_birthday, id_post from employee WHERE id_employee = {$_GET['red_id']}"; 
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
                <td>ФИО сотрудника</td>
                <td><input type="text" name="fullname" value="<?= 
isset($_GET['red_id']) ? $row['fullname'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Код сотрудника</td>
                <td><input type="text" name="id_employee" value="<?= 
isset($_GET['red_id']) ? $row['id_employee'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Дата рождения</td>
                <td><input type="text" name="date_of_birthday" value="<?= 
isset($_GET['red_id']) ? $row['date_of_birthday'] : ''; ?>"></td>
            </tr>
                <td>Должность сотрудника</td>
                <td> <select name="id_post">
                        <?php
//подключаемся к базе данных
include 'connect.php';
//выполняем запрос, для получения данных из таблицы post
$sql_select = "SELECT id_post, post FROM post";
$result_select = mysqli_query($link, $sql_select);
//циклом формируем значения, которые были получены в результате выполнения запроса
while ($row = mysqli_fetch_array($result_select))
{
//выводим данные из запроса в поле select
echo
 "<option value = ' ".$row['id_post']." '>".$row['post']."</option>";
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
    <form action="header.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>

