<?php

$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['ask_for_donate'])){ 
  $donor_id = $_POST['donor_id'];
  $query = "SELECT * FROM `donor_list` WHERE `Donor_Id` = '$donor_id'";
  $result = mysqli_query($MySQLi_connection, $query);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//Generating Applicant Id
  function getId($n) {
    $characters = '0123456789';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

  $applicant_id = getId(5);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Desh Bondhu LTD.</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
	<link rel="stylesheet" type="text/css" href="ask_for_donation.css">


</head>
<body>
  <div class="header">
    <div class="Logo">
       <a href ="home.html" >
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
  <div class="signupform">
    <form action="ask_for_donation_process.php" style="border:1px solid #ccc" method="POST" enctype="multipart/form-data">
  <div class="container">
    <h1>Donation Process</h1>  

    <hr>
    <label for="name"><b>Applicant Id</b></label>
    <input type="text" value="<?php echo $applicant_id; ?>"  name="id" readonly> 

    <label for="name"><b>Applicant Name</b></label>
    <input type="text" value="<?php echo $row['Full_Name']; ?>"  name="name" required>

    <label for="name"><b>Organization Name</b></label>
    <input type="text" placeholder="Enter organizxation name.." name="org_name" required>

    <label for="id"><b>Project Title</b></label>
    <input type="text" placeholder="Enter project title.." name="project_name" required>

    <label for="amount"><b>Expected Donation Amount</b></label>
    <input type="text" placeholder="Enter expected donate amount in BDT.." name="amount" required>

    <label for="contact"><b>Contact no.</b></label>
    <input type="text"  value="<?php echo $row['Contact_No']; ?>" name="contact" required>

    <label for="email"><b>Email</b></label>
    <input type="email" value="<?php echo $row['Email']; ?>" name="email" required>

    <label for="address"><b> Office Address</b></label>
    <input type="text" placeholder="Enter office address..." name="address" required> 

    <label for="myfile"><b>Upload a complete project proposal with all details</b></label> <br><br> 
    <input type="file" name="myfile" required>   
    <div class="clearfix">
      <button type="submit" name="request">Request for Donation</button>
    </div>

  </div>
</form>

  </div>


  <div class="footer">
    <div class="wrap-1">
        <p class="fcon">About US</p><br>
        <p class="fcon2"> In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
            demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of
            a webpage or publication, without the meaning of the text influencing the design.</p>
    </div>
    <div class="wrap-1">

        <p class="fcon">Contact Us</b></p><br>
        <p class="fcon2">Address:</b> </p><br>
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
<?php
}
?>
