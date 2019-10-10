<?php
// **********************************************
// START Database connection and Configuration
// **********************************************

// set a default environment
$WEBSITE_ENVIRONMENT = "Development";

// detect the URL to determine if it's development or production
if(stristr($_SERVER['HTTP_HOST'], 'localhost') === FALSE) $WEBSITE_ENVIRONMENT = "Production";

// value of variables will change depending on if Development vs Production
if ($WEBSITE_ENVIRONMENT =="Development") {

	$host 		= "localhost";
	$user 		= "root";
	$password 	= "";
	$database 	= "lineforensicmnrh";
	
	define("APP_ENVIRONMENT", "Development");
	define("APP_BASE_URL", "http://localhost");
	error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors

} else {

	$cleardb_url 		= parse_url(getenv("mysql://b4d4ed34e9b742:e8ba9c70@us-cdbr-iron-east-05.cleardb.net/heroku_04736a2bbd78072?reconnect=true"));
	$host				= $cleardb_url["us-cdbr-iron-east-05.cleardb.net"];
	$user 				= $cleardb_url["b4d4ed34e9b742"];
	$password			= $cleardb_url["e8ba9c70"];
	$database 			= substr($cleardb_url["heroku_04736a2bbd78072?reconnect=true"],1);

	define("APP_ENVIRONMENT", "Production");
	define("APP_BASE_URL", "https://dashboard.heroku.com");
	#error_reporting(0); // turn OFF showing errors
	error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors			

}

// connect to the database server
$db1 = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

// select the right database
mysqli_select_db($db1, $database);

// **********************************************
// END Database connection and Configuration
// **********************************************
?>
