<?php 

include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='StudentLogin.php'</script>";
}
function findScore($start,$end){
	$q = 0;
	for($i = $start;$i<=$end;$i++){
		if($_POST[$i]!="")
			$q++;
	
	}
	$q = (100 * $q)/($end-$start+1);
	return $q;
}
$Q = "SELECT cocubesid from student where email  = '$_SESSION[email]' ";
$s = mysqli_query($conn,$Q);
$r = mysqli_fetch_array($s);
$id = $r['cocubesid'];
$query ="select * from test where cocubesid  = '$id' ";

$sql = mysqli_query($conn, $query)or die("Error");
$row=mysqli_num_rows($sql) ;
$res = mysqli_fetch_array($sql);


if(isset($_POST['submit'])){
	
	
	$q = findScore(1,3);
	$e = findScore(4,7);
	$l = findScore(8,10);
	if($row == 1){
		$Q = "UPDATE test SET quant = '$q',english= '$e',logic = '$l' where cocubesid = '$id' ";
		$s = mysqli_query($conn,$Q);
		echo "<script>alert('Test Score Updated  Successfully')</script>";
		
	}else{
		$Q = "INSERT INTO test values('$q','$e','$l','$id') ";
		$s = mysqli_query($conn,$Q);
		echo "<script>alert('Test Submitted Successfully')</script>";
	}
	
	
	
	echo "<script>window.location='test.php'</script>";
	
		
	
}


?>



<head>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body >

<center>
<h1>-: COMPANY INFOMATION :-</h1>
<nav style="float:left"> 
<a href="StudentDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>


<hr>

<h3> Your Previous Score:</h3>
<?php	if($row == 1) {?>
<div>
<span>Quantitative : </span><h3 style="color:red"> <?php echo $res['quant'] ;?>%</h3>
<span>English :</span><h3 style="color:red"> <?php echo $res['english'] ;?>%</h3>
<span>Logical Reasoning :</span><h3 style="color:red"> <?php echo $res['logic'] ;?>%</h3>
<p class = "subtitle">If you take test Again .Your previous score is updated ! Good luck</p>
</div>
<?php } else {?>
<div>
<span>Your are Not taken Test</span></br>
<span>Take test now. Good luck</span>
</div>
<?php } ?>

</center>
<hr>
<form method="POST">
<div style="margin-left:40px">
<h2>Quantitative Questions</h2>
<p  >1.Which one of the following is not a prime number?</br>
<input type="radio" name="1" value="">31</input></br>
<input type="radio" name="1" value="">61</input></br>
<input type="radio" name="1" value="">71</input></br>
<input type="radio" name="1" value="91">91</input></br>
</p>



<p>2.(112 x 54) = ?</br>
<input type="radio" name="2" value="">67000</input></br>
<input type="radio" name="2" value="70000">70000</input></br>
<input type="radio" name="2" value="">76500</input></br>
<input type="radio" name="2" value="">77200</input></br>
</p>

<p>3.What least number must be added to 1056, so that the sum is completely divisible by 23 ?</br>
<input type="radio" name="3" value="2">2</input></br>
<input type="radio" name="3" value="">16</input></br>
<input type="radio" name="3" value="">3</input></br>
<input type="radio" name="3" value="">18</input></br>
</p>

<h2>English Questions</h2>
<p>1.CORPULENT?</br>
<input type="radio" name="4" value="Lean">Lean</input></br>
<input type="radio" name="4" value="">Gaunt</input></br>
<input type="radio" name="4" value="">Emaciated</input></br>
<input type="radio" name="4" value="">Obese</input></br>
</p>


<p>2.BRIEF?</br>
<input type="radio" name="5" value="">Limited</input></br>
<input type="radio" name="5" value="">Small</input></br>
<input type="radio" name="5" value="">Little</input></br>
<input type="radio" name="5" value="Short">Short</input></br>
</p>

<p>3.VENT?</br>
<input type="radio" name="6" value="Opening">Opening</input></br>
<input type="radio" name="6" value="">Small</input></br>
<input type="radio" name="6" value="">Stodge</input></br>
<input type="radio" name="6" value="">End</input></br>
</p>


<p>4.AUGUST?</br>
<input type="radio" name="7" value="">Common</input></br>
<input type="radio" name="7" value="">Ridiculous</input></br>
<input type="radio" name="7" value="Dignified">Dignified</input></br>
<input type="radio" name="7" value="">Petty</input></br>
</p>

<h2>Logical Reasoning</h2>
<p>1.Look at this series: 7, 10, 8, 11, 9, 12, ... What number should come next?</br>
<input type="radio" name="8" value="">1</input></br>
<input type="radio" name="8" value="">12</input></br>
<input type="radio" name="8" value="10">10</input></br>
<input type="radio" name="8" value="">13</input></br>
</p>

<p>2.Look at this series: 36, 34, 30, 28, 24, ... What number should come next?</br>
<input type="radio" name="9" value="">24</input></br>
<input type="radio" name="9" value="22">22</input></br>
<input type="radio" name="9" value="">34</input></br>
<input type="radio" name="9" value="">29</input></br>
</p>

<p>3.Look at this series: 53, 53, 40, 40, 27, 27, ... What number should come next??</br>
<input type="radio" name="10" value="">12</input></br>
<input type="radio" name="10" value="14">14</input></br>
<input type="radio" name="10" value="">16</input></br>
<input type="radio" name="10" value="">18</input></br>
</p>
</div>
<center>
<input type="submit" name ="submit" value="Submit Test" /></br>
</center>
</form>
</body>