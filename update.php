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
    
    if (isset($_GET['red_id'])) { 
        $sql_select = "SELECT fullname, id_employee, date_of_birthday, id_post from employee WHERE id_employee = {$_GET['red_id']}"; 
        $result_select = mysqli_query($link, $sql_select); 
    $row = mysqli_fetch_array($result_select); 
    } 
     
//     
//
//     $inner = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post;";
//$result_inner = mysqli_query ($link, $inner);
//                        if ($result_inner) { 
// echo '<p>Успешно!</p>';
// } else { 
// echo '<p>Произошла ошибка: ' . mysqli_error($link) 
//. '</p>'; 
// }
//   $row_inner = mysqli_fetch_array($result_inner);
//     
//     
//     
// if ($result_update) { 
// echo '<p>Успешно!</p>';
// } else { 
// echo '<p>Произошла ошибка: ' . mysqli_error($link) 
//. '</p>'; 
// } 
 } 
 
 if (isset($_GET['red_id'])) { 
     $sql_select = "SELECT fio_employee, id_employee, date_of_birth, phone_num, id_post, gender, experience from employee WHERE id_employee = {$_GET['red_id']}"; 
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
                <td><input type="text" name="fio_employee" value="<?= 
isset($_GET['red_id']) ? $row['fio_employee'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Код сотрудника</td>
                <td><input type="text" name="id_employee" value="<?= 
isset($_GET['red_id']) ? $row['id_employee'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Дата рождения</td>
                <td><input type="text" name="date_of_birth" value="<?= 
isset($_GET['red_id']) ? $row['date_of_birth'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Tелефонный номер сотрудника</td>
                <td><input type="text" name="phone_num" value="<?= 
isset($_GET['red_id']) ? $row['phone_num'] : ''; ?>"></td>
            </tr>
            
            <tr>
                <td>Пол</td>
                <td><input type="text" name="gender" value="<?= 
isset($_GET['red_id']) ? $row['gender'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Опыт работы</td>
                <td><input type="text" name="experience" value="<?= 
isset($_GET['red_id']) ? $row['experience'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Должность сотрудника</td>
                <td>

<!--
                    <input type="text" name="id_post" value="<?= 
isset($_GET['red_id']) ? $row['id_post'] : ''; ?>">
-->


                                               <select name="id_post">
                        <?php
                        
                        
//подключаемся к базе данных
//include 'connect.php';
// $inner = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post;";
//$result_inner = mysqli_query ($link, $inner);
//                        if ($result_inner) { 
// echo '<p>Успешно!</p>';
// } else { 
// echo '<p>Произошла ошибка: ' . mysqli_error($link) 
//. '</p>'; 
// } 
//$row_inner = mysqli_fetch_array($result_inner);
//    echo    "<option>" "<input value=" .isset($_GET['red_id']) ? $row['id_post'] : '';" >". "</option>";

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
// "<option value = ' ".$row['id_post']." '>".$row['post']."</option>";
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
