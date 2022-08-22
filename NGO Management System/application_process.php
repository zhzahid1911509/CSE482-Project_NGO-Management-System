<?php

$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['approve'])){
    $id = $_POST['app_id']; 
    $query = "UPDATE `ask_for_donation` SET `Status` = 'Approved' WHERE `Applicant_Id` = '$id'";
    $result = mysqli_query($MySQLi_connection, $query);
   ?><html><body style="color: green;"><h1>You APPROVED the Application against the Applicant Id:<?php echo $id;?></h1>
   <a href="application_list_admin.php">Back</a></body></html><?php 

    }

if(isset($_POST['decline'])){
    $id = $_POST['app_id']; 
    $query = "UPDATE `ask_for_donation` SET `Status` = 'Declined' WHERE `Applicant_Id` = '$id'";
    $result = mysqli_query($MySQLi_connection, $query);
    ?><html><body style="color: red;"><h1>You DECLINED the Application against the Applicant Id:<?php echo $id;?></h1>
   <a href="application_list_admin.php">Back</a></body></html><?php

   }

?>