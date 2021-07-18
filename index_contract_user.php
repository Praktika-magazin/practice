<!DOCTYPE html>
<html>

<head>
    <title> просмотр </title>
</head>

<body>
    <h2> Таблица "Договор" </h2>
    <table border=1>
        <tr>
            <td> Номер договора </td>
            <td> Сотрудник </td>
            <td> Должность </td>
            <td> Отдел </td>
            <td> Дата договора </td>
            <td> Образование </td>
            <td> Премия </td>
            

        </tr>
        
        <?php 
        //подключаемся к базе данных
include 'connect.php';
     $sql_state = "SELECT contract.id_contract, employee.fullname, post.post, department.name, contract.date_of_issue, contract.education, contract.premium FROM contract INNER JOIN post ON contract.id_post=post.id_post 
     INNER JOIN employee ON contract.id_employee = employee.id_employee INNER JOIN department ON contract.id_department = department.id_department ";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
"<td> {$row_state['id_contract']}</td>".
        "<td> {$row_state['fullname']} </td>" .
        "<td> {$row_state['post']}</td>".
        "<td> {$row_state['name']}</td>".
        "<td> {$row_state['date_of_issue']}</td>".
        "<td> {$row_state['education']}</td>".
        "<td> {$row_state['premium']}</td>".
'</tr>'; 
 } 
 ?>
    </table>
    <form action="user1.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>