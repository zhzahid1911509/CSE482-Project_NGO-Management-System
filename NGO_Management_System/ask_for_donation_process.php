<?php 

$serverName = "sql308.epizy.com";
$userName = "epiz_32339273";
$password = "hjwTDGW9Lzb";
$dbname = "epiz_32339273_cse482project";

$db = mysqli_connect($serverName, $userName, $password, $dbname);

if (isset($_POST['request'])){

  //receive all input values from the form
	 $applicant_id = mysqli_real_escape_string($db, $_POST['id']);
 	 $applicant_name = mysqli_real_escape_string($db, $_POST['name']);
 	 $org_name = mysqli_real_escape_string($db, $_POST['org_name']);
 	 $email = mysqli_real_escape_string($db, $_POST['email']);
 	 $contactNo = mysqli_real_escape_string($db, $_POST['contact']); 
 	 $projectName = mysqli_real_escape_string($db, $_POST['project_name']);
 	 $office_address = mysqli_real_escape_string($db, $_POST['address']);
 	 $donation_amount = mysqli_real_escape_string($db, $_POST['amount']);
     $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));  
 	 $dateOfRequest = $date->format('Y-m-d H:i:s');
     // File upload path
    $fileName = $applicant_id."-".$_FILES['myfile']['name'];
    $temp = $_FILES['myfile']['tmp_name'];
    move_uploaded_file($temp,"uploaded_files/".$fileName);
            // Insert image file name into database
 	 $insert_query = "INSERT INTO `ask_for_donation`(`Applicant_Id`, `Applicant_Name`, `Organization_Name`, `Project_Name`, `Expected_Donation_Amount`, `Contact_No`, `Email`, `Office_Address`, `Project_Proposal`) VALUES ('$applicant_id', '$applicant_name', '$org_name', '$projectName', '$donation_amount', '$contactNo', '$email', '$office_address', '$fileName')";
    mysqli_query($db, $insert_query);     
        
?>
<html><body><h1>Your Application is Submitted Successfully. Please Wait for Admin Approval</h1></body></html>   
<?php      
    
}

  ?>