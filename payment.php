<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movie";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);


$fname="";
$theater="";
$seats="";
$ammount="";
$email="";
$cardno="";
$exdate="";
$cvv="";


$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
$fname= $_POST["fname"];
$theater=$_POST["theater"];
$seats=$_POST["seats"];
$ammount=$_POST["ammount"];
$email=$_POST["email"];
$cardno=$_POST["cardno"];
$exdate=$_POST["exdate"];
$cvv = $_POST["cvv"];
    

    do { 
        if ( empty($fname) || empty($theater) || empty($seats) || empty($ammount) || empty($email) || empty($cardno) || empty($exdate) ||empty($cvv) ) {
            $errorMessage = "All the fields are required";
            break;
        }
        
// add new client
$sql = "INSERT INTO pay (fname, theater, seats, ammount, email, cardno, exdate, cvv) " .
        "VALUES ('$fname', '$theater', '$seats', '$ammount', '$email','$cardno', '$exdate', '$cvv')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        $fname="";
        $theater="";
        $seats="";
        $ammount="";
        $email="";
        $cardno="";
        $exdate="";
        $cvv="";
       

        $successMessage = "Saved Successfully";

        header("location: alert.html");
        exit;

    } while (false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
    <link rel="stylesheet" href="style.css">
    <title>Payment Page</title>

<style>

 @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap'); 

/* start: Globals */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font: inherit;
}
body {
    font-family: 'Inter', sans-serif;
    color: #0c0b0b;
    background: linear-gradient(
          to right,
          rgb(17, 27, 41),
          rgb(230, 231, 232)
    );
}
.container {
    max-width: 940px;
    margin: 0 auto;
    padding: 0 16px;
}
/* end: Globals */



/* start: Payment */
.payment-section {
    padding: 48px 0;
}
.payment-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}
.payment-header {
    padding: 24px;
    background-color: var(--indigo-500);
    border-radius: 12px;
    padding-bottom: 72px;
}
.payment-header-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: var(--indigo-600);
    color: var(--white);
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}
.payment-header-title {
    font-size: 20px;
    font-weight: 600;
    color: #02262b;
    line-height: 1.4;
    margin-bottom: 4px;
}
.payment-header-description {
    font-size: 15px;
    color: var(--gray-200);
    line-height: 1.5;
}
.payment-content {
    padding: 24px;
    margin-top: -64px;
    position: relative;
}
.payment-content::before {
    content: '';
    position: absolute;
    top: 24px;
    left: 50%;
    transform: translateX(-50%);
    width: calc(100% - 32px);
    height: 16px;
    border-radius: 4px;
    background-color: var(--indigo-600);
}
.payment-body {
    background-color: var(--white);
    border-radius: 0 0 8px 8px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, .05), inset 0 8px 0 rgba(0, 0, 0, .05);
    position: relative;
    padding-top: 8px;
    overflow: hidden;
}
.payment-plan {
    display: flex;
    align-items: center;
    padding: 12px;
}
.payment-plan-type {
    width: 40px;
    height: 40px;
    background-color: var(--indigo-500);
    color: var(--white);
    font-size: 13px;
    font-weight: 600;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
    margin-right: 8px;
}
.payment-plan-info {
    width: 100%;
    margin-right: 8px;
    display: grid;
}
.payment-plan-info-name {
    font-size: 13px;
    color: var(--gray-400);
    margin-bottom: 2px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.payment-plan-info-price {
    font-weight: 600;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.payment-plan-change {
    color: var(--blue-500);
    font-size: 12px;
    font-weight: 600;
    text-underline-offset: 2px;
}
.payment-plan-change:hover {
    color: var(--blue-600);
}
.payment-summary-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 6px 12px;
}
.payment-summary-name {
    font-size: 14px;
    color: var(--gray-500);
}
.payment-summary-price {
    font-weight: 500;
    font-size: 15px;
}
.payment-summary-divider {
    width: calc(100% - 16px);
    height: 0;
    margin: 12px auto;
    border-bottom: 1px dashed var(--gray-200);
    position: relative;
}
.payment-summary-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 100%;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: var(--gray-50);
    box-shadow: inset 0 2px 16px rgba(0, 0, 0, .05);
}
.payment-summary-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 100%;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: var(--gray-50);
    box-shadow: inset 0 2px 16px rgba(0, 0, 0, .05);
}
.payment-summary-total {
    padding-bottom: 16px;
}
.payment-summary-total .payment-summary-name {
    color: var(--gray-900);
}
.payment-summary-total .payment-summary-price {
    font-size: 16px;
    color: var(--indigo-500);
    font-weight: 600;
}
.payment-right {
    min-width: 0;
}
.payment-form {
    padding: 24px;
    background-color: var(--white);
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, .05);
}
.payment-title {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.3;
}
.payment-method {
    display: flex;
    align-items: center;
    overflow-x: auto;
    padding: 6px 0;
    margin-bottom: 12px;
    width: 100%;
}
.payment-method input {
    display: none;
}
.payment-method-item {
    width: 80px;
    height: 80px;
    padding: 8px;
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    margin-right: 12px;
    cursor: pointer;
    position: relative;
    flex-shrink: 0;
}
input:checked + .payment-method-item {
    border-color: var(--indigo-500);
}
input:checked + .payment-method-item::before {
    content: '';
    position: absolute;
    top: -6px;
    right: -6px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: var(--indigo-500);
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTEwLjAwMDcgMTUuMTcwOUwxOS4xOTMxIDUuOTc4NTJMMjAuNjA3MyA3LjM5MjczTDEwLjAwMDcgMTcuOTk5M0wzLjYzNjcyIDExLjYzNTRMNS4wNTA5MyAxMC4yMjEyTDEwLjAwMDcgMTUuMTcwOVoiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMSkiPjwvcGF0aD48L3N2Zz4=");
    background-size: 12px;
    background-position: center;
    background-repeat: no-repeat;
}
.payment-method-item > img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.payment-form-group {
    position: relative;
    margin-bottom: 16px;
    color: #101010;
}
.payment-form-control {
    outline: transparent;
    border: #1f011d;
    border-radius: 8px;
    padding: 24px 16px 8px 16px;
    width: 100%;
    transition: all .15s ease-in-out;
}
.payment-form-label {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 16px;
    color: var(--gray-400);
    pointer-events: none;
    transition: all .1s ease-in-out;
}
.payment-form-control:focus {
    outline: 1px solid var(--indigo-500);
    border-color: var(--indigo-500);
}
.payment-form-control:focus + .payment-form-label,
.payment-form-control:not(:placeholder-shown) + .payment-form-label {
    top: 30%;
    font-size: 12px;
}
.payment-form-label-required::after {
    content: ' *';
    color: var(--red-500);
}
.payment-form-group-flex {
    display: flex;
    align-items: center;
}
.payment-form-group-flex > * {
    width: 100%;
}
.payment-form-group-flex > :not(:last-child) {
    margin-right: 12px;
}
.payment-form-submit-button {
    background-color: var(--indigo-500);
    border-radius: 8px;
    outline: transparent;
    font-size: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    border: none;
    cursor: pointer;
    color: #320973;
    font-weight: 600;
    padding: 16px;
    transition: all .15s ease-in-out;
}
.payment-form-submit-button:hover {
    background-color: #91d9e7;
}
.payment-form-submit-button > i {
    margin-right: 8px;
}
/* end: Payment */



/* start: Breakpoints */
@media screen and (max-width: 767px) {
    .payment-wrapper {
        grid-template-columns: 1fr;
    }
    .payment-content {
        padding: 16px;
    }
    .payment-content::before {
        top: 16px;
        width: calc(100% - 20px);
    }
    .payment-form-group-flex {
        display: block;
    }
}
/* end: Breakpoints */
    </style>
</head>
<body>
<!-- start: Payment -->
<section class="payment-section">
<div class="container">
<div class="payment-wrapper">
<div class="payment-left">
    <div class="payment-header">
     <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
     <div class="payment-header-title"></div>
    <!-- <p class="payment-header-description">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
    </div>
        <!-- <div class="payment-content">
        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type">Pro</div>
                                <div class="payment-plan-info">
                                    <div class="payment-plan-info-name">Professional Plan</div>
                                    <div class="payment-plan-info-price">$49 per month</div>
                                </div>
                                <a href="#" class="payment-plan-change">Change</a>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Additional fee</div>
                                    <div class="payment-summary-price">$10</div>
                                </div>
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Discount 20%</div>
                                    <div class="payment-summary-price">-$10</div>
                                </div>
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Total</div>
                                    <div class="payment-summary-price">-$10</div>
                                </div>
                            </div>
                        </div>
                    </div> -->
    </div>

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


<div class="payment-right">
<form action="" method="POST">
<h1 class="payment-title">Payment Details</h1>
<div class="payment-method">
<input type="radio" name="payment-method" id="method-1" checked>
<label for="method-1" class="payment-method-item">
<img src="visa.png" alt="">
</label>
<input type="radio" name="payment-method" id="method-2">
<label for="method-2" class="payment-method-item">
<img src="mastercard.png" alt="">
</label>
<input type="radio" name="payment-method" id="method-3">
<label for="method-3" class="payment-method-item">
<img src="paypal.png" alt="">
</label>
<input type="radio" name="payment-method" id="method-4">
<label for="method-4" class="payment-method-item">
<img src="stripe.png" alt="">
</label>
</div>

<div class="payment-form-group">
<input type="name" placeholder=" " class="payment-form-control" name="fname" value="<?php echo $fname;?>">
<label for="name" class="payment-form-label payment-form-label-required">Full Name</label>
</div>  
        
<div class="payment-form-group">
<input type="theater" placeholder=" " class="payment-form-control" name="theater"  value="<?php echo $theater;?>">
<label for="theater" class="payment-form-label payment-form-label-required">Theater Name</label>
</div>

<div class="payment-form-group">
<input type="seats" placeholder=" " class="payment-form-control" name="seats" value="<?php echo $seats;?>">
<label for="seats" class="payment-form-label payment-form-label-required">No of Seats</label>
</div>

<div class="payment-form-group">
<input type="amount" placeholder=" " class="payment-form-control" name="ammount"  value="<?php echo $ammount;?>">
<label for="amount" class="payment-form-label payment-form-label-required">Amount</label>
</div>

<div class="payment-form-group">
<input type="email" placeholder=" " class="payment-form-control" name="email"  value="<?php echo $email;?>">
<label for="email" class="payment-form-label payment-form-label-required">Email Address</label>
</div>

<div class="payment-form-group">
<input type="text" placeholder=" " class="payment-form-control" name="cardno"  value="<?php echo $cardno;?>">
<label for="card-number" class="payment-form-label payment-form-label-required">Card Number</label>
</div>

<div class="payment-form-group-flex">
<div class="payment-form-group">
<input type="date" placeholder=" " class="payment-form-control" name="exdate"  value="<?php echo $exdate;?>">
<label for="expiry-date" class="payment-form-label payment-form-label-required">Expiry Date</label>
</div>
    
<div class="payment-form-group">
<input type="text" placeholder=" " class="payment-form-control" name="cvv"  value="<?php echo $cvv;?>">
<label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
</div>
</div>

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
<button type="submit" class="payment-form-submit-button" name="pay"><i class="ri-wallet-line"></i> Pay</button>
</form>
</div>
</div>
</div>
</section>
<!-- end: Payment -->



</body>
</html>