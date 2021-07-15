<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Добавление в таблицу данных contract</title>
</head>

<body>
    <h1> Добавление данных в таблицу employee </h1>
    <form action="insert_contract.php" method="post" name="action">
        <table>
        <tr>
                <td> Введите id договора </td>
                <td> <input type="text" name="id_contract"></td>
            </tr>
            <tr>
                <td> Выберете ФИО Сотрудника </td>
                <td> <select name="id_employee">
                        <?php
                //подключаемся к базе данных
                include 'connect.php';
                //выполняем запрос, для получения данных из таблицы post
                $sql_select = "SELECT id_employee, fullname FROM employee";
                $result_select = mysqli_query($link, $sql_select);
                //циклом формируем значения, которые были получены в результате выполнения запроса
                while ($row = mysqli_fetch_array($result_select))
                {
                //выводим данные из запроса в поле select
                echo
                "<option value = ' ".$row['id_employee']." '>".$row['fullname']."</option>";
                }
                ?>
                    </select> </td>
            </tr>
          
            <tr>
                <td> Укажите дату рождения сотрудника </td>
                <td> <input type="date" name="date_of_birthday"></td>
            </tr>
            <tr>

                <td> Введите должность сотрудника </td>
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

<td> Выберете отдел сотрудника </td>
<td> <select name="id_department">
        <?php
//подключаемся к базе данных
include 'connect.php';
//выполняем запрос, для получения данных из таблицы post
$sql_select = "SELECT id_department, name FROM department";
$result_select = mysqli_query($link, $sql_select);
//циклом формируем значения, которые были получены в результате выполнения запроса
while ($row = mysqli_fetch_array($result_select))
{
//выводим данные из запроса в поле select
echo
"<option value = ' ".$row['id_department']." '>".$row['name']."</option>";
}
?>
    </select>
</td>
</tr>
            <tr>
                <td><input type="submit" value="Добавить данные">
                    <input type="reset" value="Очистить форму">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php 
 include 'connect.php'; 
 if (isset($_GET['del_id'])){$sql_delete = "DELETE FROM employee WHERE id_employee = {$_GET['del_id']}"; 
 $result_delete = mysqli_query ($link, $sql_delete);  
 } 
 ?>

<!DOCTYPE html>
<html>

<head>
    <title> редактирование </title>
</head>

<body>
    <h2> Таблица "Сотрудники" </h2>
    <table border=1>
        <tr>
            <td> Код сотрудника </td>
            <td> ФИО сотрудника </td>
            
            <td> Дата рождения сотрудника </td>
            <td> Должность </td>

        </tr>
        <?php 
     $sql_state = "SELECT employee.fullname, employee.id_employee, employee.date_of_birthday, employee.id_post, post.id_post, post.post, post.zp FROM employee INNER JOIN post ON employee.id_post=post.id_post;";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
 "<td> {$row_state['id_employee']}</td>".
"<td> {$row_state['fullname']} </td>" .

"<td> {$row_state['date_of_birthday']}</td>".
"<td> {$row_state['post']}</td>".
"<td><a href='?del_id={$row_state['id_employee']}'>Удалить</a></td>".
"<td><a href='update.php?red_id={$row_state['id_employee']}'>Изменить</a></td>".
'</tr>'; 
 } 
 ?>
    </table>
    <form action="header02.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>