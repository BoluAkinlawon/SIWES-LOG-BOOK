<?php include "includes/header.php";?>


<?php
include "includes/config.php";
if(isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$matric_no = $_POST['matric'];
	$password = $_POST['password'];
	$query = "INSERT INTO student(firstname, lastname, email, matric_number, password) VALUES ('$firstname', '$lastname', '$email', '$matric_no', '$password')";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		header("location:dashboard.php");
		
	}
	else{
		echo "Error!";
	}
}
	
?>
<center>
<div style ="width:250px;">
<fieldset style ="background:white;">
<form action ="" method ="post">
<div style ="width:250px; height:45px; background:gray;"></div>
<div style ="width:250px; height:5px; background:white;"></div>

<input name ="firstname" type ="text" placeholder ="Firstname" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></></input>
<input name ="lastname" type ="text" placeholder ="Lastname" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></></input>
<input name ="email" type ="email" placeholder ="Email" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></></input>
<input name ="matric" type ="text" placeholder ="Matric Number" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></></input>
<input name ="password" type ="password" placeholder ="Password" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></></input>

<input type ="submit" name="submit"></input>
</form>
</fieldset>
</div>
</center>


<?php include "includes/footer.php";?>