<?php 
$con= new mysqli("localhost","root","root","bd_biblioteca_central");
if($con->connect_error)
{
    die("Error: " . $con->connect_error);
}
?>