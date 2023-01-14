<?php
$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}


	$query = "SELECT * FROM `project_list`";
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
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
  <div class="header">
    <div class="sub-header">
      <div class="Logo">
        <a href ="home.html" >
          <img src="Logo.png" alt="Desh Bondhu LTD" width="" height="">
        </a>
      </div>
    </div>
    <div class="topnav" id="myTopnav">
      <div class="sub-header">
        <a href="donor_signup.html" class="active">DONATE</a>
      <a href="whoweare.html">WHO WE ARE</a>
      <a href="whatwedo.html">WHAT WE DO</a>
      <a href="wherewework.html">WHERE WE WORK</a>
      <a href="home.html" class="active">HOME</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      </div>
    </div>
  </div>
   <img class="image1" src="homepageimage2.png" alt="homeimage.png" width="1000" height="">

  <div class="Container">
   <!-- WHO WE ARE STARTS  -->
    <div class="whoweare">
      <div class="who_image">
        <img class="whoimage" src="whoweare.png" alt="whoweare.png" width="200" height="200" loading="lazy">
      </div>
      <div class="whowe_content">
      <p class="headline"><b>WHO WE ARE</b></p>
      <p class="desc">The Desh Bondhu LTD NGO Management System will help conduct the necessary tasks of the organization. Through this web base application, the NGO will
be able to publish their projects, and the users will be able to donate their amount for those projects. Besides this, if an organization needs any kind of financial support,
they can also apply to receive the amount. Through this web-based application, the whole process will be more accessible, users will be able to do all the processes online, and things will be easier.</p>
      <a href="whoweare.html" class="button">More About Us</a>
      </div>

    </div>
    <!-- WHO WE ARE ENDS -->

    <!-- OUR MISSION STARTS -->
    <div class="whoweare">

      <div class="ourmission_content">
      <p class="headline"><b>OUR MISSION</b></p>
      <p class="desc">From Bangladesh, a country facing the most pressing of humanity’s challenges, we develop scalable solutions to strengthen marginalised communities, and empower people to transform their lives and reach their full potential.</p>
      <a href="whoweare.html" class="button">More About Us</a>
      </div>
      <div class="ourmission_image">
        <img class="ourmission" src="ourmission.png" alt="whoweare.png" width="400" height="400" loading="lazy">
      </div>

    </div>
    <!-- OUR MISSION ENDS -->
  </div>
  <div class="container2">
    <div class="whoweare2">
      <div class="ourmission_content">
        <p class="headline"><b>OUR COMMITMENTS</b></p>
        <h3><i>… TO THE PEOPLE WE SERVE.</i></h3>
        <p class="desc">To reach our vision and fulfil our mission, we apply our 5 core values in all our actions. Since 2022, we deliver needs-based services to the communities with a participative and inclusive approach. Through an innovative, integrated development model and an entrepreneurial mindset, we achieve sustainable outcomes, trying to leave no one behind…</p>
        <a href="whoweare.html" class="button">More About Us</a>
        </div>
        <div class="ourmission_image">
          <img class="ourmission" src="commitment.png" alt="whoweare.png" width="400" height="400" loading="lazy">
        </div>
  </div>
  <p class="keypoint"><b>WHAT WE DO</b></p>
  <div class="whatwedo">
    <div class="box">
      <img class="logopic" src ="socialdev.jpg" alt="My sample image" width="300px" height="200px" loading="lazy">
      <p class="date2"><b>Social Development</b></p>

    </div>
    <div class="box">
      <img class="logopic" src ="aarong.jpg" alt="My sample image" width="300px" height="200px" loading="lazy">
      <p class="date2"><b>Social Enterprises</b></p>

    </div>
    <div class="box">
      <img class="logopic" src ="investments.jpg" alt="My sample image" width="300px" height="200px" loading="lazy">
      <p class="date2"><b>Investments</b></p>

    </div>
    <div class="box">
      <img class="logopic" src ="donation.png" alt="My sample image" width="300px" height="200px" >
      <p class="date2"><b>Donation</b></p>

    </div>

  </div>
  </div>
  <div class="container">
    <p class="keypoint"><b>OUR LATEST PROJECTS</b></p>
    
    <div class="latestproject">
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
      <div class="box">
        <a href="projectdetails.html"><img class="logopic" src ="project1.jpg" alt="My sample image" width="300px" height="200px" ></a>
        <p class="date"><b><?php echo $row['Project_Name'] ?></b></p>
        <p class="details">Digital doctor: Bridging healthcare gaps in remote areas</p>
      </div>
      <?php 
    }
    ?>
    </div>
    
  </div>

</div>
</div>
</div>

	<div class="footer">
    <div class="wrap-1">
        <p class="fcon">About US</p>
        <p class="fcon2"> Deshbondhu NGO Ltd is an NGO Management System which will help conduct the necessary tasks of the organization.</p>
    </div>
    <div class="wrap-1">

        <p class="fcon">Contact Us</b></p>
        <p class="fcon2">Address:</b> </p>
        <p class="fcon2">House:##, Road:##, Block: ##, Banai, Dhaka </p>
        <p class="fcon2">Call: </b>10589</p>
        <a href ="https://www.facebook.com/Audi-Bangladesh-1438759706436292" >
  <img src ="fb.png" alt="My sample image" width="40">
</a>

<a href ="https://www.facebook.com/Audi-Bangladesh-1438759706436292" >
  <img src ="insta.png" alt="My sample image" width="40">
</a>

<a href ="https://www.youtube.com/user/AudiofAmerica" >
  <img src ="youtube.png" alt="My sample image" width="40">
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
