<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу post</h1>
	<form action="insert_post.php" method="post" name="action">
		<table>
			<tr>
                <td> Введите должность </td>
                <td> <input type="text" name="post"> </td>
            </tr>
            <tr>
                <td> Bведите заработную плату</td>
                <td> <select name="zp">
                    
                    </td>
            </tr>
           
            
            <tr>
            <td><input type="submit" value="Добавить данные">
                <input type ="reset" value="Очистить форму"></td></tr>
		</table>
	</form>
    <form action="header_pat.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>