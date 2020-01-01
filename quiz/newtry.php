<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
</head>
<body>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    congrats
  </button>
  <div class='modal' id='myModal'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <center><h5 class=text-dark>Congratulations! You have completed.</h5></center>

      <lottie-player
        src='https://assets8.lottiefiles.com/packages/lf20_fnjH1K.json' background='transparent' speed='0.5'  style='width: 100%; height: auto;' loop   autoplay >
      </lottie-player>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
