<?php include "includes/header.php";?>
<html>
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
tr:nth-child(even) {background-color: lightgreen;}
</style>
</head>
<center>
<?php
 include "includes/config.php";

session_start();
if(!isset($_SESSION['username'])){
	echo"You are not logged in to see content";
	header("location:login.php");
}else{
	
}



?>
<hr>
<div style ="height:42px; width:100%;">
<form action ="" method ="post" align ="right">
<button type ="submit" name ="logout" value ="logout"  style ="margin:5px;">Log Out</button>
</form>
</div>
<?php
if(isset($_POST['logout'])){
	session_destroy();
	header("location:login.php");
}
 echo "<p style ='margin:5px;' align =right>"."<a href =''  style ='background:white;'>Change password</a>"."</br>";
   echo "<p style ='margin:5px;' align =right>"."<a href ='view.php'  style ='background:white;'>View Student Record</a>"."</br>";
 //echo "<p style ='margin:5px;' align =right>".$_SESSION['phone']."</br>";

?>
<?php
$date = date('d-m-y ');
echo "Today's date:". $date."</br>";
?>
<?php
if(isset($_POST['submit'])){
	$matric_no = $_POST['matric'];
	$remark = $_POST['remark'];
	$date = date('d-m-y ');
	
	$query = "INSERT into verify(matric_number, remark, date) VALUES ('$matric_no','$remark','$date')";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		echo '<script type="text/JavaScript">alert("Success");</script>';
		
	}
	else{
		echo "Error!";
	}
}

?>

<hr>
<div style ="height:320px; width:100%;">
<h4>Add Remark/signature to the student for this week</h4>

<fieldset>
<form action ="" method ="post">
<input name ="matric" type ="text" placeholder= "Enter Student matric Number" required></input>
<textarea name ="remark" type ="text" placeholder= "Enter Remark" required></textarea>
<button name ="submit" type ="submit">Submit</button> <a href="dashboard.php"><button>Reset</button></a>
</form>
</fieldset>

</div>
</html>

<?php include "includes/footer.php";?>