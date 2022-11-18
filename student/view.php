<?php include "includes/header.php";?>
<html>
<head>
<center>
<link rel ="stylesheet" type ="text/css" href="includes/style.css">
<style>
table {
border-collapse: collapse;
width: 99.8%;
color: #588c7e;
margin: 1px;
font-family: Arial, "Trebuchet MS", Helvetica;
font-size: 20px;
text-align: center;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: cyan;}
td{
	height:50px;
}
</style>
</head>
<?php
$connection =mysqli_connect("localhost","root","");
$db =mysqli_select_db($connection, "siwes");

session_start();
if(!isset($_SESSION['matric_number'])){
	echo"You are not logged in to see content";
	header("location:login.php");
}else{
	
}
$session = $_SESSION['matric_number'];



?>
<hr>
</div>
</center>
</html>
<div style ="background:white; height:auto; width:100%;">
<table>
<tr>
<th>Your activity</th>
<th>Date of Activity</th>

</tr>
<?php
include "includes/config.php";

$query2 ="SELECT activity, matric_number, date from records where matric_number = '$session'";
$query_run2 = $connection -> query($query2);

  if($query_run2 -> num_rows > 0){
      while($row = $query_run2 -> fetch_assoc()){
      echo "<tr><td>".$row["activity"]."</td><td>".$row["date"]."</td></tr>";
	
	 
      }
        echo "</table>";
  }
  else {
      echo "You do not have any records";
  }


  $connection -> close();
?>
</div>
