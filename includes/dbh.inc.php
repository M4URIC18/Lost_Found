<?php 
//$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$host="localhost";
$dbname="myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("connection failed: " . $e->getMessage());
   // echo "connection failed: " . $e->getMessage();  

}

/*
CREATE TABLE users (
    id MEDIUMINT UNSIGNED NOT NULL
    AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    pwd CHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

*/