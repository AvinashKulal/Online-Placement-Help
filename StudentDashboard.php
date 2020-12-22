<?php 
include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='StudentLogin.php'</script>";
}

?>








<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>
<center>
<div class = "containers">
<h1>-: STUDENT DASHBOARD :-</h1>
<nav style="float:left"> 
<a href="" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
</div>
<hr>
<div>
<img class="slider" src = "images/student.jpg" />

</div>
<p class="para"> 
If you’re doing well in college, it’s easy to think everyone else is too, but the truth is that many people struggle with passing their courses. You could make a living by helping them out and teaching them what you know.
But don’t stop with fellow college students. You can also teach kids – from elementary school to high school, there are plenty of kids who could use your help
</p>
</br>
<div class = "grid-layout">



<div style="padding:10px;border:2px solid black;border-radius:10px">
<img src = "images/profile.jpg" width="100%" height = "300px" />
<a href = "StudentProfile.php"><button type="submit" class="submit-button">View Profile</button></a>
</div>


<div style="padding:10px;border:2px solid black;border-radius:10px">
<img src = "images/test.jpg" width="100%" height = "300px" />
<a href = "test.php"><button type="submit" class="submit-button">Take Test</button></a>
</div>

<div style="padding:10px;border:2px solid black;border-radius:10px">
<img src = "images/apply.jpg" width="100%" height = "300px" />
<a href = "Company.php"><button type="submit" class="submit-button">Apply Company</button></a>
</div>


<div style="padding:10px;border:2px solid black;border-radius:10px">
<img src = "images/done.png" width="100%" height = "300px" />
<a href = "comapnyapplied.php"><button type="submit" class="submit-button">Applied Company</button></a>
</div>

</div>