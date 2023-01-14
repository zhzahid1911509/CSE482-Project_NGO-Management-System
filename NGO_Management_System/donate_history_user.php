<?php 
   
//Database Connection Setting
$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['dntn_hstry'])){ 

$donor_id = $_POST['donor_id']; 

if(is_null($donor_id)){
  echo "<html><h1>No Donation History</h1></html>"; 

}
else{
$query = "SELECT * FROM donation_list WHERE `Donor_Id` ='$donor_id'";
$result = mysqli_query($MySQLi_connection, $query);  
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Desh Bondhu LTD.</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="donate_history_user.css">

	
</head>
<body>
  <div class="header">
    <div class="Logo">
       <a href ="index.html" >
        <img src="Logo.png" alt="Desh Bondhu LTD" width="" height=""> 
    </a> 
     </div>

    <div class="topnav" id="myTopnav">
      <a href="" class="active">DONATE</a>
      <a href="#news">WHO WE ARE</a>
      <a href="whatwedo.html">WHAT WE DO</a>
      <a href="wherewework.html">WHERE WE WORK</a>
      <a href="home.html">HOME</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>     
  </div>
  <div class="container">
    <table>
      <caption>Donation History</caption>
      <thead>
        <tr>
          <th scope="col">Donor Id</th>
          <th scope="col">Donor For Project</th>
          <th scope="col">Donation Amount</th>
          <th scope="col">Date of Donation</th>
    
          
        </tr>
      </thead>
      <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          ?>
      <tbody>
        
        <tr>
          <td data-label="Donor Id"><?php echo $row['Donor_Id']; ?></td>
          <td data-label="Donor For Project"><?php echo $row['Project_Name']; ?></td>
          <td data-label="Donation Amount"><?php echo $row['Donation_Amount']; ?></td>
          <td data-label="Date of Donation"><?php echo $row['Date_of_Donation']; ?></td>

        </tr>
        
      </tbody>
      <?php } ?>
    </table>

  </div>
<?php 
    }
  }
    ?>

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