<?php 

include("connection.php");

if(!isset($_SESSION['LOG']) ){
	
	echo "<script>window.location='LectureLogin.php'</script>";
	
}




$query  = "select * from college,lecture
			where cocubesid = '$_SESSION[COCUBESID]' and college.collegeid = lecture.collegeid";
			
$sql = mysqli_query($conn,$query);
$res = mysqli_fetch_array($sql);

  
   
  $qq  = "select max(cocubesid) AS P from student";
			
$ss = mysqli_query($conn,$qq);
$rr= mysqli_fetch_array($ss);
$range = (int)  substr($rr['P'],11,3);
$range++; 
$s = "stduentcocu".$range;

if(isset($_POST['submit'])){
	
	$filename = $_FILES["profile"]["name"]; 
    $tempname = $_FILES["profile"]["tmp_name"]; 
	$folder = "images/".$filename; 
	
	
	
	move_uploaded_file($tempname, $folder);
	
	
	
	
	
	$ini = $_POST['initial'];
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$name = $ini." ".$first." ".$last;
	$q = "INSERT INTO `student`(`cocubesid`, `profilepicture`, `name`,
	`dob`, `phone`, `email`, `address`, `postal`, `sslcyop`, `sslcperc`,
	`sslccollg`, `dipyop`, `dipperc`, `dipcollg`, `ug`, `stream`, `ugyop`,
	`ugperc`, `collegeid`) VALUES 
	('$s','$filename','$name','$_POST[dob]','$_POST[phone]','$_POST[email]','$_POST[address]','$_POST[post]',
	
	'$_POST[a]','$_POST[b]','$_POST[c]','$_POST[dipyop]','$_POST[dipperc]','$_POST[dipcollege]','$_POST[ug]','$_POST[stream]',
	
	
	'$_POST[ugyop]','$_POST[upperc]','$res[collegeid]' )";
	
	
	
		$sql = mysqli_query($conn,$q);
		if(mysqli_affected_rows($conn)==1){
			echo("<script>alert('Student Registered Successfully....');</script>");
		}else
			echo mysqli_error($conn);
}

  
?>











<link rel="stylesheet" type="text/css" href="style.css"/>

<body>
<center>
<h1>-: Add Student Information :-</h1>
<nav style="float:left"> 
<a href="LectureDashboard.php" class = "subtitle"  style="font-size:20px">Home | </a>
<a href = "logout.php" class = "subtitle" style="font-size:20px">Logout</a>
</nav>
</br></br>


</center>



<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'personal')" id="defaultOpen">Personal</button>
  <button class="tablinks" onclick="openCity(event, 'education')">Education</button>
  <button class="tablinks" onclick="openCity(event, 'college')">College</button>
</div>
<form method="POST" enctype="multipart/form-data">
<div id="personal" class="tabcontent">

<h2>Personal Information</h2>

<hr>
<label>Profile Picture</label></br>
<input type="file" placeholder = "select" accept="image/*" style="background:none" name="profile" /></br>

<select name = "initial">
<option>Mr</option>
<option>Mrs</option>
<option>Miss</option>
<option>Ms</option>
</select>

</br>
<input type="text" value="" name="firstname" placeholder="First Name"/>
</br>
<input type="text" value="" name="lastname" placeholder="Last Name"/>
</br>

</br>
<label>Dob</label></br>
<input type="date" value="" name="dob" />
</br>

<input type="number" name="phone" placeholder="Phone number"/></br>
<input type="email" name="email" placeholder = "Email address"/></br>

<label>Address</label></br>
<textarea name  ="address">


</textarea></br>
<input type="text" name="post" placeholder="Postal Code"/>
</br>




</div>

<div id="education" class="tabcontent">
  <h2>Education Information<h2>
<hr>


 
<input type="text" value="" name="a" placeholder  = "SSLC year of Passing"/>
<input type="text" value="" name="b" placeholder = "SSLC %"/>
<input type="text" value="" name="c" placeholder="SSLC College Name"/>
</br></br>

<input type="text" value="" name="dipyop" placeholder  = "Puc/Diploma year of Passing"/>
<input type="text" value="" name="dipperc" placeholder = "Puc/Diploma %"/>
<input type="text" value="" name="dipcollege" placeholder="Puc/Diploma College Name"/>
</br></br>

<select name = "ug">
<option>Select UG </option>
<option>BE/B.TECH</option>
<option>BSC</option>
<option>BA</option>
<option>B.ARCH</option>
</select>

<select name = "stream">
<option>Select Stream</option>

<option>Aeronautical Engineering</option>
<option>Automobile Engineering</option>
<option>Civil Engineering</option>
<option>Computer Science and Engineering</option>
<option>Biotechnology Engineering</option>
<option>Electrical and Electronics Engineering</option>
<option>Electronics and Communication Engineering</option>
</select>
<input type="text" value="" name="ugyop" placeholder  = "UG year of Passing"/>
<input type="text" value="" name="upperc" placeholder = "UG %"/>

  
</div>

<div id="college" class="tabcontent">
  
  <h2>College Information</h2>
  <hr>
<input type="text" value="<?php echo $res['collegename']; ?>" name="collegename" readonly />
</br>

<textarea  readonly >
<?php echo $res['collegeaddress']; ?>

</textarea></br>

<input type="text" value="<?php echo $res['collegepost']; ?>" name="post" readonly />
</br></br>
<span >Generated Student Cocubes Id:</span></br></br><span style="color:red;font-size:30px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php 



echo $s;
?></span>
</br>
</br>
  
  <input type="submit" value="Save Record" name="submit"/>

</div>

</form>

<script>
document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 









































