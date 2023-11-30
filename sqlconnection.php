<?php

$dbhost = "studentdb-maria.gl.umbc.edu";
$dbuser = "nsubba1";
$dbpass = "nsubba1";
$dbname = "nsubba1";
// studentdb-maria.gl.umbc.edu","nsubba1","nsubba1","nsubba1"

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

