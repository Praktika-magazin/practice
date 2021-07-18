<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Добавление в таблицу данных contract</title>
</head>

<body>
    <h1> Добавление данных в таблицу contract </h1>
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
                <td> Укажите дату принятия договора </td>
                <td> <input type="date" name="date_of_issue"></td>
            </tr>
            <tr>
                <td> Введите образование </td>
                <td> <input type="text" name="education"></td>
            </tr>
            <tr>
                <td> Введите размер премии </td>
                <td> <input type="text" name="premium"></td>
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
 if (isset($_GET['del_id'])){$sql_delete = "DELETE FROM contract WHERE id_contract = {$_GET['del_id']}"; 
 $result_delete = mysqli_query ($link, $sql_delete);  
 } 
 ?>

<!DOCTYPE html>
<html>

<head>
    <title> редактирование </title>
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
     $sql_state = "SELECT contract.id_contract, employee.fullname, post.post, department.name, contract.date_of_issue, contract.education, contract.premium FROM contract INNER JOIN post ON contract.id_post=post.id_post 
     INNER JOIN employee ON contract.id_employee = employee.id_employee INNER JOIN department ON contract.id_department = department.id_department ";
        $result_state = mysqli_query($link, $sql_state);
        while ($row_state = mysqli_fetch_array($result_state)) { 
        echo '<tr>' .
        "<td> {$row_state['id_contract']}</td>".
        "<td> {$row_state['fullname']} </td>" .
        "<td> {$row_state['post']}</td>".
        "<td> {$row_state['name']}</td>".
        "<td> {$row_state['date_of_issue']}</td>".
        "<td> {$row_state['education']}</td>".
        "<td> {$row_state['premium']}</td>".
        "<td><a href='?del_id={$row_state['id_contract']}'>Удалить</a></td>".
        "<td><a href='update_cont.php?red_id={$row_state['id_contract']}'>Изменить</a></td>".
        '</tr>'; 
        } 
        ?>
    </table>
    <form action="header_tab.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>

</html>