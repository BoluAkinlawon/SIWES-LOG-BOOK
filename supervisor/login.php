<?php include "includes/header.php";?>

<?php
include "includes/config.php";

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query= "SELECT username, password from supervisor where username ='$username'and password ='$password'";
	$query_run=mysqli_query($connection,$query);
	
	if ($query_run -> num_rows > 0){
		session_start();
		$_SESSION['username'] = $username;
		header("location:dashboard.php");
		
	}else{
		echo "<p align =center>"."<a href =register.php style ='background:white';>"."Sorry you have to register first"."</a>";
		//header("location:register.php");
	}
	
}else{
	
}
?>
<html>
<head>
<link rel ="stylesheet" type ="text/css" href ="includes/style.css">
  <style>
  input { 
font-size: 95%; 
color: #5a5854; 
background-color: #f2f2f2; 
border: 1px solid #bdbdbd; 
border-radius: 10px; 
padding: 10px 10px 10px 10px; 
background-repeat: no-repeat; 
background-position: 8px 9px; 
display: block; 
margin-bottom: 10px;} 
input:focus {
background-color: #ffffff; 
border: 1px solid #b1e1e4;
    width: 300px; 
} 

textarea{
font-size: 87%; 
color: #5a5854; 
background-color: #f2f2f2; 
border: 1px solid #bdbdbd; 
border-radius: 5px; 
padding: 40px 40px 40px 40px; 
background-repeat: no-repeat; 
background-position: 8px 9px; 
display: block; 
margin-bottom: 10px;} 
input:focus {
background-color: #ffffff; 
border: 1px solid #b1e1e4;} 
width: 300px; 
height: 100px;
	
}

button{
	display: block;
	font-size: 100%; 
    color: #5a5854;
	padding: 4px 4px 4px 4px; 
	margin-bottom: 10px;
	border-radius: 5px;
	border: 1px solid #b1e1e4;
}

  </style>
</head>
<body >
<center>
<div style ="width:250px;">
<fieldset style ="background:white;">
<form action ="" method ="post">
<div style ="width:250px; height:45px; background:gray; color:white">LOGIN</div>
<div style ="width:250px; height:5px; background:white;"></div>
<input name ="username" type ="text" placeholder ="Username" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"required></input>
<input name ="password" type ="password" placeholder ="Password" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"required></input>
<button name="submit" style ="background:lightgreen; width:250px;">SUBMIT</button>
</form>
</fieldset>
</div>
</center>
<p>Don't have an account? <a href ="register.php">Register</a><p><a href="forgot password.php">Forgot Password?</a>

<div style ="height:230px; width:100%;">
</div>


<?php include "includes/footer.php";?>
</html>