<?php
include('donate.php'); 
$db = mysqli_connect('localhost', 'root', '', 'cse482_project');

if (isset($_POST['pay'])){

	 $donor_id = mysqli_real_escape_string($db, $_POST['id']); 
  // receive all input values from the form
 	 $donor_name = mysqli_real_escape_string($db, $_POST['name']);
 	 $email = mysqli_real_escape_string($db, $_POST['email']);
 	 $contactNo = mysqli_real_escape_string($db, $_POST['contact']); 
 	 $projectName = mysqli_real_escape_string($db, $_POST['projects']);
 	 $donation_amount = mysqli_real_escape_string($db, $_POST['amount']);
     $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));  
 	 $dateOfDonation = $date->format('Y-m-d H:i:s');

	 $insert = "INSERT INTO `donation_list`(`Donor_Id`, `Donor_Name`, `Email`, `Contact_No`, `Project_Name`, `Donation_Amount`, `Date_of_Donation`) 
      VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmnt = $db->prepare($insert);
      $stmnt->bind_param("issisis", $donor_id, $donor_name, $email, $contactNo, $projectName, $donation_amount, $dateOfDonation); 
      $stmnt->execute(); 
      $stmnt->close();
      ?>
<html><body><h1>Donation Paid Successfully</h1></body>
    <br><a href="user_profile.php">You can login now.</a></html>  
<?php 
}



?>