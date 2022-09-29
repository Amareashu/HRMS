<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/style.css">
    <script type="text/javascript" src="style/JS/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="style/css/icon.css">
    <link rel="stylesheet" href="style/style_img.css">

    <title>index </title>

    <style>
        .div2 {
            border: 1px solid black;
            height: 100%;
            background: url(images/bg-1.jpg);
            background-size: cover;
        }

        #index h2 {
            font-family: 'Times New Roman';
            font-weight: bold;
            margin-left: 3%;
            color: white;
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

        table {
            font-family: 'times new roman';
            margin-left: 2%;
            margin-right: 2%;
            width: 96%;
        }
    </style>
</head>
<?php
include("menu.php");
?>

<body style="background: rgb(153, 149, 149);" id="body">

    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
                <div class="div2 row col-lg-12 rounded  rounded bg-secondary">
                    <div class="slider">
                        <div class="slides">
                            <!--radio buttons start-->
                            <input type="radio" name="radio-btn" id="radio1">
                            <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                            <input type="radio" name="radio-btn" id="radio4">
                            <!--radio buttons end-->
                            <!--slide images start-->
                            <div class="slide first">
                                <img src="http://localhost/hrms/images/1.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="http://localhost/hrms/images/2.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="http://localhost/hrms/images/3.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="http://localhost/hrms/images/4.jpg" alt="">
                            </div>
                            <!--slide images end-->
                            <!--automatic navigation start-->
                            <div class="navigation-auto" style="padding-left: 25%;">
                                <div class="auto-btn1"></div>
                                <div class="auto-btn2"></div>
                                <div class="auto-btn3"></div>
                                <div class="auto-btn4"></div>
                            </div>
                            <!--automatic navigation end-->
                        </div>
                        <!--manual navigation start-->
                        <div class="navigation-manual" style="padding-left: 25%;">
                            <label for="radio1" class="manual-btn"></label>
                            <label for="radio2" class="manual-btn"></label>
                            <label for="radio3" class="manual-btn"></label>
                            <label for="radio4" class="manual-btn"></label>
                        </div>
                        <!--manual navigation end-->
                    </div>
                </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 2000);
    </script>
    <?php include("footer.php") ?>

    <script src="style/js/bootstrap.bundle.min.js"></script>
    <script src="style/js/bootstrap.bundle.min.js"></script>

</body>

</html>