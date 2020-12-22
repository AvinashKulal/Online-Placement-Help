

<?php 

include("connection.php");
if(isset($_SESSION['LOG'])){
	echo "<script>window.location='LectureDashboard.php'</script>";
}







$query  = "select collegename from college";
$sql = mysqli_query($conn,$query);




if(isset($_POST['submit'])){
	$queryi = "select * from  lecture where cocubesid = '$_POST[cocubesid]' 
				and email = '$_POST[email]' and password = '$_POST[password]'  ";
	
	
	
	$sqli = mysqli_query($conn, $queryi)or die("Error");
	$row=mysqli_num_rows($sqli) ;
	if($row==1){
		$_SESSION["TYPE"] = "lecture";
		$_SESSION["COCUBESID"] =$_POST['cocubesid'];
		$_SESSION['LOG'] = 1;
		
		echo("<script>alert('Lecture Login Successfully............');</script>");
	echo "<script>window.location='LectureDashboard.php'</script>";
	}
	else{
		echo("<script>alert('User not exits............');</script>");
	}
}


?>



<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>	
<h1>-: ONLINE PLACEMENT HELP :-</h1>
<p class="subtitle">User Our Online System and Get Placed In Reputated Company</p>
</br></br>
<form method="POST" action="">

<div class = "container">
<h2 class="white-text">LECTURE LOGIN</h2>
<input type="email" name="email" value="" placeholder="Email" required />
</br>
<input type="password" name="password" value="" placeholder="Password" required />
</br>

<input type="text" name="cocubesid" value="" placeholder="Cocubes Id" required  />
</br>


<select name="college" required >
<option value="">Choose college</option>
<?php

while($res = mysqli_fetch_array($sql))
{
	
?>
<option value="<?php echo $res['collegename']; ?>"><?php echo $res['collegename']; ?></option>

<?php

}
?>
</select>
</br>

<input type="submit" value="Login" name="submit"/>

</div>
</form>

</center>

</body>


