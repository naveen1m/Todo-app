<?php
// connect to the database 

$servername = "enter here...";
$username = "enter here...";
$password = "enter here...";
$database = "todo_app";

// make a connection
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    $connectionMsg = "sorry we failed to connect: ". mysqli_connect_error();
}else{
    $connectionMsg = "Database connected successfully";
}

?>