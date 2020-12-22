<?php 
include("connection.php");
$SQ = mysqli_query($conn,"select cocubesid from student where email = '$_SESSION[email]' ");
$result = mysqli_fetch_array($SQ);
$SQ2 =mysqli_query($conn,"insert into applied values('$_GET[cnumber]','$result[cocubesid]' ) ");
echo "<script>alert('Applied for Company Successfully')</script>";
 echo "<script> window.location = 'viewcompany.php?cnumber=$_GET[cnumber]'</script>";
?>