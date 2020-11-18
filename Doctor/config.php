<?php

//mysqli_connect("localhost","username","password","database_name");
$con = mysqli_connect("localhost","root","","hospital_db");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>