
<?php
$servername="localhost";
$username= "root";
$password= "";
$database="movie";

//Create Connection
// $connection = new mysqli($servername,$username, $password, $database);

// $sql = "INSERT INTO contactus(`fname`, `mobile`, `email`, `subject`, `message`) VALUES ('$fname','$mobile','$email','$subject','$message')";

  $fname= $_POST["fname"];   
  $mobile= $_POST["mobile"];   
  $email= $_POST["email"];
  $subject= $_POST["subject"];
  $message= $_POST["message"]; 


$conn =new mysqli($servername,$username, $password,$database);
$sql="INSERT INTO contactus(fname, mobile, email, subject, message) VALUES('$fname', '$mobile', '$email', '$subject','$message')";

if(!$conn){
    die("Connection faild:" .mysqli_connect_error());
}

echo "Connected Successfull";

?>
