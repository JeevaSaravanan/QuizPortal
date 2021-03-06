<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.1.6/zepto.min.js">
     <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
    <style>body {
  padding: 0;
  margin: 0;
  height: 100vh;
  background: -webkit-linear-gradient(#fff 0%, #f2f7ff 100%);
  font-family: sans-serif;
  -webkit-font-smoothing: antialiased;
}

h3 {
  position: absolute;
  margin-left: 88px;
  margin-top: 5px;
  font-size: 22px;
  font-weight: 200;
  color: #4f5c76;
}
input {
  width: 250px;
  height: 35px;
  border-radius: 3px;
  border: 1px solid #ccc;
  font-size: 14px;
  padding-left: 10px;
  transition: 0.3s;
}
input::-webkit-input-placeholder {
  font-size: 14px;
}
input:focus {
  border: 1px solid #286efa !important;
  outline-width: 0;
}
button {
  margin-top: 30px;
  width: 262px;
  height: 40px;
  background: #286efa;
  color: #fff;
  font-size: 14px;
  border: 1px solid #286efa;
  border-radius: 3px;
}
button:hover {
  background: #3c82ff;
  cursor: pointer;
}
.form {
  position: relative;
  margin: 0 auto;
  margin-top: 100px;
  width: 400px;
  height: 400px;
  background: #fff;
  box-shadow: 0px 5px 80px 0px #e4e8f0;
  border-radius: 5px;
  overflow: hidden;
}
.form form {
  margin-top: 50px;
  width: 750px;
}
.form form .inputs {
  position: relative;
  left: 65px;
  top: 70px;
  transition: 0.3s;
}
.form form .inputs .email {
  float: left;
  position: relative;
  width: 350px;
}
.form form .inputs .password {
  float: right;
  position: relative;
  width: 350px;
}
section {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

  </style>
  <body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top shadow-sm bg-white"><a href="index.html" class="navbar-brand">Formula</a>
   <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
   <div id="navbarSupportedContent" class="collapse navbar-collapse">
     <ul class="navbar-nav ml-auto">
       <li class="nav-item"><a href="index.html" class="nav-link">Back</a></li>
     </ul>
     <div class="navbar-text ml-lg-3">
       <a href="Signup.html" class="btn btn-primary text-white shadow">Sign Up</a>
     </div>
   </div>
 </nav>
 <section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1">
<div class="form">
  <form action=" " method="POST">
    <h3>Good to See you again</h3>
      <div class="inputs">
      <input class="first" type="text" name="uname" placeholder="Enter Username"/><br>
      <br>
      <input class="second" type="password" name="pswd" placeholder="Enter Password"/><br>
      <br>
      <button class="login" name="log">Log in</button>
      </div>
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



      if(isset($_POST['log'])){
      $sql = "SELECT * FROM register WHERE uname='".$_POST['uname']."' AND psw='".$_POST['pswd']."'";

      	$result = $conn->query($sql);

      if ($result->num_rows > 0 ) {
          $row=$result->fetch_assoc();
           $_SESSION['user']=$row['uname'];
           header("Location: firstpage.html");
      }
      else {
          echo "<div class='alert alert-danger' role='alert'>
                   Enter correct details!!!
               </div>";
      }
    }
      $conn->close();
      ?>

  </form>
</div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
      <lottie-player
          src="https://assets3.lottiefiles.com/packages/lf20_M9wchH.json"  background="rgba(0, 0, 0, 0)"  speed="0.5"  style="width: 100%; height: auto;"    autoplay >
      </lottie-player>
  </div>
    </div>
   </section>
   <div class="py-5 bg-light">
     <div class="container">
       <div class="row">
         <div class="col-lg-4 mb-6 mb-lg-0">
           <h5><i class="fab fa-foursquare"></i> Formula</h5>
           <ul class="contact-info list-unstyled">
             <li><p class="text-dark">formula@gmail.com</p></li>
             <li><p class="text-dark">+91 88384 86989</p></li>
           </ul>
           <p class="text-muted">Enhance Yourself</p>
         </div>
         <div class="col-lg-4 col-md-6">
           <h5>Pages</h5>
           <ul class="links list-unstyled">
             <li> <a href="#" class="text-muted">Gate</a></li>
             <li> <a href="#" class="text-muted">Interview</a></li>
             <li> <a href="#" class="text-muted">Aptitude</a></li>
             <li> <a href="#" class="text-muted">Language</a></li>
           </ul>
         </div>
       </div>
     </div>
   </div>
   <div class="py-3 bg-dark text-white">
     <div class="container">
       <div class="row">
         <div class="col-md-7 text-center text-md-left">
           <p class="mb-md-0">&copy; 2019 Formula. All rights reserved. </p>
         </div>
       </div>
     </div>
   </div>
  </body>
</html>
