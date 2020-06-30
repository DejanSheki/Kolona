<?php

    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'registration');

    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {
		$db = new PDO($dsn, DBUSER, DBPASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
   	}

?>