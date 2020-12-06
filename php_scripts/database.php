<?php
	$dataSourceName = 'mysql:host=localhost;dbname=christmas_list';
	$username = 'web_user';
	$password = 'sesame';

	try {
		$db = new PDO($dataSourceName, $username, $password);
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'There has been an error';
		exit();
	}
?>
