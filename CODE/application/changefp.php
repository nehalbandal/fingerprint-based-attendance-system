<?php  include 'include/Database.php';
session_start();
$tmp=$_GET['tmp'];
$id=$_GET['rid'];
$sql="SELECT id from fp where id='$id'";
$run= mysqli_query($con,$sql);
$check=mysqli_num_rows($run);
if($check>0){
$del= "DELETE FROM fp where id='$id'";
$result= mysqli_query($con,$del);
$query = "INSERT INTO fp (id,template) values ('$id','$tmp')";
$result= mysqli_query($con,$query);
echo "<script>alert('Updated Successfully...');window.location.href = 'admin.php';</script>";
}
else{
	echo "<script>alert('Cannot update.Unregistered Candidate...');window.location.href = 'admin.php';</script>";
}


?>