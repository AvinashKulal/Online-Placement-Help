<?php 

include("connection.php");

if(isset($_SESSION['LOG'])){
	echo "<script>window.location='home.php'</script>";
}
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body bgcolor="black">
<center>
<header >
<hr style="height:5px;background:yellow">
<h1 class = "white-text"><u><b>ONLINE PLACEMENT HELP</b></u></h1>
<hr>
</header>
<img src = "images/home.jpg" width="60%" style="float:left;"/>
</br></br></br>
<div class = "container" style="background:white;float:right;width:39%;height:60%">
<h2  style="color:black;font-family:Ravie"><b>L O G I N - A S</b></h2>
<img  class = "icon" src = "images/studenticon.png" width="30%" height="30%" style="background:lightgreen"/></br></br>
<a href="StudentLogin.php" style="color:green;font-family:Ravie;font-size:30px;">Student Login</a>

</br></br></br></br></br>
<img class = "icon" src = "images/lectureicon.png" width="30%" height="30%" style="background:skyblue"/></br></br>
<a href="LectureLogin.php" style="color:blue;font-family:Ravie;font-size:30px;">Lecture Login</a>
</div>

<footer>
<p style="color:white;float:right;opacity:.8">Copyright&copy;Avinash Kulal (2020)</p>
</footer>
</center>
</body>