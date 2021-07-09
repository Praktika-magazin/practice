<?php
// объявим переменные для подключения к БД
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'electronics_store';
// создаем подключение, к БД используя функцию mysqli_connect
$link = mysqli_connect($host, $user, $password, $db);
//если значения в переменную $link небыли переданы то выводим код и текст ошибки
if (!$link) {
echo "Ошибка: Невозможно установить соединение с с базой
данных electronics_store.";
echo '<br>';
echo "Код ошибки errno: " . mysqli_connect_errno();
echo '<br>';
echo "Текст ошибки error: " . mysqli_connect_error();
exit;
}
//если значения в переменную $link были переданы, то выводим сообщение
echo "Соединение с базой данных electronics_store установлено!";
//закрываем соединение с БД. В дальнейшем удалим эту строку
mysqli_close($link);
?>