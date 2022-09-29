<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title> List</title>
    <style>
        table {
            font-family: 'times new roman';
        }

        th {
            font-size: 25px;
        }
    </style>
</head>

<?php
 include("..//connection.php");
include("..//login_check.php");
 ?>

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
                    Free House List's</h3>
                <hr>
                <a>

                    <form class="form-inline" action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="house_search" class="rounded" style='width: 90%;' >
                            <div class="input-group-append">
                                <button class="btn btn-success" name="btn_search" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </a>
                <hr>

                <?php
                include("../connection.php");
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

                $result1 = $conn->query("SELECT * FROM `House` limit $start_from,$num_per_page");

                if (isset($_POST['btn_search'])) {
                    $sr = $_POST['house_search'];
                    $sql_sr="SELECT * FROM `House` WHERE `category`='$sr' or `category`Like '$sr%' limit $start_from,$num_per_page";
                    if($conn->query($sql_sr)){
                        $result = $conn->query($sql_sr); 

                    }else{
                        print $conn->error;
                    }
                } else {
                    $result = $result1;
                }

                if ($result->num_rows > 0) {

                    echo "<table class='table align-middle'>
                <tr>
                    <th style='font-size: 17px;'>#</th> 
                    <th style='font-size: 17px;'>Houes Name</th> 
                    <th style='font-size: 17px;'>Number of Room</th>  
                    <th style='font-size: 17px;'>Category</th>              
                    <th style='font-size: 17px;'>Mobile</th>              
                    <th style='font-size: 17px;'>Image</th>         
                    <th style='font-size: 17px;'>Status</th>         
                    <th style='font-size: 17px;'>Action</th>                    
                </tr>";
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        echo "
                  <tr>
                    <td>$li</td> 
                    <td>" . $row["hous_name"] . "</td> 
                    <td>" . $row["no_room"] . "</td>
                    <td>" . $row["category"] . "</td>
                    <td> " . $row["mobile"] . " </td>";
                ?>
                        <td> <img src='http://localhost/hrms/images/<?php print $row['image'] ?>' style='width: 100px; border-radius: 10%;'> </td>

                <?php
                        echo "<td> " . $row["status"] . " </td>                           
                    <td><a href='http://localhost/hrms/Process/reserve.php?h_id=$id&page=$page'>
                        <button class='btn-success rounded'>View Detail</button>
                        </a> </td>";


                        echo   "</tr>";
                        $li++;
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                if (isset($_POST['btn_search'])) {
                    $sr = $_POST['house_search'];
                    $pr_query="SELECT * FROM `House` WHERE `category`='$sr' or `category`Like '$sr%'";
                    
                } else {
                    $pr_query = "SELECT * FROM `House`";
                }


                $pr_result = $conn->query($pr_query);

                $total_record = $pr_result->num_rows;

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='http://localhost/hrms/View/house_list.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                }

                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='http://localhost/hrms/View/house_list.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='http://localhost/hrms/View/house_list.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
                }

                ?>
            </div>

        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>