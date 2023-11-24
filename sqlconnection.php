<?php
$dbhost = "127.0.01";
$dbuser = "root";
$dbpass = "";
$dbname = "system";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
