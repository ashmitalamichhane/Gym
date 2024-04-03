<?php
$connection = new mysqli('localhost','root','','project');
if($connection->connect_errno != 0){
    die('Database connection error: ' . $connection->connect_error);
}
?>