<?php

   $db = "dbname=dc4tc15epqk7fb host=ec2-174-129-253-101.compute-1.amazonaws.com port=5432 user=achmkoobsocawj password=6a61be4049409369bd7ce5457fdd83728f0e2880b08601deb2c1b15e11e6dec0 sslmode=require";


   if (!$db) 
   {
     echo "Database connection failed.";
   }
   else 
   {
     echo "Database connection success.";
   }
$query = 'CREATE TABLE mytable (
    id SERIAL,
    facebookid BIGSERIAL,
    mytext TEXT,
    inserted TIMESTAMP
);';
$db->query($query);

$query = 'INSERT INTO mytable (facebookid,mytext,inserted)'
    . ' VALUES (1603196280,"test",now());';
$db->query($query);
var_dump($db->errorInfo());
?>

