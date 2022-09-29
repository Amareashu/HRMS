
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>notice</title>
    <style>
        table {
            font-family: 'times new roman';
        }
    </style>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            ?>
            <div class="col-lg-9 rounded  bg-light body1">
                <hr>
                <div class='alert alert-success'>

                    <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
                        Find Your Location</h3>
                    <hr>
                    <?php
                    include("../connection.php");
                    ?>
                    <div class="col-lg-12 rounded ">
                        <br>
                      
                        <div>
                            <iframe width="95%" height="300" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp=11.601290260299606~37.393598556518555&lvl=14&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
                            </iframe>
                            <div style="white-space: nowrap; text-align: center; width: 100%;">
                                <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=11.601290260299606~37.393598556518555&amp;sty=r&amp;lvl=14&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
                                <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=11.601290260299606~37.393598556518555&amp;sty=r&amp;lvl=14&amp;rtp=~pos.11.601290260299606_37.393598556518555____&amp;FORM=MBEDLD">Get Directions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="..//style/js/bootstrap.bundle.min.js"></script>
        <?php include("..//footer.php"); ?>
</body>

</html>