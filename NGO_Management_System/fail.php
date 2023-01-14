<?php
session_start();
$MySQLi_connection= new MySQLi('sql308.epizy.com','epiz_32339273','hjwTDGW9Lzb','epiz_32339273_cse482project');

if(MySQLi_connect_error())
{
    die('Connect Error('.MySQLi_connect_errno().')'.MySQLi_connect_error());
}
?>
<html>
<body>
<h1>Payment is Cancelled.</h1>
</body>
</html>
<?php

    $date = $_SESSION['date'];

    $query1 = "DELETE FROM `donation_list` WHERE `Date_of_Donation`='$date'";
    $result1 = mysqli_query($MySQLi_connection, $query1);

?>
