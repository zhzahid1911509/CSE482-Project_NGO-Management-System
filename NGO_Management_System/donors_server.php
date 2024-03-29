<?php

session_start();

// initializing variables
$email    = "";
$errors = array(); 

// connect to the database
$serverName = "sql308.epizy.com";
$userName = "epiz_32339273";
$password = "hjwTDGW9Lzb";
$dbname = "epiz_32339273_cse482project";

$db = mysqli_connect($serverName, $userName, $password, $dbname);

// REGISTER USER
if (isset($_POST['sign_up'])) {
 //Generating Donor_Id  
    $n=6;
function getDonorId($n) {
    $characters = '0123456789';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

  $donor_id = getDonorId($n); 
  // receive all input values from the form
  $fullName = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contactNo = mysqli_real_escape_string($db, $_POST['contact']); 
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $repeat_password = mysqli_real_escape_string($db, $_POST['psw-repeat']);
  $encrypted_password = password_hash($password, PASSWORD_DEFAULT);  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `donor_list` WHERE `Donor_Id` = '$donor_id' OR `Email` ='$email' OR `Contact_No` ='$contactNo' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  //Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);  

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      array_push($errors, "Password does not meet requirements");
      ?>
       <html><body><h1>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</h1></body>
       <a href="donor_signup.html"><-Back</a> 
       </html>
       <?php 
    
  }

  if ($user) { // if user exists
    if ($user['Contact_No'] === $contactNo) {
      array_push($errors, "Contact No. already exists");?>
      <html><body><h1>Contact No. already exists</h1></body>
      <a href="donor_signup.html"><-Back</a> 
      </html><?php
    }

    if ($user['Email'] === $email) {
      array_push($errors, "Email already exists");?>
      <html><body><h1>Email already exists</h1></body>
      <a href="donor_signup.html"><-Back</a> 
      </html><?php
    }  

    if ($user['Donor_Id'] === $donor_id){
      getDonorId(6);
    }
  }

  if ($password !== $repeat_password){ 
       array_push($errors, "Password is not re-written correctly");
       ?>
       <html><body><h1>Password is not re-written correctly</h1></body>
       <a href="donor_signup.html"><-Back</a> 
       </html>
       <?php 
    }  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  
      $insert = "INSERT INTO `donor_list`(`Donor_Id`, `Full_Name`, `Contact_No`, `Address`, `Email`, `Password`) 
      VALUES (?, ?, ?, ?, ?, ?)";
      $stmnt = $db->prepare($insert);
      $stmnt->bind_param("isisss", $donor_id, $fullName, $contactNo, $address, $email, $encrypted_password); 
      $stmnt->execute(); 
      $stmnt->close(); 
  	
    ?>
    <html><body><h1>Registration Completed Successfully</h1></body>
    <br><a href="login.html">You can login now.</a></html>
        <?php
        
    }
}

// LOGIN USER 
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    
    $query = "SELECT * FROM `donor_list` WHERE `Email` = '$email'"; 
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $encrypted_password = $user['Password'];
    $verify = password_verify($password, $encrypted_password);

    if ((mysqli_num_rows($results) == 1) && ($verify)) { 
        $_SESSION['id'] = $user['Donor_Id'];
        $cookie_name = "user";
        $cookie_value = $user['Full_Name']; 
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
        header('location:user_profile.php');    
    }

    else {
      array_push($errors, "Wrong username/password combination");
      ?>

      <html><body><h1>Wrong username/password combination</h1></body>
      <a href="login.html"><-Back</a> 
      </html>
      <?php 
    }
  }
 
}
 if(isset($_POST['logout'])){
        
session_start(); 
unset($_SESSION["id"]);
setcookie("user", "", time() - 3600); 
session_destroy(); 
header("Location:login.html");
        }
 
    ?>
        