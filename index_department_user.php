<!DOCTYPE html>
<html>

<head>
    <title> просмотр </title>
</head>

<body>
    <h2> Таблица "Отдел" </h2>
    <table border=1>
        <tr>
            <td> Код отдела </td>
            <td> Отдел </td>
            
            <td> ФИО сотрудника </td>
            

        </tr>
        
        <?php 
        //подключаемся к базе данных
include 'connect.php';
     $sql_state = "SELECT department.id_department, department.name, employee.fullname\n" .
"FROM department INNER JOIN employee ON department.id_employee = employee.id_employee $sorting_sql";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
"<td> {$row_state['id_department']} </td>" .
"<td> {$row_state['name']}</td>".
            "<td> {$row_state['fullname']}</td>".


'</tr>'; 
 } 
 ?>
    </table>
    <form action="user1.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>