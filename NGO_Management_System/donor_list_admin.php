<?php
$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['dnr_lst'])){
	$query = "SELECT * FROM `donor_list`";
	$result = mysqli_query($MySQLi_connection, $query);

    $query1 = "SELECT * FROM `donation_list`";
	$result1 = mysqli_query($MySQLi_connection, $query1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Desh Bondhu LTD.</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="donor_list_admin.css">

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
      <caption>Donor List</caption>
      <thead>
        <tr>
          <th scope="col">Donor Id</th>
          <th scope="col">Donor Name</th>
          <th scope="col">Contact no.</th>
          <th scope="col">Address</th>
          <th scope="col">Email</th>
          <th scope="col">Total Donated Amount</th>
        </tr>
      </thead>
			<?php
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
       ?>
      <tbody>
        <tr>
          <td data-label="Account"><?php echo $row['Donor_Id']; ?></td>
          <td data-label="Due Date"><?php echo $row['Full_Name']; ?></td>
          <td data-label="Period"><?php echo $row['Contact_No']; ?></td>
          <td data-label="Period"><?php echo $row['Address']; ?></td>
          <td data-label="Amount"><?php echo $row['Email']; ?></td>
          <td data-label="Period">50,000</td>
        </tr>



      </tbody>
			<?php
		}
		?>
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
