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
		
		$query = '';
		$query .= 'CREATE TABLE table1 (';
		$query .= 'id INTEGER PRIMARY KEY,';
		$query .= 'data TEXT';
		$query .= ')';
		$db_object->exec($query);
		
		$query1 = '';
		$query1 .= "INSERT INTO table1 (data) VALUES ('Привет 1, SQLite!')";
		$db_object->exec($query1);
		
		$query2 = '';
		$query2 .= "INSERT INTO table1 (data) VALUES ('Привет 2, SQLite!')";
		$db_object->exec($query2);
		
		$query3 = '';
		$query3 .= "INSERT INTO table1 (data) VALUES ('Привет 3, SQLite!')";
		$db_object->exec($query3);
		
		$query4 = '';
		$query4 .= 'SELECT * FROM table1';
		$result = $db_object->query($query4);
		foreach ($result as $row)
		{			
			echo '<br />'.$row['id'].'. '.$row['data'];
		}
		
		echo '<br />';
		$db_object = null;
		echo 'Файл БД закрыт.';
	}
	catch (PDOException $error)
	{
		echo 'Ошибка PDO: '.$error->getMessage();
	}