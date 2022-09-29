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
                    View request</h3>
                <hr>
                <?php
                include("../connection.php");

                if (isset($_GET['ms'])) {
                    print "<div class='alert alert-success col-lg-12' style='text-align: left;'>
                        <strong>Successful!</strong> Approved
                        </div>";
                }


                $li = 1;

                if (isset($_GET['info'])) {
                    $info = $_GET['info'];
                } else {
                    $info = "";
                }

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $num_per_page = 3;
                $start_from = ($page - 1) * 3;

                $owner_email = $_SESSION['email'];

                echo "<table class='table align-middle'>
                <tr>
                    <th style='font-size: 17px;'>#</th> 
                    <th style='font-size: 17px;'>Houes Name</th> 

                    <th style='font-size: 17px;'>Full Name</th>            
                    <th style='font-size: 17px;'>Phone</th>                       
                    <th style='font-size: 17px;'>Address</th>   

                    <th style='font-size: 17px;'>Action</th>                    
                </tr>";

                $result = $conn->query("SELECT * FROM `House` WHERE email='$owner_email' limit $start_from,$num_per_page");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $id = $row["id"];
                        
                        $result2 = $conn->query("SELECT * FROM `tenant_requeset` WHERE house_id='$id'");
                        if ($result2->num_rows > 0) {
                            while ($row_2 = $result2->fetch_assoc()) {
                                $tenant_emial = $row_2["tenant_emial"];

                                $result3 = $conn->query("SELECT * FROM `account` WHERE email='$tenant_emial'");
                                if ($result3->num_rows > 0) {
                                    while ($row_3 = $result3->fetch_assoc()) {

                                        $t_id = $row_3["id"];
                                        $email = $row_3["email"];

                                        echo "<tr>
                                        <td>$li</td> 
                                        <td>" . $row["hous_name"] . "</td> 

                                        <td>" . $row_3["full_name"] . "</td>
                                        <td>" . $row_3["phone"] . "</td>
                                        <td> " . $row_3["address"] . " </td>    

                                        <td>
                                        <a href='http://localhost/hrms/Process/approve.php?h_id=$id&email=$email'>
                                        <button class='btn-success rounded'>Aprove</button>
                                    </a> 
                                        <a href='http://localhost/hrms/view/user_detail.php?u_id=$t_id&r_detail=Tenant'>
                                                    <button class='btn-info rounded'>View</button>
                                        </a> 
                                        <a href='http://localhost/hrms/Process/cancel_reseve_ou.php?h_id=$id&email=$email'>
                                        <button class='btn-danger rounded'>Reject</button></a> 
                                        </td>";


                                        echo   "</tr>";
                                        $li++;
                                    }
                                }
                            }
                        }
                    }
                  
                    echo   "<tr> <td colspan='6' style='text-align: center'>";
                $pr_query = "SELECT * FROM `tenant_requeset`";

                $pr_result = $conn->query($pr_query);

                $total_record = $pr_result->num_rows;

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='http://localhost/hrms/View/View_request.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                }

                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='http://localhost/hrms/View/View_request.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='http://localhost/hrms/View/View_request.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
                }
                echo "</td> </tr> </table>";
            } else {
                 print "<div class='alert alert-danger col-lg-12'>
                <strong>Warning!</strong> Not Request
            </div>";
                echo "</td> </tr> </table>";
            }
                ?>
            </div>

        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>