<?php 
include 'connect.php'; 
 //Если переменная Name передана
 if (isset($_POST['education'])) { 
 //Если это запрос на обновление, то обновляем
 if (isset($_GET['red_id'])) { 
 $sql_update = "UPDATE contract SET id_contract = '{$_POST['id_contract']}', id_employee = '{$_POST['id_employee']}', id_department = '{$_POST['id_department']}', id_post = '{$_POST['id_post']}' 
 date_of_issue = '{$_POST['date_of_issue']}', education = '{$_POST['education']}',premium = '{$_POST['premium']}' WHERE id_contract = {$_GET['red_id']}"; 
 $result_update = mysqli_query($link, $sql_update); 
 } 
 } 
 
 if (isset($_GET['red_id'])) { 
     $sql_select = "SELECT id_contract , id_employee, id_department, id_post
     date_of_issue, education, premium WHERE id_contract = {$_GET['red_id']}";
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
            <tr>
                <td>Должность сотрудника</td>
                <td>
                    <select name="id_post">
                        <?php

//выполняем запрос, для получения данных из таблицы post
$sql_select = "SELECT id_post, post FROM post";
$result_select = mysqli_query($link, $sql_select);
//циклом формируем значения, которые были получены в результате выполнения запроса
echo    "<option value = ' ".$row['id_post']." '>".$row['id_post']."</option>";

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