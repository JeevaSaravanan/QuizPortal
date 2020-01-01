<?php
$servername="localhost";
$username="root";
$password="";
$dbname="quiz";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

$sql="INSERT INTO register (uname,email,psw) VALUES ('".$_POST["uname"]."','".$_POST["email"]."','".$_POST["psw"]."')";

if($conn->query($sql)==TRUE){
	header("Location:firstpage.html");
}
else{
	echo "<script type='text/javascript'>alert('Try Again!!');</script>";
}
$conn->close();
?>