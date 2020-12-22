<?php

$conn = mysqli_connect("localhost","root","","cocubes");
if(!$conn)
{
	echo mysqli_error($conn);
}
session_start();

?>