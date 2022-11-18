<?php include "includes/header.php";?>
<html>
<head>
<link rel ="stylesheet" type ="text/css" href="includes/style.css">
<style>
table {
border-collapse: collapse;
width: 99.8%;
color: #588c7e;
margin: 1px;
font-family: Arial, "Trebuchet MS", Helvetica;
font-size: 20px;
text-align: left;
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
<form action ="" method ="post">
<h3>Search for student records according to matric number...</h3>
	<input type ="text" name ="matric"></input required><br>
	<button type = "submit" name ="search">Search</button>
	<a href="view.php"><button>Reset</button></a>
</form>

<center>
<div style ="height:auto; width:100%; background:;">
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Matric Number</th>
<th>Activity of the day</th>
<th>Date and Time</th>

</tr>
<?php
include "includes/config.php";
if(isset($_POST['search'])){
$matric_no = $_POST['matric'];
$query2 ="select student.firstname, student.lastname, records.matric_number, records.activity, records.date from 
student join records on student.matric_number = records.matric_number where records.matric_number = '$matric_no'";
$query_run2 = $connection -> query($query2);

  if($query_run2 -> num_rows > 0){
      while($row = $query_run2 -> fetch_assoc()){
      echo "<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["matric_number"]."</td><td>".$row["activity"]."</td><td>".$row["date"]."</td></tr>";
	
	 
      }
        echo "</table>";
  }
  else {
      echo "You do not have any records";
  }
}

  $connection -> close();
?>

<div style ="width:100%; height:5px; background:white;">
</div>
</div>
</div>
</center>
<div style ="height:2px; width:100%; background:white;">
</div>
</html>
