<?php
	const DB_HOST = 'localhost';
	const DB_NAME = 'db_destinoita';
	const DB_USER = 'root';
	const DB_PASS = '';

	function connect() {
		try {
			$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
			return $conn;
		} catch (PDOException $erro) {
			return $erro->getMessage();
		}
	}