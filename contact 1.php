
<?php
// $servername="localhost";
// $username="root";
// $password="";
// $database="movie";

//create connection

//check connection

if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $fname= $_POST['fname'];   
  $mobile= $_POST['mobile'];   
  $email= $_POST['email'];
  $subject= $_POST['subject'];
  $message= $_POST['message']; 
}

$conn =new mysqli("localhost","root", "","movie");



if (!$conn){
//echo "connection successful";
$sql="INSERT INTO `contactus`(`fname`, `mobile`, `email`, `subjects`, `messages`) VALUES ('$fname','$mobile','$email','$subject','$message')";
$result=mysqli_query($conn,$sql);
if($result){
  echo"Data is Added";
}else{
  die(mysqli_connect_error());
}

}else{
  die(mysqli_connect_error());
}
  

mysqli_close($conn);

?>
