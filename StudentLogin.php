

<?php 

include("connection.php");

if(isset($_SESSION['LOG']) ){
	
	echo "<script>window.location='StudentDashboard.php'</script>";
	
}







if(isset($_POST['submit'])){
	$queryi = "select * from  student where email = '$_POST[email]' and phone = '$_POST[phone]'  ";
	
	
	
	$sqli = mysqli_query($conn, $queryi)or die("Error");
	$row=mysqli_num_rows($sqli) ;

	if($row==1){
		$_SESSION["TYPE"] = "student";
		$_SESSION["email"] =$_POST['email'];
		$_SESSION['LOG'] = 1;
		
		echo("<script>alert('Student Login Successfully............');</script>");
	echo "<script>window.location='StudentDashboard.php'</script>";
	}
	else{
		echo("<script>alert('Student not exits............');</script>");
	}
}


?>



<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body bgcolor="skyblue">
<center>	
<h1>-: ONLINE PLACEMENT HELP :-</h1>
<p class="subtitle">User Our Online System and Get Placed In Reputated Company</p>
</br></br>
<form method="POST" action="">

<div class = "container" style="background:white">
<h2 class="white-text" style="color:green">STUDENT LOGIN</h2>

<input type="text" name="phone" value="" placeholder="Phone..." required />
</br>
<input type="email" name="email" value="" placeholder="Email..." required />





</br>

<input type="submit" value="Login" name="submit"/>

</div>
</form>

</center>

</body>


