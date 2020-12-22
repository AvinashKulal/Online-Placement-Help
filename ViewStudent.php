<?php 

include("connection.php");

if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='LectureLogin.php'</script>";
	
}

$query = "SELECT * FROM student";
$sql = mysqli_query($conn,$query);



?>




<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body bgcolor="#efefef">
<center>
<h1>-: VIEW STUDENT RECORD :-</h1>
<nav style="float:left"> 
<a href="LectureDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
<hr>
</center>



<?php
while($res = mysqli_fetch_array($sql)){
	
?>

<div>
<img width="75px" height="75px" src = "images/<?php echo $res['profilepicture'];  ?>" alt="profile picture" />
&nbsp;&nbsp;&nbsp;
<span><?php echo $res['name']; ?></span> |
<span><?php echo $res['dob']; ?></span> |
<span><?php echo $res['cocubesid']; ?> </span>
<a href="StudentProfile.php?id=<?php echo $res['cocubesid'] ?> " class = "subtitle" ><< View Profile >></a>

</div>
<hr>
<?php 
}

?>
</body>
<script type="text/javascript">
function viewProfile(id){
	window.location = "StudentProfile.php?id="+id;
	
}

</script>