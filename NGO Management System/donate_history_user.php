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
$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
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
      <tbody>
        
        <tr>
          <td data-label="Account"><?php echo $row['Donor_Id']; ?></td>
          <td data-label="Period"><?php echo $row['Project_Name']; ?></td>
          <td data-label="Period"><?php echo $row['Donation_Amount']; ?></td>
          <td data-label="Period"><?php echo $row['Date_of_Donation']; ?></td>

        </tr>
        
      </tbody>
    </table>

  </div>
<?php 
    }
  }
    ?>

  <div class="footer">
    <div class="wrap-1">
        <p class="fcon">About US</p><br>
        <p class="fcon2"> In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
            demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of 
            a webpage or publication, without the meaning of the text influencing the design.</p>
    </div>
    <div class="wrap-1">
   
        <p class="fcon">Contact Us</b></p><br>
        <p class="fcon2">Adress:</b> </p><br>
        <p class="fcon2">House:##, Road:##, Block: ##, Banai, Dhaka </p><br>
        <p class="fcon2">Call: </b>10589</p><br>
        <a href ="https://www.facebook.com/Audi-Bangladesh-1438759706436292" >
  <img src ="fb.png" alt="My sample image" width="80">
</a>   

<a href ="https://www.facebook.com/Audi-Bangladesh-1438759706436292" >
  <img src ="insta.png" alt="My sample image" width="80">
</a>

<a href ="https://www.youtube.com/user/AudiofAmerica" >
  <img src ="youtube.png" alt="My sample image" width="80">
</a>
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