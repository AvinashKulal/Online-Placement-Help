<?php 

include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='StudentLogin.php'</script>";
}
$query = "select * from company where number = '$_GET[cnumber]' ";
$sql = mysqli_query($conn,$query);
$res = mysqli_fetch_array($sql);




?>



<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>
<center>
<h1>-: COMPANY INFOMATION :-</h1>
<nav style="float:left"> 
<a href="StudentDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
	
<hr style="height:5px;background:red">
<img src="images/<?php echo $res['logo']?>" width="500px" height="250px" style="border:2px solid white;border-radius:5px;box-shadow: 0 10px 10px 0 rgba(0,1,1,.4)"/>
<h2><?php echo $res['name']?></h2>
<p class =  "subtitle">COMPANY PROFILE</p>
<p class = "para"><?php echo $res['address']?> </p>
<hr>
<p class =  "subtitle">JOB DESCRIPTION</p>
<p class = "para" ><?php echo $res['jobdescription']?> </p>

<hr>
<p class =  "subtitle">MARKS CRITERIA</p>
<span>  <span style="color:red">SSLC : </span><?php echo $res['sslc']?>%</span></br>
<span>  <span style="color:red">PUC/DIPLOMA : </span><?php echo $res['dip']?>%</span></br>
<span>  <span style="color:red">UG : </span><?php echo $res['ug']?>%</span></br>
</br>
<span>  <span style="color:red">QUANT : </span><?php echo $res['quant']?>%</span></br>
<span>  <span style="color:red">ENGLISH : </span><?php echo $res['english']?>%</span></br>
<span>  <span style="color:red">LOGICAL REASONING : </span><?php echo $res['logic']?>%</span>
</br></br>
<?php 

$q = "SELECT * FROM applied,student where number ='$res[number]'  and student.cocubesid = applied.cocubesid and student.email = '$_SESSION[email]' ";
$s = mysqli_query($conn,$q) or die("Error");;
$row=mysqli_num_rows($s) ;
$flag = 1;
if($row == 1){
	$flag = 0;
?>
<button type="button" class = "buttons" disabled >Applied</button>


<?php }
$Q = "SELECT cocubesid from student where email  = '$_SESSION[email]' ";
$s = mysqli_query($conn,$Q);
$r = mysqli_fetch_array($s);
$id = $r['cocubesid'];
$query ="select * from test where cocubesid  = '$id' ";

$sql = mysqli_query($conn, $query)or die("Error");
$row=mysqli_num_rows($sql) ;
$temp = mysqli_fetch_array($sql);

if($flag == 1 and ($row == 0 or $res['quant']>$temp['quant'] or $res['english']>$temp['english'] or $res['logic']>$temp['logic'])){

?>

<button type="button" class = "buttons" disabled >You are Not Eligible For this Job</button>
<p style="color:red;font-size:20px">Either you are not taken Test or You are not meetingCompany criteria</p>

<?php }else if($flag != 0){?>
<a class = "buttons" href = "applied.php?cnumber=<?php echo $res['number']; ?>">&nbsp;&nbsp;&nbsp;Apply&nbsp;&nbsp;&nbsp;</a>
<?php } ?>
</br></br></br></br>

