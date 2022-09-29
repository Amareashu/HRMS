<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>transaction</title>
    <style>
        th {
            font-size: 25px;
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

            <div class="col-lg-9 rounded">

                <?php
                include("..//connection.php");
                ?>
                <div class='alert alert-success'>
                    <h3 class="rounded" style="
                            background-color: rgb(56, 52, 52); 
                            text-align: center; 
                            color: wheat;">
                        Payment Transaction
                    </h3>
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="row bg-light rounded" style="margin-left: 4%; padding-left: 5px; margin-top: 5%;">
                                <div class="col-lg-12" style="margin-top: 5%;">
                                    <div class="co-lg-12" style="text-align: right;">
                                        <div style="margin-right: 10%;">
                                            <?php
                                            if (isset($_GET['page'])) {
                                                $page = $_GET['page'];
                                            } else {
                                                $page = 1;
                                            }
                                            
                                            $status="";
                                            $role = $_SESSION['role'];
                                            $email = $_SESSION['email'];

                                            if ('Tenant' == $role) {
                                                $result = $conn->query("SELECT * FROM `payment` WHERE `tenant_email`='$email' ORDER BY `status_te` limit $page");
                                                $pr_query = "SELECT * FROM `payment` WHERE `tenant_email`='$email'";
                                                if (!$result->num_rows > 0) {
                                                    $status="Not paid History";
                                                }
                                            } 
                                             if ('Owner' == $role) {
                                                
                                                $result = $conn->query("SELECT * FROM `payment` WHERE `owner_email`='$email' ORDER BY `status_ow` limit $page");
                                                $pr_query = "SELECT * FROM `payment` WHERE `owner_email`='$email'";
                                                if (!$result->num_rows > 0) {
                                                    $status="Not paid History";
                                                }
                                            } 
                                             if ('Admin' == $role) {
                                                $result = $conn->query("SELECT * FROM `payment` ORDER BY `date` limit $page");
                                                $pr_query = "SELECT * FROM `payment`";
                                                if (!$result->num_rows > 0) {
                                                    $status="Not paid History";
                                                }
                                            }
                                            if ($conn->query($pr_query)) {
                                               
                                            } else {
                                                print "Error" . $conn->error;
                                            }

                                            $pr_result = $conn->query($pr_query);

                                            $total_record = $pr_result->num_rows;

                                            $total_page = ceil($total_record / 1);

                                            if ($page > 1) {
                                                echo "<a href='http://localhost/hrms/View/transaction.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                            }

                                            for ($i = 1; $i < $total_page; $i++) {
                                                echo "<a href='http://localhost/hrms/View/transaction.php?page=" . $i . "' class='btn  btn-primary'>$i</a>";
                                            }

                                            if ($i > $page) {
                                                echo "<a href='http://localhost/hrms/View/transaction.php?page=" . ($page + 1) . "'class='btn btn-danger'> Next</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if($status == ""){
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            //`id`, `subject`, `message`, `date`, `status`
                                            $id = $row["id"];
                                            $amonut = $row["amonut"];
                                            $owner_email = $row["owner_email"];
                                            $tenant_email = $row["tenant_email"];
                                            $date = $row["date"];
                                        }
                                    } else {
                                        print "Error" . $conn->error;
                                    }
                                }else{
                                    print "<div class='alert alert-danger col-lg-12'>
                                    <strong>Warning!</strong> $status
                                </div>";
                                $amonut=$tenant_email=$owner_email=$date="";
                                }
                                    
                                    ?>
                                    Amount : <?php print $amonut ?>
                                    <hr>
                                    Owner email : <?php print $owner_email?>
                                    <hr>
                                    Tenant email : <?php print $tenant_email?>
                                    <hr>
                                    Payed Date : <?php print $date ?>
                                    <hr>
                                </div>
                            </div>
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