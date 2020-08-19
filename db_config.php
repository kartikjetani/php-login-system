<?php
$db_server='localhost';
$db_password='';
$db_username='root';
$db_database='test';
$conn=mysqli_connect($db_server,$db_username,$db_password,$db_database);

if(!$conn){
 die('Some error: '.mysqli_connect_error());
}
?>