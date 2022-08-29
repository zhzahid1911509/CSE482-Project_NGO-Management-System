<?php 

include('donate.php');

$serverName = "sql308.epizy.com";
$userName = "epiz_32339273";
$password = "hjwTDGW9Lzb";
$dbname = "epiz_32339273_cse482project";

$db = mysqli_connect($serverName, $userName, $password, $dbname);

error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
//Generate Unique Transaction ID
function rand_string( $length ) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
$cur_random_value=rand_string(6);

if (isset($_POST['pay'])){

// receive all input values from the form
	 $donor_id = mysqli_real_escape_string($db, $_POST['id']); 
 	 $donor_name = mysqli_real_escape_string($db, $_POST['name']);
 	 $email = mysqli_real_escape_string($db, $_POST['email']);
 	 $contactNo = mysqli_real_escape_string($db, $_POST['contact']); 
 	 $projectName = mysqli_real_escape_string($db, $_POST['projects']);
 	 $donation_amount = mysqli_real_escape_string($db, $_POST['amount']);
    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));  
 	 $dateOfDonation = $date->format('Y-m-d H:i:s'); 

      $query = "SELECT * FROM project_list WHERE `Project_Name` = '$projectName'"; 
      $result = mysqli_query($MySQLi_connection, $query);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $updatedAmount = intval($row['Raised_Money']) + intval($donation_amount); 

      
    if($row['Total_Money_Needed'] == $row['Raised_Money']){
    $status = "Fulfilled"; 
    $update_project = "UPDATE `project_list` SET `Status` = '$status' WHERE `Project_Name` = '$projectName'"; 
    $result1 = mysqli_query($MySQLi_connection, $update_project);
   ?>
   <html><body><h1>The Project Fund is fulfilled. No money is needed anymore. Thank You.</h1></body>
   <br><a href="user_profile.php"><-Back.</a></html> 
   <?php 
   }
   else{
	 $insert = "INSERT INTO `donation_list`(`Donor_Id`, `Donor_Name`, `Email`, `Contact_No`, `Project_Name`, `Donation_Amount`, `Date_of_Donation`) 
      VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmnt = $db->prepare($insert);
      $stmnt->bind_param("issisis", $donor_id, $donor_name, $email, $contactNo, $projectName, $donation_amount, $dateOfDonation); 
      $stmnt->execute(); 
      $stmnt->close();

      $update_project = "UPDATE `project_list` SET `Raised_Money` = '$updatedAmount' WHERE `Project_Name` = '$projectName'"; 
       $result1 = mysqli_query($MySQLi_connection, $update_project);  
      ?>
      <body>
             
                    <form style='margin:0 auto; text-align:center;' action="https://sandbox.aamarpay.com/index.php" method="post" name="form1">
                    <table border="0" cellpadding="4" cellspacing="2" align="center" style="border-collapse:collapse;">
                    <input type="hidden" name="store_id" value="aamarpay">
                    <input type="hidden" name="signature_key" value="28c78bb1f45112f5d40b956fe104645a">
                   
                    </td></tr>
            <tr><td>Merchant Transaction ID: *</td><td><input type="hidden" name="tran_id" value="WEP-<?php echo "$cur_random_value"; ?>">WEP-<?php echo "$cur_random_value"; ?></td></tr>
                    <tr><td>Pay Amount *</td><td><input type="text" name="amount" value="<?php echo $donation_amount ;?>" readonly> Taka</td></tr>
                    
                    <input type="text" name="currency" value="BDT">
                    
                    <tr><td>Customer Name: *</td><td><input type="text" name="cus_name" value="<?php echo $donor_name;?>"></td></tr>
                    <tr><td>Customer Email Address: *</td><td><input type="text" name="cus_email" value="<?php echo $email;?>"></td></tr>
                    <tr><td>Customer Phone: </td><td><input type="text" name="cus_phone" value="<?php echo $contactNo;?>"></td></tr>
                    
                    <tr><td>Description: </td><td><input type="text" name="desc" value="Donation for <?php echo $projectName;?>"></td></tr>
                    <input type="hidden" name="success_url" value="https://deshbondhu-ngo.great-site.net/success.php">
                    <input type="hidden" name="fail_url" value = "https://deshbondhu-ngo.great-site.net/fail.php">
                    <input type="hidden" name="cancel_url" value = "https://deshbondhu-ngo.great-site.net/cancel.php">
              
                    <tr><td><input type="submit" class='button' value="Pay Now" name="pay"><br/></td></tr></table>
                    </form></center>
                    
       
                    </body>
      <?php
     
   }
      
}

?>
