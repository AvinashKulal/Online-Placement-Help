<?php 

include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='StudentLogin.php'</script>";
}
$Q = "SELECT cocubesid from student where email  = '$_SESSION[email]' ";
$s = mysqli_query($conn,$Q);
$r = mysqli_fetch_array($s);
$id = $r['cocubesid'];

$query = "SELECT * FROM company,applied where company.number = applied.number and applied.cocubesid = '$id' ";
$sql = mysqli_query($conn,$query);

$count = 0;


?>



<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>
<center>
<h1>-: COMPANY APPLIED :-</h1>
</center>
<nav style="float:left"> 
<a href="StudentDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
	<?php 
	while($res = mysqli_fetch_array($sql)){
	$count++;
	?>

<hr style="height:5px;background:#efefef">
<div style = "background:#efefef;padding:10px">
<img src="images/<?php echo $res['logo']?>" width="300px" height="150px" style="border:2px solid white;border-radius:5px;box-shadow: 0 10px 10px 0 rgba(0,1,1,.4)"/>
<h3><?php echo $res['name']?></h3>
<span><?php echo $res['number']?></span>
<a style="position:relative;left:300px;color:red" class = "subtitle" href="viewcompany.php?cnumber=<?php echo $res['number']?>" >View Post</a>

</div></br>

<?php } ?>

<?php if($count==0){?>
<center><h3>Not Applied to Any Company</h3></center>
<?php }?>
</body>