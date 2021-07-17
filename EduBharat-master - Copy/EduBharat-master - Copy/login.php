<?php
$a=$_REQUEST["emailadd"];
$b=$_REQUEST["password"];
$c=$_REQUEST["role"];
$connection=mysqli_connect("localhost","root","") or die ("could'nt select server");
$db=mysqli_select_db($connection,"db1") or die ("could'nt select database");
$query="select emailadd,password from teacherreg where (emailadd='$a' and password='$b')";
switch($c)
    {
      case "teacher": $query="select firstName,emailadd,password from teacherreg where (emailadd='$a')";break;
      case "student": $query="select firstName,emailadd,password from studentreg where (emailadd='$a')";break;
      default: echo("error"); exit(); break;
    }
$result=mysqli_query($connection,$query) or die("Query failed");
$row=mysqli_fetch_array($result);
$d=$row['firstName'];
if(($row['emailadd']==$a) AND ($row['password']==$b))
{header("Location: dashboard.html"); exit;
 }
else
{echo "<script>alert('try again')
window.location='login.html';</script>";   
}                                                                                     
mysqli_close($connection);
?>