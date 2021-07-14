<?php
include 'connect.php';
$post=htmlentities(trim($_POST['post']));
$zp=htmlentities(trim($_POST['zp']));


if (isset($post) && isset($zp))
{
    $sql="INSERT INTO post (post, zp) VALUES ('$post', '$zp')";
    $result=mysqli_query($link, $sql);
    if ($result){
        echo "Данные успешно добавлены";
    }
    else{
        echo "Произошла ошибка: ".mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных post</title>
</head>
<body>
	<form action="header_pat.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>