<?php 

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$age=$_POST['age'];
$gender=$_POST['gen'];
$qual=$_POST['qual'];
$phno=$_POST['phno'];
$course=$_POST['course'];
$pte=$_POST['pte'];
$emailadd=$_POST['emailadd'];
$pass=$_POST['pass'];
if(empty($firstName)||empty($lastName)||empty($age)||empty($qual)||empty($phno)||empty($emailadd)||empty($pass)){
	die('Please fill all required fields!');
}

$conn=new mysqli('localhost','root','','db1');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}
else{
	$stml=$conn->prepare("insert into teacherreg(firstName,lastName,age,gender,qualification,phoneNo,course,past_experience,emailadd,password)
		values(?,?,?,?,?,?,?,?,?,?)");
	$stml->bind_param("ssisssssss",$firstName, $lastName, $age, $gender, $qual, $phno, $course, $pte, $emailadd, $pass);
	$stml->execute();
	echo "<script> alert('Registration Successfull')
		      window.location='login.html'; </script>";
	$stml->close();
	$conn->close();
}
?>