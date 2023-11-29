<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "Kokokoko123!";
$dbname = "PayrollSystem";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
