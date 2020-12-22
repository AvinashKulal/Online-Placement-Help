
<?php 

include("connection.php");

if(!isset($_SESSION['LOG']) ){
	
	echo "<script>window.location='LectureLogin.php'</script>";
	
}
$query = "";

if(strcmp($_SESSION["TYPE"] , "lecture")==0)
{
$query = "SELECT * FROM student,college where cocubesid='$_GET[id]' and student.collegeid = college.collegeid ";

}else{
	$query = "SELECT * FROM student,college where email='$_SESSION[email]' and student.collegeid = college.collegeid ";

}





$sql = mysqli_query($conn,$query);
$res = mysqli_fetch_array($sql);

?>




<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<h1>-: PROFILE PAGE :-</h1>
<nav style="float:left"> 

<?php if($_SESSION["TYPE"] == "lecture") { ?>
<a href="LectureDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<?php }else{ ?>



<a href="StudentDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
 <?php } ?>


<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>



</center>
<div class="grid-container">
	<div class="leftgrid">
	<center>
	</br></br></br>
	<img src="images/<?php echo $res['profilepicture']; ?>" width="250px" height="250px" style="border:2px solid white;border-radius:5px;box-shadow: 0 10px 10px 0 rgba(0,1,1,.4)"/>
	<h2 class = "white-text"><?php echo $res['cocubesid'] ?></h2>
	<h4 class="white-text" ><?php echo $res['name'] ?></h4></br>
	<hr>
	</br>
	<span class="white-text">Congratulations! You have taken the first step to get the right job opportunity for yourself!</span>
	</center>
	</div>

	<div>
	</br>
		<h3 class="medium-text">PERSONAL INFORMATION</h3>
		<div class = "grid-container2">
		
		<span>  <span style="color:red">Name : </span><?php echo $res['name']?></span>
		<span> <span style="color:red">Date Of Birth : </span><?php echo $res['dob']?></span>
		
		
		<span><span style="color:red">Phone : </span> <?php echo $res['phone']?></span>
		<span><span style="color:red">Address : </span><?php echo $res['address']?></span>
	</div>
	<hr>
	</br>
	<div>
		<h3>EDUCATION INFORMATION</h3>
		<div class = "grid-container2">
		<span><span style="color:red">10th % : </span><?php echo $res['sslcperc'];?>(<?php echo $res['sslcyop'];?>)</span>
		<span><span style="color:red">10th College : </span><?php echo $res['sslccollg']?></span>
	
		<span><span style="color:red">Puc/Diploma % : </span><?php echo $res['dipperc']?>(<?php echo $res['dipyop']?>)</span>
		<span><span style="color:red">Puc/Diploma College : </span><?php echo $res['dipcollg']?></span>
		
		<span> <span style="color:red">Degree : </span> <?php echo $res['ug']?></span>
		<span><span style="color:red">Stream : </span><?php echo $res['stream']?></span>
		<span><span style="color:red">Yop : </span><?php echo $res['ugyop']?></span>
		<span><span style="color:red">Percentage : </span><?php echo $res['ugperc']?>%</span>
		
	
	
	
	</div>
	<hr>
	</br>
	<div>
		<h3>COLLEGE INFORMATION</h3>
		<div class = "grid-container2">
		<span><span style="color:red">College Name : </span><?php echo $res['collegename']?></span>
		<span><span style="color:red">Address : </span><?php echo $res['collegeaddress']?></span>
	
		
		<span><span style="color:red">Post : </span><?php echo $res['collegepost']?> </span>

	</div>
	
	</div>


</div>

</body>