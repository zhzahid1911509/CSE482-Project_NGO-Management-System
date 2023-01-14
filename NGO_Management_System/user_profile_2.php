<?php
 include('donors_server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Desh Bondhu LTD.</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="user_profile.css">
  <script>alert("Login Successful");
    </script>
    
</head>

<?php

$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

$name = $_GET["name"];
$email = $_GET["email"];
$contact = $_GET["contact"];
$donor_id = $_GET["id"];

$query1 = "SELECT * FROM `donor_list` WHERE `Email` = '$email'";
$result1 = mysqli_query($MySQLi_connection, $query1);  


if(!$result1){

    $query2 = "INSERT INTO `donor_list` (Donor_Id, Full_Name, Contact_No, Address, Email, Password) VALUES ('$donor_id', '$name', '$contact','','$email','')";
    $result2 = mysqli_query($MySQLi_connection, $query2);
    ?>
<body>
  <div class="header">
    <div class="Logo">
        <a href ="index.html" >
        <img src="Logo.png" alt="Desh Bondhu LTD" width="" height=""> 
    </a>
     </div>

    <div class="topnav" id="myTopnav">
      <a href="#home" class="active">DONATE</a>
      <a href="#news">WHO WE ARE</a>
      <a href="whatwedo.html">WHAT WE DO</a>
      <a href="wherewework.html">WHERE WE WORK</a>
      <a href="index.html">HOME</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>     
  </div>
  <div class="signupform">  
    <form action="user_profile_2.php" style="border:1px solid #ccc" method="POST">         
  <div class="container">  
    <h1>Wlecome</h1>
    <h2>to your profile, <?php echo $row['Full_Name']; ?></h2>
    

    <label for="name"><b>Donor Id</b></label>
    <input type="text" name="donor_id" value = "<?php echo $donor_id; ?>" readonly>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value = "<?php echo $name; ?>" required>

    <label for="contact"><b>Contact No.</b></label>
    <input type="text" placeholder="Enter Contact no." name="contact" value = "<?php echo $contact; ?>" required>

    <label for="Address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" value = "<?php echo ""; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" value = "<?php echo $email; ?>" required>  
    

    <div class="clearfix">
      <button type="submit" name="update">Update Profile</button> 
    </div>

  </div>
</form>
    <div class="container"> 
        <div class="clearfix">
        
            <form action="ask_for_donation.php" method="POST">  
            <input type="hidden" name="donor_id" value="<?php echo $donor_id; ?>"> 
            <button type="submit" name="ask_for_donate">Ask for Donation</button></form> 
        </div>

    
        <div class="clearfix">
            <form action="donate.php" method="POST">
            <input type="hidden" name="donor_id" value="<?php echo $donor_id; ?>">  
            <button type="submit" name="donate" class="DONATE">Donate</button></form>
        </div>
        <div class="clearfix">
            <form action="donate_history_user.php" method="POST">
            <input type="hidden" name="donor_id" value="<?php echo $donor_id; ?>"> 
            <button type="submit" name="dntn_hstry">Donation History</button></form> 
        </div>
        <div class="clearfix">
            <form action="user_Ask_for_donation_history.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $email; ?>"> 
            <button type="submit" name="ask_dntn_hstry">Ask for Donation History</button></form> 
        </div>
         <div class="clearfix">
            <form action="donors_server.php" method="POST">   
            <a href="donors_server.php"><button class="cancelbtn" type="submit" name="logout" >Logout</button></a></form> 
         </div>
  </div>
  </div>

  
    <script>
        function myFunction()
        {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav")
            {
            x.className += " responsive";
            } else
            {
            x.className = "topnav";
            }
        }
    </script>
</body> 
</html>
<?php
}

else if($result1){
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
$email = $row1['Email'];
$query3 = "SELECT * FROM `donor_list` WHERE `Email`='$email'";
$result3 = mysqli_query($MySQLi_connection, $query3);  
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

    ?>
<body>
  <div class="header">
    <div class="Logo">
        <a href ="index.html" >
        <img src="Logo.png" alt="Desh Bondhu LTD" width="" height=""> 
    </a>
     </div>

    <div class="topnav" id="myTopnav">
      <a href="#home" class="active">DONATE</a>
      <a href="#news">WHO WE ARE</a>
      <a href="whatwedo.html">WHAT WE DO</a>
      <a href="wherewework.html">WHERE WE WORK</a>
      <a href="index.html">HOME</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>     
  </div>
  <div class="signupform">  
    <form action="user_profile_2.php" style="border:1px solid #ccc" method="POST">         
  <div class="container">  
    <h1>Wlecome</h1>
    <h2>to your profile, <?php echo $row3['Full_Name']; ?></h2>
    

    <label for="name"><b>Donor Id</b></label>
    <input type="text" name="donor_id" value = "<?php echo $row3['Donor_Id']; ?>" readonly>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value = "<?php echo $row3['Full_Name']; ?>" required>

    <label for="contact"><b>Contact No.</b></label>
    <input type="text" placeholder="Enter Contact no." name="contact" value = "<?php echo $row3['Contact_No']; ?>" required>

    <label for="Address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" value = "<?php echo $row3['Address']; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" value = "<?php echo $row3['Email']; ?>" required>  
    

    <div class="clearfix">
      <button type="submit" name="update">Update Profile</button> 
    </div>

  </div>
</form>
    <div class="container"> 
        <div class="clearfix">
        
            <form action="ask_for_donation.php" method="POST">  
            <input type="hidden" name="donor_id" value="<?php echo $row3['Donor_Id']; ?>"> 
            <button type="submit" name="ask_for_donate">Ask for Donation</button></form> 
        </div>

    
        <div class="clearfix">
            <form action="donate.php" method="POST">
            <input type="hidden" name="donor_id" value="<?php echo $row3['Donor_Id']; ?>">  
            <button type="submit" name="donate" class="DONATE">Donate</button></form>
        </div>
        <div class="clearfix">
            <form action="donate_history_user.php" method="POST">
            <input type="hidden" name="donor_id" value="<?php echo $row3['Donor_Id']; ?>"> 
            <button type="submit" name="dntn_hstry">Donation History</button></form> 
        </div>
        <div class="clearfix">
            <form action="user_Ask_for_donation_history.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $row3['Email']; ?>"> 
            <button type="submit" name="ask_dntn_hstry">Ask for Donation History</button></form> 
        </div>
         <div class="clearfix">
            <form action="donors_server.php" method="POST">   
            <a href="donors_server.php"><button class="cancelbtn" type="submit" name="logout" >Logout</button></a></form> 
         </div>
  </div>
  </div>

  
    <script>
        function myFunction()
        {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav")
            {
            x.className += " responsive";
            } else
            {
            x.className = "topnav";
            }
        }
    </script>
</body> 
</html>
<?php
}

if(isset($_POST['update'])){
        $donor_id = $_POST['donor_id'];
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        
        $query = "UPDATE donor_list SET `Full_Name` = '$fullname', `Contact_No` = '$contact', `Address` = '$address', `Email` = '$email' WHERE `Donor_Id` = '$donor_id'";  
        
        $result = mysqli_query($MySQLi_connection, $query);
        
       
        }

     

?>