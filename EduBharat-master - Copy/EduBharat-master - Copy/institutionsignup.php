<?php 

$insname=$_POST['insname'];
$zcode=$_POST['zipcode'];
$phno=$_POST['insphone'];
$ad=$_POST['ad'];
$how=$_POST['how'];
if(empty($insname)||empty($zcode)||empty($phno)||empty($ad)||empty($how)){
	die('Please fill all required fields!');
}

$conn=new mysqli('localhost','root','','db1');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}
else{
	$stml1=$conn->prepare("insert into institutionreg( Name, ZipCode, PhoneNo, Address, Contribution) values( ?, ?, ?, ?, ?)");
	$stml1->bind_param("sisss", $insname, $zcode, $phno, $ad, $how);
	$stml1->execute();
	echo "<script> alert('registration succesful')
	window.location='eduBharat.html';</script>";
	$stml1->close();
	$conn->close();
}
?>