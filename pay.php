<?php

if (isset($_POST["Pay"])){
  
    $fname= $_POST['fname'];   
    $theater= $_POST['theater'];   
    $seats= $_POST['seats'];
    $ammount= $_POST['ammount'];
    $email= $_POST['email']; 
    $cardno= $_POST['cardno']; 
    $exdate= $_POST['exdate']; 
    $cvv= $_POST['cvv']; 
  }
  
  
$conn =new mysqli("localhost","root", "","movie");
$sql="insert into pay(`fname`, `theater`, `seats`, `ammount`, `email`, `cardno`, `exdate`, `cvv`)";
 
if(!$conn){
    die("Connection faild:" .mysqli_connect_error());
}

echo "Connected Successfull";
?>




 




