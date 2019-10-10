<?php
include "config.php";

$sql = "DROP TABLE data ";
$res = $conn->query($sql);
if($res){
	echo "Yes DROP";
}else{
	echo "No DROP";
}

$sql = "CREATE TABLE line_log (
    id int(11) NOT NULL auto_increment PRIMARY KEY,
user_id` varchar(50) default NULL,
text` varchar(600) default NULL,
date_time` datetime default NULL
    )";


if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully 1 ";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
