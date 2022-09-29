<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>report</title>
    <style>
        th {
            font-size: 25px;
        }
    </style>
    <script>
        function printDiv() {
            var divContents = document.getElementById("print_area").innerHTML;
            var a = window.open('', '', 'height=600, width=800');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
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

            <div class="col-lg-9 rounded">

                <?php
                include("..//connection.php");

                $result_ouner = $conn->query("SELECT * FROM `account` WHERE `role`='Owner'");
                $ouner =  $result_ouner->num_rows;

                $result_user = $conn->query("SELECT * FROM `account` WHERE `role`='Tenant'");
                $custmer =  $result_user->num_rows;

                $result_house = $conn->query("SELECT * FROM `House`");
                $houes =  $result_house->num_rows;

                $result_free_house = $conn->query("SELECT * FROM `House` WHERE `status`='free'");
                $free_houes =  $result_free_house->num_rows;

                $result_rerve_house = $conn->query("SELECT * FROM `House` WHERE `status`='Reserved'");
                $rerve_houes =  $result_rerve_house->num_rows;

                ?>
                <div class='alert alert-success' id="print_area">
                    <h3 class="rounded" style="
                            background-color: rgb(56, 52, 52); 
                            text-align: center; 
                            color: wheat;">
                        Report
                    </h3>
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="row bg-light rounded" style="margin-left: 4%; padding-left: 5px; margin-top: 5%;">
                                <div class="col-lg-6" style="margin-top: 5%;">
                                    House <br> <?php print $houes ?>
                                    <hr>
                                    Free <?php print $free_houes ?>
                                    Reserved <?php print $rerve_houes ?>
                                </div>
                                <div class="col-lg-6" style="text-align: right; padding-left: 2px; margin-top: 5%; margin-bottom: 5%;">
                                    <img src="../images/h.png" style="width: 80%;" alt="nott" style="border-radius: 10%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row bg-light rounded" style="margin-left: 4%; padding-left: 5px; margin-top: 5%;">
                                <div class="col-lg-6" style="margin-top: 5%;">
                                    Owner <br> <?php print $ouner ?>
                                    <hr>
                                </div>
                                <div class="col-lg-6" style="text-align: right; padding-left: 2px; margin-top: 5%; margin-bottom: 5%;">
                                    <img src="../images/u.jpg" style="width: 80%;" alt="nott" style="border-radius: 10%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row bg-light rounded" style="margin-left: 4%; padding-left: 5px; margin-top: 5%;">
                                <div class="col-lg-6" style="margin-top: 5%;">
                                    Tenant <br> <?php print $custmer ?>
                                    <hr>
                                </div>
                                <div class="col-lg-6" style="text-align: right; padding-left: 2px; margin-top: 5%; margin-bottom: 5%;">
                                    <img src="../images/c.jpg" style="width: 80%;" alt="nott" style="border-radius: 10%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="bg-primary rounded" value="print" onclick="printDiv()">print</button>
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