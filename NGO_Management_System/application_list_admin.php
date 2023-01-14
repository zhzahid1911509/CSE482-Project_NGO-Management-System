<?php

$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['aplctn_lst'])){
	$query = "SELECT * FROM `ask_for_donation`";
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

	<link rel="stylesheet" type="text/css" href="application_list_admin.css">
<style>
    button{
        font-size: 15px;
        border-radius: 5px;
        width: 80px;
        margin: 10px;
    }
    .buttons{
      line-height: 20px;
      text-align: center;

    }
    .button1{
        color: white;
        background-color: darkgreen;
    }
    .button2{
        background-color: red;
    }
    </style>

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
      <a href="index.html">HOME</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <div class="container">
    <table>
      <caption>Application List</caption>
      <thead>
        <tr>
          <th scope="col">Applicant Id</th>
          <th scope="col">Applicant Name</th>
          <th scope="col">Organization Name</th>
          <th scope="col">Project Name</th>
          <th scope="col">Expected Donation Amount</th>
          <th scope="col">Contact No.</th>
          <th scope="col">Email</th>
          <th scope="col">Office Address</th>
          <th scope="col">Project Proposal</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
			<?php
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       ?>
      <tbody>
        <tr>
          <td data-label="Account"><?php echo $row['Applicant_Id']; ?></td>
          <td data-label="Due Date"><?php echo $row['Applicant_Name']; ?></td>
          <td data-label="Due Date"><?php echo $row['Organization_Name']; ?></td>
          <td data-label="Due Date"><?php echo $row['Project_Name']; ?></td>
          <td data-label="Period"><?php echo $row['Expected_Donation_Amount']; ?></td>
          <td data-label="Period"><?php echo $row['Contact_No']; ?></td>
          <td data-label="Amount"><?php echo $row['Email']; ?></td>
          <td data-label="Period"><?php echo $row['Office_Address']; ?></td>
          <td data-label="Period">
          <form action="viewFile.php" method="POST">
          <input type="hidden" name="app_id" value="<?php echo $row['Applicant_Id']; ?>"> 
          <button type="submit" class="button" name="view">View</button></form></td>
          <td data-label="Period"><?php echo $row['Status']; ?></td>
          <td>
          <div class="buttons">
          <form action="application_process.php" method="POST">
          <input type="hidden" name="app_id" value="<?php echo $row['Applicant_Id']; ?>">    
        <button type="submit" class="button1" name="approve">Approve</button>
        <button type="submit" class="button2" name="decline">Decline</button></form> 
        </div>
          </td>
        </tr>
      </tbody>
      
      <?php } ?>
    </table>

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
