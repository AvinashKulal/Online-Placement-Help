<?php 

include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='StudentLogin.php'</script>";
}
$query = "SELECT * FROM company";
$sql = mysqli_query($conn,$query);




?>





<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>
<center>
<h1>-: COMPANY DASHBOARD :-</h1>

<nav style="float:left"> 
<a href="StudentDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
	<?php 
	while($res = mysqli_fetch_array($sql)){
	
	?>

<hr style="height:5px;background:blue">
<div style = "padding:10px">
<img src="images/<?php echo $res['logo']?>" width="300px" height="150px" style="border:2px solid white;border-radius:5px;box-shadow: 0 10px 10px 0 rgba(0,1,1,.4)"/>
<h3><?php echo $res['name']?></h3>
<span><?php echo $res['number']?></span></br>
<a style="color:red" class = "subtitle" href="viewcompany.php?cnumber=<?php echo $res['number']?>" >View Post</a>

</div></br>

<?php } ?>
</center>
</body>