<?php
$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}

if(isset($_POST['prjct_lst'])){
	$query = "SELECT * FROM `project_list`";
	$result = mysqli_query($MySQLi_connection, $query);
    $project_description = "";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Desh Bondhu LTD.</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="project_list_admin.css">


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

  <div class="container">
    <table>
      <caption>Project List</caption>
      <thead>
        <tr>
          <th scope="col">Project Id</th>
          <th scope="col">Project Name</th>
          <th scope="col">Project Description</th>
          <th scope="col">Required Money</th>
          <th scope="col">Raised Amount</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
			<?php
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       ?>
      <tbody>
        <tr>
          <td data-label="Project Id"><?php echo $row['Project_Id']; ?></td>
          <td data-label="Project Name"><?php echo $row['Project_Name']; ?></td>
          <td data-label="Project Description"> <button id="myBtn">View Details</button></td>
          <td data-label="Required Money"><?php echo $row['Total_Money_Needed']; ?></td>
          <td data-label="Raised Amount"><?php echo $row['Raised_Money']; ?></td>
          <td data-label="Status"><?php echo $row['Status']; ?></td>
        </tr>
      </tbody>
			<?php } ?>
    </table>

<!-- Trigger/Open The Modal -->
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p></p>
  </div>

</div>

  </div>
<?php } ?>

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

        // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>


</body>
</html>

