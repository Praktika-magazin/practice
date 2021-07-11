<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Добавление в таблицу данных employee</title>
</head>

<body>
    <h1> Добавление данных в таблицу employee </h1>
    <form action="insert_insert4.php" method="post" name="action">
        <table>
            <tr>
                <td> Введите ФИО Сотрудника </td>
                <td> <input type="text" name="fio_employee"> </td>
            </tr>
            <tr>
                <td> Введите id сотрудника </td>
                <td> <input type="text" name="id_employee"></td>
            </tr>
            <tr>
                <td> Укажите дату рождения сотрудника </td>
                <td> <input type="date" name="date_of_birth"></td>
            </tr>
            <tr>
                <td> Введите телефонный номер сотрудника </td>
                <td> <input type="text" name="phone_num"></td>
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
            <td> Пол </td>
            <td>
                <input type="radio" name="gender" value="Женский">Женский пол
                <input type="radio" name="gender" value="Мужской">Мужской пол
            </td>
            <!--</tr>-->
            <tr>
                <td> Опыт работы сотрудника сотрудника</td>
                <td> <select name="experience">
                        <option value="Без опыта работы"> Без опыта работы </option>
                        <option value="Менее 3-ех лет"> Менее 3-ех лет </option>
                        <option value="Более 3-ех лет"> Более 3-ех лет </option>
                        <option value="Более 5 лет"> Более 5 лет </option>
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Поиск в таблице сотрудники</title>
</head>

<body>

    <form method="post">
        <table>
            <tr>
                <h1> Поиск в таблице сотрудники</h1>
                <td> Поле для поиска </td>
                <td><input type="text" name="poisk" value="<?=$_POST['poisk']; ?>"></td>
              
            </tr>
        </table>
        <ul>
            <li>1 ФИО от А до Я</li>
            <li>2 ФИО от Я до А</li>
            <li>3 Телефон сотрудника по возрастанию</li>
            <li>4 Телефон сотрудника по убыванию</li>
                   <li>
                <td>Выберете способ сортировки <input type="text" name="sort2" value="<?=$_POST['sort2']; ?>"> </td>
            </li>
             <li>  <td><input type="submit" name="submit" value="ОК"></td></li>
        </ul>
    </form>
</body>

</html>
<?php

include('connect.php');

$sorting = $_GET['sort']; 
switch ($sorting) { 
 case "fio-asc": 
 $sorting_sql = 'ORDER BY fio_employee ASC'; 
 break; 
 case "fio-desc": 
 $sorting_sql = 'ORDER BY fio_employee DESC'; 
 break; 
 case "default": 
 $sorting_sql = ''; 
 break;
 case "phonenum-asc": 
 $sorting_sql = 'ORDER BY phone_num ASC'; 
 break;
 case "phonenum-desc": 
 $sorting_sql = 'ORDER BY phone_num DESC'; 
 break;
} 
 while ($row1 = mysqli_fetch_array($result_sql)) { 
 echo 
 '<tr>' . 
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
 '</tr>'; 
 } 
 echo '</table>'; 
$sort2 = $_POST['sort2'];
$sort3 = $_POST['sort3'];
$poisk = $_POST['poisk'];
$reser = $_POST['reset'];
if($sort2==1)
{
if (empty($poisk))
{ 
$sql = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post";
$result = mysqli_query($link, $sql);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row_inner = mysqli_fetch_array($result)) {
echo
'<tr>' .
"<td> {$row_inner['fio_employee']} </td>" .
"<td> {$row_inner['id_employee']}</td>".
"<td> {$row_inner['date_of_birth']}</td>".
"<td> {$row_inner['phone_num']}</td>".
"<td> {$row_inner['post']}</td>".
"<td> {$row_inner['gender']}</td>".
"<td> {$row_inner['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
    else {
$sqllike = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post WHERE employee.fio_employee LIKE '%$poisk%' OR employee.id_employee 
LIKE '%$poisk%' OR employee.date_of_birth LIKE '%$poisk%' OR employee.phone_num LIKE '%$poisk%' OR 
post.post LIKE '%$poisk%' OR employee.gender LIKE '%$poisk%' OR employee.experience LIKE '%$poisk%'ORDER BY fio_employee ASC";
$res = mysqli_query($link, $sqllike);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row1 = mysqli_fetch_array($res)) { 
echo
'<tr>' .
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
}
elseif(($sort2==2)) {
$sqllike = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post WHERE employee.fio_employee LIKE '%$poisk%' OR employee.id_employee 
LIKE '%$poisk%' OR employee.date_of_birth LIKE '%$poisk%' OR employee.phone_num LIKE '%$poisk%' OR 
post.post LIKE '%$poisk%' OR employee.gender LIKE '%$poisk%' OR employee.experience LIKE '%$poisk%'ORDER BY fio_employee DESC";
$res = mysqli_query($link, $sqllike);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row1 = mysqli_fetch_array($res)) { 
echo
'<tr>' .
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
elseif(($sort2==3)) {
$sqllike = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post WHERE employee.fio_employee LIKE '%$poisk%' OR employee.id_employee 
LIKE '%$poisk%' OR employee.date_of_birth LIKE '%$poisk%' OR employee.phone_num LIKE '%$poisk%' OR 
post.post LIKE '%$poisk%' OR employee.gender LIKE '%$poisk%' OR employee.experience LIKE '%$poisk%'ORDER BY phone_num ASC";
$res = mysqli_query($link, $sqllike);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row1 = mysqli_fetch_array($res)) { 
echo
'<tr>' .
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 

elseif(($sort2==4)) {
$sqllike = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post WHERE employee.fio_employee LIKE '%$poisk%' OR employee.id_employee 
LIKE '%$poisk%' OR employee.date_of_birth LIKE '%$poisk%' OR employee.phone_num LIKE '%$poisk%' OR 
post.post LIKE '%$poisk%' OR employee.gender LIKE '%$poisk%' OR employee.experience LIKE '%$poisk%'ORDER BY phone_num DESC";
$res = mysqli_query($link, $sqllike);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row1 = mysqli_fetch_array($res)) { 
echo
'<tr>' .
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
elseif(empty($sort2))
{
if (empty($poisk))
{ 
$sql = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post";
$result = mysqli_query($link, $sql);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row_inner = mysqli_fetch_array($result)) {
echo
'<tr>' .
"<td> {$row_inner['fio_employee']} </td>" .
"<td> {$row_inner['id_employee']}</td>".
"<td> {$row_inner['date_of_birth']}</td>".
"<td> {$row_inner['phone_num']}</td>".
"<td> {$row_inner['post']}</td>".
"<td> {$row_inner['gender']}</td>".
"<td> {$row_inner['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
    else {
$sqllike = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post WHERE employee.fio_employee LIKE '%$poisk%' OR employee.id_employee 
LIKE '%$poisk%' OR employee.date_of_birth LIKE '%$poisk%' OR employee.phone_num LIKE '%$poisk%' OR 
post.post LIKE '%$poisk%' OR employee.gender LIKE '%$poisk%' OR employee.experience LIKE '%$poisk%'";
$res = mysqli_query($link, $sqllike);
echo '<table border=1>'.
'<tr>'.
'<td> ФИО сотрудника </td>'.
'<td> Код сотрудника </td>'.
'<td>Дата рождения сотрудника</td>'.
'<td>Телефон сотрудника</td>'.
'<td>Код должности сотрудника</td>'.
'<td>Пол сотрудника</td>'.
'<td>Опыт работы</td>'.
'</tr>';
while ($row1 = mysqli_fetch_array($res)) { 
echo
'<tr>' .
"<td> {$row1['fio_employee']} </td>" .
"<td> {$row1['id_employee']}</td>".
"<td> {$row1['date_of_birth']}</td>".
"<td> {$row1['phone_num']}</td>".
"<td> {$row1['post']}</td>".
"<td> {$row1['gender']}</td>".
"<td> {$row1['experience']}</td>".
'</tr>';
} 
echo '</table>';
} 
}
?>


<?php 
 include 'connect.php'; 
 if (isset($_GET['del_id'])){$sql_delete = "DELETE FROM employee WHERE id_employee = {$_GET['del_id']}"; 
 $result_delete = mysqli_query ($link, $sql_delete); 
 if ($result_delete) { 
 header('Location: index_employee_admin.php'); 
 } else { 
 echo '<p>Произошла ошибка: ' . 
mysqli_error($link) . '</p>'; 
 } 
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
            <td> ФИО сотрудника </td>
            <td> Код сотрудника </td>
            <td> Дата рождения сотрудника </td>
            <td> Телефон сотрудника </td>
            <td> Должность </td>
            <td> Пол сотрудника </td>
            <td> Опыт работы </td>

        </tr>
        <?php 
     $sql_state = "SELECT employee.fio_employee, employee.id_employee, employee.date_of_birth, employee.phone_num, employee.id_post, employee.gender, employee.experience, post.id_post, post.post, post.zp, post.bonus FROM employee INNER JOIN post ON employee.id_post=post.id_post;";
$result_state = mysqli_query($link, $sql_state);
while ($row_state = 
mysqli_fetch_array($result_state)) { 
 echo '<tr>' .
"<td> {$row_state['fio_employee']} </td>" .
"<td> {$row_state['id_employee']}</td>".
"<td> {$row_state['date_of_birth']}</td>".
"<td> {$row_state['phone_num']}</td>".
"<td> {$row_state['post']}</td>".
"<td> {$row_state['gender']}</td>".
"<td> {$row_state['experience']}</td>".
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