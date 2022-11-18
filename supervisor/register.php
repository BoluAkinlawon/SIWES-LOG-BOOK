<?php include "includes/header.php";?>


<?php
include "includes/config.php";

if(isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
 
  $query = "INSERT INTO supervisor(firstname, lastname, username,email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
  $query_run = mysqli_query($connection, $query);
  
  
  
  if($query_run){
	  header("location:login.php");
	  
  
	 //header("location:register.php");
	
	 
 }else if(!$query_run){
	  echo "Error"; 
  }
  
   
	  
}
?>
<html>
<head>
<link rel ="stylesheet" type ="text/css" href ="includes/style.css">
</head>
<center>
<div style ="width:250px; height:455px;">
<fieldset style ="background:white;">
<form action ="" method ="post">
<div style ="width:250px; height:45px; background:gray; color:white;">REGISTER NOW</div>
<div style ="width:250px; height:5px; background:white;"></div>
Enter your personal details below
<input name ="firstname" type ="text" placeholder ="Firstname" style="width: 250px; height: 30px; text-border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;" required></input>
<input name ="lastname" type ="text" placeholder ="Lastname" style="width: 250px; height: 30px; text-border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;" required></input>
<input name ="email" type ="email" placeholder ="Email" style="width: 250px; height: 30px; text-border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;" required></input>
<hr>

Enter your account details below
<input name ="username" type ="text" placeholder ="Username" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"required></input>
<input name ="password" type ="password" placeholder ="Password" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"required></input>
<button name="submit" style ="background:lightgreen; width:250px;">SUBMIT</button>
</form>
</fieldset>
</div>
</center>
</html>


<?php include "includes/footer.php";?>