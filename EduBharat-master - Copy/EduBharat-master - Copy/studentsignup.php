<?php 

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$class=$_POST['class'];
$phno=$_POST['phno'];
$course=$_POST['course'];
$emailadd=$_POST['emailadd'];
$pass=$_POST['pass'];
if(empty($firstName)||empty($lastName)||empty($age)||empty($gender)||empty($class)||empty($phno)||empty($emailadd)||empty($pass)||empty($course)){
	die('Please fill all required fields!');
}

$conn=new mysqli("localhost","root","","db1");
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}
else{
	$stml=$conn->prepare("insert into studentreg(firstName, lastName, age, gender, class, phoneNo, course, emailadd, password)
		values(?, ?, ?, ?, ?, ?, ?,?,?)");
	$stml->bind_param("ssisissss",$firstName, $lastName, $age, $gender, $class, $phno, $course, $emailadd, $pass);
	$stml->execute();
	echo "<script> alert('Registration Successfull')
		       window.location='login.html';</script>";

	$stml->close();
	$conn->close();
}
?>