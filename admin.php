<?php
$exit = $_POST['exit'];
if (!empty($exit)) {
unset($_SESSION['login']);
unset($_SESSION['pass']);
exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' 
content='0; URL=index.php'></head></html>");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Добавление в таблицу данных</title>
</head>

<body>
    <form action="index_employee_admin.php" method="post">
        <input type="submit" name="connect" value="сотрудники">
    </form>
    <form action="index_post_admin.php" method="post">
        <input type="submit" name="connect" value="должность">
    </form>
    <form action="index_department_admin.php" method="post">
        <input type="submit" name="connect" value="отдел">
    </form>
    <form action="index_contract_admin.php" method="post">
        <input type="submit" name="connect" value="Договор">
    </form>
    
    <form method="post">
        <input type="submit" value="Выйти" name="exit">
    </form>
</body>

</html>