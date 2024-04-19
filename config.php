<?php

$server_name="localhost";
$user_name="root";
$password="";
$database="movie";

$con = new mysqli($server_name, $user_name, $password, $database);
if ($con -> connect_error){
    die("Connection error");
    }else{
        echo 'Connection ok';
    }

    ?>