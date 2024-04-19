<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movie";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);


$fname="";
$mobile="";
$email="";
$subject="";
$message="";


$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST["fname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    

do { 
if ( empty($fname) || empty($mobile) || empty($email) || empty($subject) || empty($message) ) {
    $errorMessage = "All the fields are required";
    break;
    }
        
// add new client
$sql = "INSERT INTO contactus (fname, mobile, email, subject, message) " .
        "VALUES ('$fname', '$mobile', '$email', '$subject', '$message')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

$fname= "";
$mobile= "";
$email= "";
$subject= "";
$message= "";
       

$successMessage = "Saved Successfully";

// header("location: /booking/index5.php");
exit;

} while (false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="style/style.css">
<!-- Add font awesome CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Responsive Form</title>

<style>
* {
box-sizing: border-box;
}

body {
margin: 0;
padding: 0;
}

.navbar {
display: flex;
position: relative;
justify-content: space-between;
align-items: center;
background-color: rgb(2, 2, 31);
color: white;
}

.brand-title {
font-size: 1.5rem;
margin: .5rem;
font-size: 12px;
}

.navbar-links {
height: 100%;
}

.navbar-links ul {
display: flex;
margin: 0;
padding: 0;
}

.navbar-links li {
list-style: none;
}

.navbar-links li a {
display: block;
text-decoration: none;
color: white;
padding: 1rem;
font-size: 22px;
}

.navbar-links li:hover {
background-color: #020d14;
}

.toggle-button {
position: absolute;
top: .75rem;
right: 1rem;
display: none;
flex-direction: column;
justify-content: space-between;
width: 30px;
height: 21px;
}

.toggle-button .bar {
height: 3px;
width: 100%;
background-color: white;
border-radius: 10px;
}

@media (max-width: 1000px) {
.navbar {
flex-direction: column;
align-items: flex-start;
}

.toggle-button {
display: flex;
}

.navbar-links {
display: none;
width: 100%;
}

.navbar-links ul {
width: 100%;
flex-direction: column;
}

.navbar-links ul li {
text-align: center;
}

.navbar-links ul li a {
padding: .5rem 1rem;
}

.navbar-links.active {
display: flex;
}
}

body{
padding: 0px;
margin: 0px;  
font-family: sans-serif;
background-color: rgb(2, 2, 31);
}   


.container{
width: 90%;
margin: auto;
overflow: hidden;
}
 /* contact form css */
#contact-section{
margin-top: 40px;
background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.9)),url(backgroungim.jpg);
background-size: cover;
background-position: center;
height: 100%;
width: 100% ;
padding-bottom: 2%;
}

#contact-section .container h2{
text-align: center;
text-decoration: underline;
/* text-decoration-color:red; */
text-underline-position: under;
color: rgb(238, 235, 235);
letter-spacing: 2px;
}

#contact-section .container p{
text-align: center; 
width: 70%; 
margin-left: auto;
margin-right: auto; 
padding-bottom: 3%;
color: #fff;
letter-spacing:3px;
}

.contact-form i.fa{
/* color: red; */
/* color: #fff; */
font-size: 18px; 
padding: 3%;
background-color: none;
border-radius: 50%;
margin: 2%;
/* border: 2px solid #fff; */
cursor: pointer;
border:2px solid rgb(190, 190, 190);
color: rgb(190, 190, 190);
}
    
.contact-form i.fa:hover{
cursor: pointer;
border:2px solid white;
color: white;
}
     
.contact-form{
display: grid;
grid-template-columns: auto auto;
}
      
.form-info{
font-size: 16px;
font-style: italic;
color: white;
letter-spacing: 2px;
}
input{
padding: 10px;
margin:10px;
width: 70%;
background-color:rgba(136, 133, 133, 0.5);
color: white;
border: none;
outline:none;
}

input::placeholder{
color: white;
}
    
textarea{
padding: 10px;
margin: 10px;     
width: 70%;
background-color:rgba(136, 133, 133, 0.5);
color: white;
border: none;
outline:none;
}
textarea::placeholder{
color: white;
}
     
.submit{
width: 40%;
background: none;
padding: 4px;
outline: none;
 /* border: 1px solid #fff;
color: #fff; */
font-size: 13px;
font-weight: bold;
letter-spacing: 2px;
height: 33px;
text-align: center;
cursor: pointer;
letter-spacing: 2px;
margin-left: 3%;
border:2px solid rgb(190, 190, 190);
color: rgb(190, 190, 190);
}

.submit:hover{
border: 1px solid #fff;
color: #fff;
cursor: pointer;
}

/* media queries */
 @media (max-width: 768px){

 #contact-section .contact-form{
display: block;
width: 100%;
text-align: center;
}
#contact-section .submit{
width: 60%;
}
}

hr {
width:90%;
border:0;
border-bottom:2px solid #696969;
margin:20px auto;
}

.copyright {
text-align:center;
color: #ebb5dc;
}
</style>
</head>
<body>
<nav class="navbar">
<div class="brand-title"><em>CinemArt</em></div>
  <a href="#" class="toggle-button">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </a>
<div class="navbar-links">
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="new flip.html">Movies</a></li>
  <li><a href="theaters.html">Theater</a></li>
  <li><a href="contact.html">Contact Us</a></li>
</ul>
</div>
</nav>

<script>
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
</script>


<!-- contact section -->
<section id="contact-section">
<div class="container">
  <h2 style="color: beige;">Contact Us</h2>
    <p><em>Email Us and Keep Upto Date With Our Latest News</em></p>
      <div class="contact-form">
<!-- First grid -->

  <div>
<i class="fa fa-map-marker"></i><span class="form-info">  Main Street, Kahatagasdigiliya</span><br>
<i class="fa fa-phone" > </i><span class="form-info">  0719 388407</span><br>
<i class="fa fa-envelope"></i><span class="form-info"> cinemartofficial16@gmail.com</span>
</div>
               
<!-- second grid -->
<div>        
<?php
if ( !empty($errorMessage)){
echo "
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>$errorMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
</div>
";
}
?>
			
<form action="contact new2.php" method="post">
<input type="text" placeholder="Name" name="fname" value="<?php echo $fname;?>">
<input type="text" placeholder="Mobile No" name="mobile" value="<?php echo $mobile;?>"><br>
<input type="Email" placeholder="Email" name="email" value="<?php echo $email;?>"><br>
<input type="text" placeholder="Subject of this message" name="subject" value="<?php echo $subject;?>"><br>
<textarea name="message" placeholder="Message" rows="5" name="message" value="<?php echo $message;?>"></textarea><br>
<?php

if( !empty($successMessage)){
echo "
<div class='row mb-3'>
<div class='offset-sm-3 col-sm-6'>
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
</div>
</div>
</div>
"; 
}
?>
			
<button class="submit" >Submit</button> 
<!-- <input type="submit" name="submit" value="Send"> -->
</form>
              </div>
         </div>
      </div>
    </section>
  <footer>
<hr>
<p class="copyright"> &copy;All Copyright Received by CinemArt 2023</p>
</footer>
</body>
</html>