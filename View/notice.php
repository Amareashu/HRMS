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
                $date=$subject= $message =$sender ="No message";
                ?>
                <div class='alert alert-success'>
                    <h3 class="rounded" style="
                            background-color: rgb(56, 52, 52); 
                            text-align: center; 
                            color: wheat;">
                        Notice
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
                                            $result = $conn->query("SELECT * FROM `notic` ORDER BY `notic`.`id` DESC limit $page");

                                            $pr_query = "SELECT * FROM `notic`";

                                            $pr_result = $conn->query($pr_query);

                                            $total_record = $pr_result->num_rows;

                                            $total_page = ceil($total_record / 1);

                                            if ($page > 1) {
                                                echo "<a href='http://localhost/hrms/View/notice.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                            }

                                            for ($i = 1; $i < $total_page; $i++) {
                                                echo "<a href='http://localhost/hrms/View/notice.php?page=" . $i . "' class='btn  btn-primary'>$i</a>";
                                            }

                                            if ($i > $page) {
                                                echo "<a href='http://localhost/hrms/View/notice.php?page=" . ($page + 1) . "'class='btn btn-danger'> Next</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            //`id`, `subject`, `message`, `date`, `status`
                                            $id = $row["id"];
                                            $sender = $row["sender"];
                                            $subject = $row["subject"];
                                            $message = $row["message"];
                                            $date = $row["date"];
                                        }
                                    }
                                    ?>
                                    Sender: <?php print $sender ?>
                                    <hr>
                                    Posted Date : <?php print $date ?>
                                    <hr>
                                    Subject : <?php print $subject ?>
                                    <hr>
                                    Body <br><?php print $message ?>

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