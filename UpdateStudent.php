<?php 

include("connection.php");

if(!isset($_SESSION['LOG'])){
	
	echo "<script>window.location='LectureLogin.php'</script>";
	
}

$query = "SELECT * FROM student where 	cocubesid  = '$_GET[id]' ";
$sql= mysqli_query($conn,$query);
$res  = mysqli_fetch_array($sql);

if(isset($_POST['delete'])){
	
	$q = "DELETE  FROM student where cocubesid  = '$_GET[id]'";
	$s= mysqli_query($conn,$q);
	echo "<script> alert('Record Deleted Successfully')</script>";
	echo "<script>window.location='LectureDashboard.php'</script>";
}

if(isset($_POST['update'])){
	
	$q = 
		
		
		"UPDATE `student` SET 
		`name`='$_POST[name]',`dob`='$_POST[dob]',`phone`='$_POST[phone]',
		`email`='$_POST[email]',`address`='$_POST[address]',`postal`='$_POST[post]',
		`sslcyop`='$_POST[a]',`sslcperc`='$_POST[b]',`sslccollg`='$_POST[c]',
		`dipyop`='$_POST[dipyop]',`dipperc`='$_POST[dipperc]',`dipcollg`='$_POST[dipcollege]',
		`ug`='$_POST[ug]',`stream`='$_POST[stream]',`ugyop`='$_POST[ugyop]',
		`ugperc`='$_POST[upperc]'  WHERE  `cocubesid`  = '$_GET[id]'";
		
		
	
	
	$s= mysqli_query($conn,$q);
	//echo mysqli_error($conn);
	echo "<script> alert('Record Updated Successfully')</script>";
	
}



?>







<head>
<link rel = "stylesheet" type="text/css" href = "style.css"/>
</head>
<body bgcolor="#efefef">
<center>
<h1>-: STUDENT RECORD :-</h1>
<nav style="float:left"> 
<a href="LectureDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>
<hr>
<form action = "" method = "POST">

<?php

if($_GET['state']==1){
	?>
	
	
	


<span>Name:</span><input type="text" value="<?php echo $res['name'];?>" name="name" placeholder="Student Name"/>
</br>

</br>
<span>Date of Birth:</span><input type="date" value="" name="dob"  />
</br>

<span>Phone Number:</span><input type="number" name="phone" placeholder="Phone number" value="<?php echo $res['phone'];?>"  /></br>
<span>Email Address:</span><input type="email" name="email" placeholder = "Email address" value="<?php echo $res['email'];?>"  /></br>

<span>Address:</span><textarea name  ="address">
<?php echo $res['address'];?>

</textarea></br>
<span>Postal Code:</span> <input type="text" name="post" placeholder="Postal Code" value="<?php echo $res['postal'];?>" />
</br>






 
<span>SSLC year of Passing:</span><input type="text"  name="a" placeholder  = "SSLC year of Passing" value="<?php echo $res['sslcyop'];?>" /></br>
<span>SSLC %:</span><input type="text"  name="b" placeholder = "SSLC %"  value="<?php echo $res['sslcperc'];?>" /></br>
<span>SSLC College Name :</span><input type="text"  name="c" placeholder="SSLC College Name" value="<?php echo $res['sslccollg'];?>"  />
</br>

<span>Puc/Diploma year of Passing:</span><input type="text" name="dipyop" placeholder  = "Puc/Diploma year of Passing" value="<?php echo $res['dipyop'];?>" /></br>
<span>Puc/Diploma %:</span><input type="text"  name="dipperc" placeholder = "Puc/Diploma %"   value="<?php echo $res['dipperc'];?>" /></br>
<span>Puc/Diploma College Name:</span><input type="text"  name="dipcollege" placeholder="Puc/Diploma College Name" value="<?php echo $res['dipcollg'];?>" />
</br>

<select name = "ug">
<option>Select UG </option>
<option>BE/B.TECH</option>
<option>BSC</option>
<option>BA</option>
<option>B.ARCH</option>
</select>
</br>
<select name = "stream">
<option>Select Stream</option>

<option>Aeronautical Engineering</option>
<option>Automobile Engineering</option>
<option>Civil Engineering</option>
<option>Computer Science and Engineering</option>
<option>Biotechnology Engineering</option>
<option>Electrical and Electronics Engineering</option>
<option>Electronics and Communication Engineering</option>
</select></br>
<span>UG year of Passing:</span><input type="text" name="ugyop" placeholder  = "UG year of Passing" 	value="<?php echo $res['ugyop'];?>"  /></br>
<span>UG %:</span><input type="text"  name="upperc" placeholder = "UG %"   value="<?php echo $res['ugperc'];?>"   /></br>

  


	
	
	
	
	
	
	
	
	
	
	
</br>
<input type="submit" name="update" value="Update" />









<?php 
}else{
	
	

	
	?>
	
	<img src="images/<?php echo $res['profilepicture']; ?>" width="250px" height="250px" style="border:2px solid white;border-radius:5px;box-shadow: 0 10px 10px 0 rgba(0,1,1,.4)"/>
	<h2 ><?php echo $res['name']; ?></h2>
	<h3 ><?php echo $res['cocubesid']; ?></h3>
	<span><?php echo $res['dob']; ?> | <?php echo $res['email']; ?></span>
	
	
</br>
<input type="submit" name="delete" value="Delete"/>

<?php
}
?>
</form>
</center>
</body>
	