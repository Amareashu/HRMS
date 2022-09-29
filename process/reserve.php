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

                // print $_GET['h_id'];
                // print $_GET['page'];
                // $h_id = $_GET['h_id'];
                // $page = $_GET['page'];
                // if ($conn->query("UPDATE House SET `status` ='Panding' WHERE `id`= '$h_id'")) {
                //     $info =
                //         "<div class='alert alert-success'>
                //             <strong>Success!</strong> Your are successful registred. 
                //         </div>";
                // }
                //header("Location:http://localhost/hrms/View/house_list.php?info=$info&page=$page");

                include("../connection.php");
                $li = 1;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                ?>
                <div class='alert alert-success'>
                    <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;">
                        House Detail</h3>
                    <div class="row">
                        <div class="co-lg-12" style="text-align: right;">
                            <div style="margin-right: 10%;">

                                <?php
                                if (isset($_GET['mss'])) {
                                    if ($_GET['mss'] == 'Success') {
                                        print "<div class='alert alert-success col-lg-12' style='text-align: left;'>
                                        <strong>Successful!</strong> Reserved
                                        </div>";
                                    } else {
                                        print "<div class='alert alert-danger col-lg-12' style='text-align: left;'>
                                        <strong>Warning!</strong>  Already Reserved!!
                                        </div>";
                                    }
                                }
                                if (isset($_GET['h_detail'])) {
                                    echo "<a href='http://localhost/hrms/View/my_request.php' class='btn btn-info'>Back</a>";

                                    $result = $conn->query("SELECT * FROM `House` WHERE `ID`='$_GET[h_id]'");
                                } else {
                                    $result = $conn->query("SELECT * FROM `House` limit $page");
                                    $pr_query = "SELECT * FROM `House`";

                                    $pr_result = $conn->query($pr_query);

                                    $total_record = $pr_result->num_rows;

                                    $total_page = ceil($total_record / 1);

                                    if ($page > 1) {
                                        echo "<a href='http://localhost/hrms/Process/reserve.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/hrms/Process/reserve.php?page=" . $i . "' class='btn  btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/hrms/Process/reserve.php?page=" . ($page + 1) . "'class='btn btn-danger'> Next</a>";
                                    }
                                }

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row["id"];
                                        $hous_name = $row["hous_name"];
                                        $no_room = $row["no_room"];
                                        $category = $row["category"];
                                        $mobile = $row["mobile"];
                                        $image = $row["image"];
                                        $email = $row["email"];
                                        $address = $row["address"];
                                        $price = $row["price"];
                                        $status = $row["status"];
                                        $description = $row["description"];
                                        $li++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-5" style="margin-left: 5%;">
                            <table>
                                <tr>
                                    <td>
                                        <p><strong>Houes Name : </strong>
                                    </td>
                                    <td><?php print $hous_name ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Number of Room : &nbsp; &nbsp; </strong>
                                    </td>
                                    <td> <?php print $no_room ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Category : </strong>
                                    </td>
                                    <td><?php print $category ?></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p><strong>Price :</strong>
                                    </td>
                                    <td><?php print $price ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Adress :</strong>
                                    </td>
                                    <td><?php print $address ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Moble : </strong>
                                    </td>
                                    <td><?php print $mobile ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Emial : </strong>
                                    </td>
                                    <td><?php print $email ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Description :</strong>
                                    </td>
                                    <td><?php print $description ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Status : </strong>
                                    </td>
                                    <td><?php print $status ?></p>
                                    </td>
                                </tr>
                            </table>
                            </p>

                        </div>
                        <div class="col-lg-5" style="text-align: right;">
                            <p style="margin-right: 80%;"><strong>Image : </strong> </p>
                            <hr>
                            <img src="../images/<?php print $image ?>" style="width: 100%;" alt="not found">
                            <hr>
                            <?php
                            if (isset($_GET['h_detail'])) {
                                echo "<a href='http://localhost/hrms/View/my_request.php' class='btn btn-info'>Back</a>";
                            } else {

                                if ($status == "Free" || $status == "free") {
                                    $tenant_email = $_SESSION['email'];
                            ?>

                                    <a href='http://localhost/hrms/Process/house_reserve.php?h_id=<?php print $id ?>&page=<?php print $page ?>&tenant_email=<?php print $tenant_email ?>'>
                                        <button class='btn-success rounded'>Reserve</button>
                                    </a>
                            <?php
                                }
                            }
                            ?>
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