

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
        //подключаемся к базе данных
include 'connect.php';
     $sql_state = "SELECT employee.fullname, employee.id_employee, employee.date_of_birthday,  post.post FROM employee INNER JOIN post ON employee.id_post=post.id_post;";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
 "<td> {$row_state['id_employee']}</td>".
"<td> {$row_state['fullname']} </td>" .

"<td> {$row_state['date_of_birthday']}</td>".
"<td> {$row_state['post']}</td>".

'</tr>'; 
 } 
 ?>
    </table>
    <form action="user1.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>