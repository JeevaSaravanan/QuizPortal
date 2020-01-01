<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="quiz";

session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM register WHERE uname='".$_POST['uname']."' AND psw='".$_POST['pswd']."'";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row=$result->fetch_assoc();
     $_SESSION['user']=$row['uname'];
     header("Location: firstpage.html");
}
else {
    echo "<div class='alert alert-danger' role='alert'>
          A simple danger alert—check it out!
         </div>";
}
$conn->close();
?>
