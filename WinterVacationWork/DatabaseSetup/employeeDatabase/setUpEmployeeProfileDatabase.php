<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = 'mysql:host=localhost;dbname=rosteringsystem';
$user = 'team35';
$password = 'team35';

$sql="CREATE TABLE employee_profile (".
    "name VARCHAR(255) NOT NULL,".
    "working_id VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,".
    "slack_id VARCHAR(255),".
    "email VARCHAR(255),".
    "group_id VARCHAR(255),".
    "phone_number VARCHAR(40),".
    "account_type VARCHAR(40) NOT NULL,".
    "job_role VARCHAR(40) NOT NULL,".
    "status boolean NOT NULL".
    ");";
    
try {
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    echo "Set up employee profile Success";
} catch (PDOException $error) {
    echo 'SQL Query:'.$sql.'</br>';
    echo 'Connection failed:'.$error->getMessage();
}
?>