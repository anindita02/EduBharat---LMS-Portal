<?php

$db = mysqli_connect("localhost","root","","db1");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>