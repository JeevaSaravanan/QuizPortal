<?php
 session_start();
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
  <title>FirstPage</title>
      <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!--  CSS -->
    <link rel="stylesheet" href="css/firstpagestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome JS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
         <!-- Font Awesome JS -->
           <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
      <style type="text/css">
    	body{
    		cursor: pointer;
    	}
    	section {
           padding-top: 3rem;
           padding-bottom: 3rem;
        }

        form{
        	cursor: pointer;
        }
         .next {
            margin-top: 30px;
            width: 262px;
            height: 40px;
            background: #286efa;
            color: #fff;
            font-size: 14px;
            border: 1px solid #286efa;
            border-radius: 3px;
        }
  		.next:hover {
  			background: #3c82ff;
  			cursor: pointer;
		}

    </style>
</head>
<body>

   <!--Completepage-->
   <div class="wrapper">

    <!-- Sidebar-->
     <nav id="sidebar">
       <div class="sidebar-header">
         <h3><i class="fab fa-foursquare"></i> Formula</h3>
       </div>

       <ul class="list-unstyled components">
         <li>
           <a href="pgmlg.html">
             <i class="fas fa-code"></i>
            Language
           </a>
         </li>
         <li>
           <a href="firstpage.html">
             <i class="fas fa-window-close"></i>
              Exit Test
           </a>
         </li>
       </ul>

     </nav>

     <!--END Sidebar-->

     <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="firstpage.html"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                              <div class="btn-group dropleft">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i> </button>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i>Profile</a>
                                       <div class="dropdown-divider"></div>
                                       <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off"></i>Logout</a>
                                </div>
                              </div>
                           </li>
                        </ul>
                    </div>
                </div>
          </nav>
          <section class="bg-light">
          <?php
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "quiz";
           $conn =  mysqli_connect($servername, $username, $password, $dbname);
           if (mysqli_connect_error()) {
            die("Connection failed: " . mysqli_connect_error());
            }
            //to fetch complete number of rows
            $sql1="SELECT * FROM cquest";
            $res=mysqli_query($conn,$sql1);
            $rownum=mysqli_num_rows($res);
            $que=mysqli_fetch_assoc($res);

            //pagination
            if (isset($_GET['click']) || isset($_POST['start'])) {
							$_SESSION['clicks'] +=1;
							$c = $_SESSION['clicks'];
              if(isset($_GET['ans'])){
                $fetch=$_SESSION["data"];
                $sqls= "SELECT * FROM cquest WHERE question='".$fetch['question']."' AND ccode='".$fetch['ccode']."' ";
                $resul=mysqli_query($conn,$sqls);
                $row=mysqli_fetch_assoc($resul);
                     if($row['ans']== $_GET['ans']){
                       $_SESSION['score']+=1;
                       $score=$_SESSION['score'];
                }
                if($c==$rownum+1){

                  $user=$_SESSION['user'];
                  $sqla="UPDATE register SET cans='".$score."' WHERE uname='".$user."'";
                  $res=mysqli_query($conn,$sqla);
                  $_SESSION['score']=0;
                  $_SESSION['clicks']=0;
                  echo "";

                 }
              }
            }

            else {
						  $_SESSION['clicks'] = 0;
						}?>
            <?php
            if($_SESSION['clicks'] ==0){	?>
            <div class="row">
            <div class="col-md-4 mb-4">
            <div class="card shadow border-0 h-100"><img src="img/c.jpg" class="card-img-top">
            <div class="card-body">
            <form method="post">
            <h5> <p class="text-dark">Instruction</p></h5>
            <p class="text-muted card-text"><i> Each <b>CORRECT ANSWER</b> carries 2marks and no negative marks for <b>WRONG ANSWER</b>.</i></p>
            <button  class="next" name="start">Join Contest</button>
            </form>
            </div>
            </div>
            </div>
          <?php  } ?>

          <form method="GET" action="">

          <?php

           if(isset($c) && $c<=$rownum){

           $sql = "SELECT * FROM cquest WHERE id='".$c."'";
           $result = mysqli_query($conn,$sql);
           $num=mysqli_num_rows($result);
           $row=mysqli_fetch_assoc($result);
           $_SESSION["data"]=$row;
           ?>

              <div class="row">
            	<div class="col-md-6 mb-6">
            	<div class="card shadow border-0 h-100">
              <div class="card-body">
            	<h5 class="dark-text"><?php echo $row['question'];?></h5>
              <?php if ($row['ccode']!=="null") {?>
            	<div class="bg-light">
            	<code class="dark-text"><?php echo $row['ccode'];?></code>
              </div>
              <?php } ?>
              <div class="custom-control custom-radio">
				      <input type="radio" class="custom-control-input" id="defaultGroupExample1"  name="ans" value="<?php echo $row['opt1'];?>" >
				      <label class="custom-control-label" for="defaultGroupExample1"><?php echo $row["opt1"];?> </label></br>
				      </div>
				      <div class="custom-control custom-radio">
				      <input type="radio" class="custom-control-input" id="defaultGroupExample2"  name="ans" value="<?php echo $row['opt2'];?>">
				      <label class="custom-control-label" for="defaultGroupExample2"><?php echo $row["opt2"];?></label></br>
				      </div>
				      <div class="custom-control custom-radio">
				      <input type="radio" class="custom-control-input" id="defaultGroupExample3"  name="ans" value="<?php echo $row['opt3'];?>">
				      <label class="custom-control-label" for=defaultGroupExample3><?php echo $row["opt3"];?></label></br>
				      </div>
				      <div class="custom-control custom-radio">
				      <input  type="radio" class="custom-control-input" id="defaultGroupExample4" name="ans" value="<?php echo $row['opt4'];?>">
				      <label class="custom-control-label" for="defaultGroupExample4"><?php echo $row["opt4"]?></label></br>
				      </div>
              <?php if ($c<$rownum) {?>
              <button name="click" class="next">NEXT</button>
              <?php }?>
            <?php if ($c==$rownum){?>
            	<button name="click" class="next" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Submit  </button>
          <!---    <button name="click" class="next" data-target="#myModal"> SUBMIT</button>---->
             <?php } ?>

              </div>
              </div>
				      </div>
				      </div>
              <?php } ?>
              </form>

            </section>

        </div>
    </div>
    <div class='modal' id='myModal'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <center><h5 class=text-dark>Congratulations! You have completed. You're score
<?php echo($score) ?>
          </h5></center>

      <lottie-player
        src='https://assets8.lottiefiles.com/packages/lf20_fnjH1K.json' background='transparent' speed='0.5'  style='width: 100%; height: auto;' loop   autoplay >
      </lottie-player>
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

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
function myFunction() {
  alert("<?php echo "$c" ?>");
}

    </script>
</body>
</html>
