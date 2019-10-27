<?php
$dsn = 'pgsql:'
    . 'host=ec2-174-129-253-101.compute-1.amazonaws.com;'
    . 'dbname=dc4tc15epqk7fb;'
    . 'user=achmkoobsocawj;'
    . 'port=5432;'
    . 'sslmode=require;'
    . 'password=6a61be4049409369bd7ce5457fdd83728f0e2880b08601deb2c1b15e11e6dec0';
try
{
	$db = new PDO($dsn);
}
catch(PDOException $pe)
{
	die('Connection error, because: ' .$pe->getMessage());
}


$query = 'CREATE TABLE AQI (
    id INT PRIMARY KEY AUTO_INCREMENT,
	Province VARCHAR(50),
	City VARCHAR(50),
    AQI VARCHAR(10),
	Temp VARCHAR(10),
	Moise VARCHAR(10),
	Wind VARCHAR(10),
    data_created DATETIME
);';
$db->query($query);
$query = 'INSERT INTO AQI (Province, City, AQI,Temp,Moise,Wind,data_created)'
    .'VALUES ("Korat","Korat","50","25","20","15",now());';
$db->query($query);
var_dump($db->errorInfo());
$query = 'SELECT * FROM mytable;';
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	var_dump($row);
}
$result->closeCursor();
?>
