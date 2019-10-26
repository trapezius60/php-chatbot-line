<?php
$db = parse_url(getenv("postgres://achmkoobsocawj:6a61be4049409369bd7ce5457fdd83728f0e2880b08601deb2c1b15e11e6dec0@ec2-174-129-253-101.compute-1.amazonaws.com:5432/dc4tc15epqk7fb"));
$db["path"] = ltrim($db["path"], "/");

CREATE TABLE employees (
    employee_id SERIAL,
    last_name VARCHAR(30),
    first_name VARCHAR(30),
    title VARCHAR(50)
);
?>
