<?php include "includes/header.php";?>
<?php include "includes/config.php";?>
<html>
<center>


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
<div style ="height:42px; width:100%;">

<?php
// Return current date from the remote server
echo "Today's date: ";
$date = date('d-m-y ');
echo $date;
?>

<form action ="" method ="post" align ="right">
<a href ="logout.php">Log Out</a>
<!--<button type ="submit" name ="logout" value ="logout"  style ="margin:5px;">Log Out</button>-->
</form>
</div>
<div style ="background:white; height:105px; width:100%;">
</div>
</div>
</center>


<div style ="background:white; height:500px; width:100%;">
<?php echo "<h3>"."Welcome  ".$session. "!". "</h3>". "</br>"; ?>
<center>


<?php
 if (isset($_POST['submit'])){
	 $activity = $_POST['activity'];
	 $date = date('d-m-y ');
	 
	 $query = "INSERT into records(activity, matric_number, date) VALUES ('$activity','$session','$date')";
	 $query_run = mysqli_query($connection, $query);
	 
	 if($query_run){
		 echo '<script type="text/JavaScript">alert("Success");</script>';
		 echo "Success";
	 }
	 else{
		 echo"Error";
	 }
	 
 }


?>

<marquee><h4>Please fill carefully before you submit. You an only submit once a day.</h4></marquee><br>
<form action ="" method ="post">
Fill your log book for today:<br><br>
Activities for the day<textarea name ="activity" type ="text" style ="height:250px; width:480px; font-size: 20px;" required></textarea>
<button type ="submit" name ="submit">Submit</button><a href="dashboard.php"><button>Reset</button></a>
</form>
</center>
<hr>
<a href="view.php"><button>View Your Log book Records</button></a>
</div>
<?php include "includes/footer.php";?>
</html>