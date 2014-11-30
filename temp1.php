<?php
	session_start();
	header('Content-type: text/html; charset=UTF-8');
	echo '<p>';
	echo '|&nbsp;';
	echo '<a href="index.php">На Главную</a>';
	echo '&nbsp;|';
	echo '</p>';
	try
	{
		$db_name = 'mydb1.db';
		$db_object = new PDO('sqlite:'.$db_name);
		echo 'Файл БД открыт: '.$db_name;
		
		
		
		$db_object = null;
		echo 'Файл БД закрыт.';
	}
	catch (PDOException $error)
	{
		echo 'Ошибка PDO: '.$error->getMessage();
	}