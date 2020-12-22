
<?php 
include("connection.php");
if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='LectureLogin.php'</script>";
}

else if(isset($_POST['add'])){
	
	echo "<script>window.location='AddStudent.php'</script>";
}

else if(isset($_POST['update'])){
	 $id = $_POST['cocubesid1'];
	 $query = "select * from student where cocubesid  = '$id' ";
	 $sql = mysqli_query($conn,$query);
	 if(mysqli_affected_rows($conn)==0){
	
			echo("<script>alert('Student Not Registers...');</script>");
	}
	else
		echo "<script>window.location='UpdateStudent.php?id=$id&state=1'</script>";
	
}
else if(isset($_POST['delete'])){
	 $id = $_POST['cocubesid2'];
	 $query = "select * from student where cocubesid  = '$id' ";
	 $sql = mysqli_query($conn,$query);
	 if(mysqli_affected_rows($conn)==0){
	
			echo("<script>alert('Student Not Registers...');</script>");
	}
	else
		echo "<script>window.location='UpdateStudent.php?id=$id&state=2'</script>";
}

else if(isset($_POST['view'])){
	echo "<script>window.location='ViewStudent.php'</script>";
}

?>











<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>
<center>
<div class = "containers">
<h1>-: LECTURE DASHBOARD :-</h1>
<nav style="float:left"> 
<a href="LectureDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
</div>
<hr>
<h1 class="animate">(:- Bright Future Here -:)</h1>

</br>

<div>
<img class="slider" />

</div>
<p class="para">   Working, whether paid or unpaid, is good for our health and wellbeing. It contributes to our happiness, helps us to build confidence and self-esteem, and rewards us financially. Because of these benefits, it is important to return to work as soon as possible after an illness or injury.
</br>People in work tend to enjoy happier and healthier lives than those who are not in work.

Our physical and mental health is generally improved through work – we recover from sickness quicker and are at less risk of long term illness and incapacity.

Because of the health benefits, sick and disabled people are encouraged to return to, or remain in, work if their health condition permits it.

</p>
<hr>

<form action ="" method="POST">




<div class="equal-grid">

<div class="grid-item">
<p class="subtitle">Add Student</p>
<img src="images/addstudent.png" width="100%" height="300px"/>
<input type="submit" name="add" value="ADD STUDENT"/>
</div>


<div class="grid-item">
<p class="subtitle">View Student</p>
<img src="images/search.jpg" width="100%" height="300px"/>
<input type="submit" name="view" value="VIEW STUDENT"/>

</div>


<div class="grid-item">
<p class="subtitle">Update Student</p>
<img src="images/update.jpg" width="100%" height="300px"/>
<input type="text" name="cocubesid1" placeholder="Student Cocubes id"  /></br>
<input type="submit" name="update" value="UPDATE STUDENT"/>
</div>






<div class="grid-item">
<p class="subtitle">Delete Student</p>
<img src="images/delete.jpg" width="100%" height="300px"/>
<input type="text" name="cocubesid2" placeholder="Student Cocubes id"  /></br>
<input type="submit" name="delete" value="DELETE STUDENT"/>
</div>

</div>

</form>



</center>

</body>

