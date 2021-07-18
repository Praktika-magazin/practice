<!DOCTYPE html>
<html>

<head>
    <title> просмотр </title>
</head>

<body>
    <h2> Таблица "Должность" </h2>
    <table border=1>
        <tr>
            <td> Код должности </td>
            <td> Должность </td>
            
            <td> Заработная плата </td>
            

        </tr>
        
        <?php 
        //подключаемся к базе данных
include 'connect.php';
     $sql_state = "SELECT * FROM post;";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
"<td> {$row_state['id_post']} </td>" .
"<td> {$row_state['post']}</td>".
            "<td> {$row_state['zp']}</td>".


'</tr>'; 
 } 
 ?>
    </table>
    <form action="user1.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>