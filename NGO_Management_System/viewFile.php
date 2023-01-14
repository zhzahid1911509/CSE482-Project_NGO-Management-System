<?php

$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}


if (isset($_POST['view'])){
    $app_id = $_POST['app_id'];
// Get images from the database
$query = "SELECT * FROM `ask_for_donation` WHERE `Applicant_Id`='$app_id'"; 
$result = mysqli_query($MySQLi_connection, $query);  
$rowcount=mysqli_num_rows($result);

if($rowcount > 0){
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $imageURL = 'uploaded_files/'.$row['Project_Proposal']; 
?>
    <html><body>
    <br><br>
    <iframe src="<?php echo $imageURL; ?>" width="100%" height="750px">
    </body></html> 
<?php 
}
}else{ 
    ?>
    <p>No file(s) found...</p>
<?php 
    }
    
} 

if(isset($_POST['approve'])){

}
?>

