<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="icon.png">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Admin Dash Board</title>
</head>
<body>
<?php
$serverName = "fdb34.awardspace.net";
$userName = "4153487_cse482project";
$password = "1234qwert";
$dbname = "4153487_cse482project";

$db = mysqli_connect($serverName, $userName, $password, $dbname);

$email = $_SESSION['id'];
$query = "SELECT * FROM `admin_panel` WHERE `Email` = '$email'"; 
$results = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($results);


  ?>   

	<!-- SIDEBAR -->
	<section id="sidebar">
		
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-group' ></i>
					<form action="donor_list_admin.php" method="POST">  
					<button type="submit" name="dnr_lst"><span class="text">Donor List</span></button></form>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-group' ></i>
					<form action="project_list_admin.php" method="POST">  
					<button type="submit" name="prjct_lst"><span class="text">Project List</span></button></form>
				</a>
			</li>
			<li class="active"> 
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<form action="donate_history_admin.php" method="POST">  
					<button type="submit"  name="dnt_hstr"><span class="text">Donation History</span></button></form> 
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<form action="application_list_admin.php" method="POST">  
					<button type="submit" name="aplctn_lst"><span class="text">Application List</span></button></form>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
                    <form action="admin_login.html" method="POST">   
					<button type="submit" name="logout"><span class="text">Logout</span></button></form>
					
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<div class="Logo">
				<a href ="index.html" >
				 <img src="Logo.png" alt="Desh Bondhu LTD" width="" height=""> 
			 </a> 
			  </div>
		
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Admin Dhashboard</h1>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>3</h3>
						<p>Successful Project</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>10</h3>
						<p>Number of Donor</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>20,000</h3>
						<p>Total Collected Amount</p>
					</span>
				</li>
			</ul>

			
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>

</html>