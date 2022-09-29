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

            <div class="col-lg-9 bg-light rounded">

                <?php
                include("..//connection.php");

                $li = 1;

                if (isset($_GET['role'])) {
                    $role = $_GET['role'];
                }

                if (isset($_GET['u_id'])) {
                    $u_id = $_GET['u_id'];
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $result = $conn->query("SELECT * FROM `account` WHERE `email`='$u_id' limit $page");
                } else {
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $result = $conn->query("SELECT * FROM `account` WHERE `role`='$role' limit $page");
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["email"];

                        $id_number = $row["id_number"];
                        $full_name = $row["full_name"];
                        $mobile = $row["phone"];
                        $e_mobile = $row["e_phone"];
                        $image = $row["image"];
                        $email = $row["email"];
                        $address = $row["address"];
                        $mrtial_s = $row["mrtial_s"];

                        $li++;
                    }
                }
                ?>
                <hr>
                <div class='alert alert-success'>
                    <h3 class="rounded" style="
                                background-color: rgb(56, 52, 52); 
                                text-align: center; 
                                color: wheat;">
                        Detail Information</h3>
                    <div class="row">
                        <div class="co-lg-12" style="text-align: right;">
                            <div style="margin-right: 10%;">

                                <?php
                                if (isset($_GET['r_detail'])) {
                                    echo "<a href='http://localhost/hrms/View/View_request.php' class='btn btn-info'>Back</a>";
                                } else {
                                    $pr_query = "SELECT * FROM `account` WHERE `role`='$role'";

                                    $pr_result = $conn->query($pr_query);

                                    $total_record = $pr_result->num_rows;

                                    $total_page = ceil($total_record / 1);

                                    if ($page > 1) {
                                        echo "<a href='http://localhost/hrms/view/user_detail.php?role=$role&page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/hrms/view/user_detail.php?role=$role&page=" . $i . "' class='btn  btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/hrms/view/user_detail.php?role=$role&page=" . ($page + 1) . "'class='btn btn-danger'> Next</a>";
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
                                        <p><strong>Full Name : </strong>
                                    </td>
                                    <td><?php print $full_name ?></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p><strong>Marital Status : </strong>
                                    </td>
                                    <td><?php print $mrtial_s ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>ID Number : </strong>
                                    </td>
                                    <td><?php print $id_number ?></p>
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
                                        <p><strong>Emergency Moble : </strong>
                                    </td>
                                    <td><?php print $e_mobile ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Emial : </strong>
                                    </td>
                                    <td><?php print $email ?></p>
                                    </td>
                                </tr>
                            </table>
                            </p>

                        </div>
                        <div class="col-lg-5" style="text-align: right;">
                            <p style="margin-right: 80%;"><strong>Image : </strong> </p>
                            <hr>
                            <img src="../images/<?php print $image ?>" style="width: 80%;" alt="not found">
                            <hr>
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