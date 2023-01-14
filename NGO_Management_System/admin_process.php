<?php


$errors = array();

$serverName = "sql308.epizy.com";
$userName = "epiz_32339273";
$password = "hjwTDGW9Lzb";
$dbname = "epiz_32339273_cse482project";

$db = mysqli_connect($serverName, $userName, $password, $dbname); 

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
    $query = "SELECT * FROM `admin_panel` WHERE `Email` = '$email'"; 
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
  
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  else if (empty($password)) {
    array_push($errors, "Password is required");
  }
  else if (($email !== $user['Email']) || ($password !== $user['Password'])){
        array_push($errors, "Wrong email or password."); 
        ?>
        <html><body><h1>Wrong email or password.</h1>
        <a href="admin_login.html"><-Back</a></body></html>
        <?php
    }
  
  else if (count($errors) == 0) {
    
    $_SESSION['id'] = $user['Email'];

        header('location:admin_panel.php');
            
    }


  else{
      array_push($errors, "Wrong email/password combination");
      ?>
      <html>
      <body><h1>Wrong email/password combination</h1>
      <a href="admin_login.html"><-Back</a></body> 
      </html>
      <?php 
    }
}

if(isset($_POST['logout'])){
    unset($_SESSION["id"]); 
     
    session_destroy(); 
    header("Location:admin_login.html");
}
?>
