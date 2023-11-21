<?php

$host = "localhost";
$user = "root";
$password = "";
$banco = "gerenciamento";

$conn = new mysqli($host, $user, $password, $banco);

// Check connection
if($conn->connect_errno){
    printf("Connect Failed: %s\n", $$conn->connect_errno);
    exit();
}


// close connection
//mysqli->close();


?>