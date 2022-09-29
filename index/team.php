<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Developer</title>

  <link rel="stylesheet" href="../style/css/bootstrap.min.css">
  <script type="text/javascript" src="../style/JS/jquery-1.4.2.min.js"></script>
  <link rel="stylesheet" href="../style/css/style.css">
  <script type="text/javascript" src="../style/JS/jquery.validate.js"></script>
  <style>
    #index h3 {
      font-family: 'Times New Roman';
      font-weight: bold;
      font-size: 140%;
      background-color: rgb(56, 52, 52);
    }

    p {
      font-family: 'Times New Roman', Times, serif;
      font-size: 125%;
      color: black;
      margin-left: 3%;
    }

    p {
      margin-left: 4%;
    }

    h4 {
      margin-left: 3%;
      margin-top: 2%;
    }

    .clearfix {
      overflow: auto;
      padding: 5px;
      margin: 1%;
      color: black;
      font-family: 'Times New Roman', Times, serif;
      font-size: 120%;
    }

    #img2 {
      float: left;
      width: 100%;
      margin-bottom: 4%;
    }
  </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
  <?php
  include("../menu.php");
  ?>

  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">

    <?php
      include("..//r_side_menu.php");
      ?>
      <div class="col-lg-9 rounded  bg-light body1">

        <div id="about" class="rounded" style="margin-top: 2%;">

          <h3 class="text-center rounded">Developer </h3>
          <h4 style="
          color: black; 
          font-size: 100%; 
          font-weight: bold; 
          font-family: 'Times New roman'; text-align: center;">
            The Syetm is Produced by Information Technology Under Graduated Student 2014
            <hr style="width: 97%; font-weight: bold;">
          </h4>

          <div class="row clearfix">
            <div class="col-lg-4"><img class="img2" height="300px" src="http://localhost/hrms/images/u1.jfif">
              <br>
              <b> Name :</b> Dessalegn Dereje <br> <b> ID :</b> BDU1105849 <br> <b>Tell :</b> 0930771467 <br> <b>Email :</b> dasaledaraje2011@gmail.com
              <hr>
            </div>

            <div class="col-lg-4"><img class="img2" height="300px" src="http://localhost/hrms/images/u2.jfif">
              <br>
              <b> Name :</b> Dejene Diriba <br> <b> ID :</b> BDU1105842 <br> <b>Tell :</b> 0919104499 <br> <b>Email :</b>dejenediriba@gmail.com
              <hr>
            </div>
            <div class="col-lg-4"><img class="img2" height="300px" src="http://localhost/hrms/images/u3.jfif">
              <br>
              <b> Name :</b> Kebeba WORKU <br> <b> ID :</b> BDU1106824 <br> <b>Tell :</b> 0925241343 <br> <b>Email : </b>kabbe@gmail.com
              <hr>
            </div>

          </div>

        </div>

    </div>
  </div>
  </div>

  <?php include("../footer.php"); ?>
  <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>