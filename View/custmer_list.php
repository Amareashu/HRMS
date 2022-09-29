<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Staff List</title>
    <style>
        table {
            font-family: 'times new roman';
        }

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

            <div class="col-lg-9 bg-light rounded">
                <hr>
                <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
                    Tenant List</h3>
                <hr>
                <?php
                include("../connection.php");
                $li = 1;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $num_per_page = 5;
                $start_from = ($page - 1) * 5;

                $result = $conn->query("SELECT * FROM `account` WHERE `role`='Tenant' limit $start_from,$num_per_page");

                ?>
                <div class="co-lg-12" style="text-align: right;">
                    <div style="margin-right: 10%;">

                        <?php
                        $pr_query = "SELECT * FROM `account` WHERE `role`='Tenant'";

                        $pr_result = $conn->query($pr_query);

                        $total_record = $pr_result->num_rows;

                        $total_page = ceil($total_record / $num_per_page);

                        if ($page > 1) {
                            echo "<a href='http://localhost/hrms/View/custmer_list.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                        }

                        for ($i = 1; $i < $total_page; $i++) {
                            echo "<a href='http://localhost/hrms/View/custmer_list.php?page=" . $i . "' class='btn  btn-primary'>$i</a>";
                        }

                        if ($i > $page) {
                            echo "<a href='http://localhost/hrms/View/custmer_list.php?page=" . ($page + 1) . "'class='btn btn-danger'> Next</a>";
                        }
                        ?>
                    </div>
                </div>
                <?php

                if ($result->num_rows > 0) {

                    echo "<table class='table align-middle'>
                                <tr>
                                    <th style='font-size: 17px;'>#</th> 
                                    <th style='font-size: 17px;'>Full Name</th> 
                                    <th style='font-size: 17px;'>Email</th>               
                                    <th style='font-size: 17px;'>Phone</th>              
                                    <th style='font-size: 17px;'>Emergency Phone</th>              
                                    <th style='font-size: 17px;'>Address</th>           
                                    <th style='font-size: 17px;'>Action</th>                    
                                </tr>";
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $role = "Custmer";
                        echo "
                  <tr>
                    <td>$li</td> 
                    <td>" . $row["full_name"] . "</td> 
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td> " . $row["e_phone"] . " </td>                            
                    <td> " . $row["address"] . " </td>                           
                    <td>  <a href='http://localhost/hrms/view/user_detail.php?u_id=$id&role=$role'>
                            <button class='btn-info rounded'>View</button>
                             </a> 
                    </td>
                    </tr>";
                        $li++;
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>

        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>