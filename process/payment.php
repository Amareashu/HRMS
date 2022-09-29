<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>payment</title>
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
    $recharg="";
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
                $hous_name=$price=$owner_phone= "";
                ?>
                <div class='alert alert-success'>
                    <h3 class="rounded" style="
                            background-color: rgb(56, 52, 52); 
                            text-align: center; 
                            color: wheat;">
                        Make Payment
                    </h3>
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="row bg-light rounded" style="margin-left: 4%; padding-left: 5px; margin-top: 5%;">
                                <div class="col-lg-12" style="margin-top: 5%;">
                                    <div class="co-lg-12" style="text-align: left;">
                                        <div style="margin-right: 10%;">

                                            <?php
                                            $te_info = $ow_info = $info = "";
                                            $email = $_SESSION["email"];

                                            if(isset($_POST['Recharge'])){
                                                $amount=$_POST['amount'];
                                                $qp=("UPDATE `tele-birr-wallet` SET  `amount`= `amount`+'$amount'
                                                WHERE `owner` = '$email'");
                                                if ($conn->query($qp)) {
                                                        $info =
                                                            "<div class='alert alert-success'>
                                                            <strong>Success!</strong> Successfuly Recharged. 
                                                        </div>";
                                                        //$recharg = "";
                                                    } 
                                                    else{
                                                        $info=$conn->error;
                                                    }
                                                    
                                            }

                                            $result_ch = $conn->query("SELECT * FROM `tele-birr-wallet` WHERE `owner`='$email'");
                                            while ($row = $result_ch->fetch_assoc()) {
                                                $tenant_phone = $row['phone'];                                               
                                            }

                                            $result_h = "SELECT * FROM `tenant_requeset` WHERE `tenant_emial`='$email'";
                                            $r = $conn->query($result_h);
                                            if ($r->num_rows > 0) {
                                                while ($row_h = $r->fetch_assoc()) {
                                                    $house_id = $row_h['house_id'];
                                                    $amount = $row['amount'];
                                                    $result_h2 = $conn->query("SELECT * FROM `house` WHERE `id`='$house_id'");

                                                    while ($row_h2 = $result_h2->fetch_assoc()) {

                                                        $hous_name = $row_h2['hous_name'];
                                                        $hous_owner_email = $row_h2['email'];
                                                        $hous_owner_phone = $row_h2['mobile'];
                                                        $price = $row_h2['price'];

                                                        $result_owner_ph = $conn->query("SELECT * FROM `tele-birr-wallet` WHERE `owner`='$hous_owner_email'");
                                                        while ($row_ow = $result_owner_ph->fetch_assoc()) {
                                                            $owner_phone = $row_ow['phone'];
                                                        }
                                                    }
                                                }
                                            }

                                            if (isset($_POST['done'])) {
                                                $owner_phone = $_POST['owner_phone'];
                                                $tenant_phone = $_POST['tenant_phone'];

                                                $result_ow = $conn->query("SELECT * FROM `tele-birr-wallet` WHERE `phone`='$owner_phone'");
                                                $result_ten = $conn->query("SELECT * FROM `tele-birr-wallet` WHERE `phone`='$tenant_phone'");
                                                if (!$result_ow->num_rows > 0) {
                                                    $ow_info = "<b style='color: red'>Warning! Not Found!!</b>";
                                                } else {
                                                    while ($row_result_ow = $result_ow->fetch_assoc()) {
                                                        $total_amount_own = $row_result_ow['amount'];
                                                    }
                                                }

                                                if (!$result_ten->num_rows > 0) {
                                                    $ten_info = "<b style='color: red'>Warning! Not Found!!</b>";
                                                } else {
                                                    while ($row_result_ten = $result_ten->fetch_assoc()) {
                                                        $total_amount_ten = $row_result_ten['amount'];
                                                    }
                                                }

                                                
                                                if($total_amount_ten<$price){
                                                    $info =
                                                    "<div class='alert alert-danger'>
                                                    <strong>Success!</strong> insefficent valance. 
                                                </div>";
                                                $recharg="insef";
                                                }else{
                                                    $recharg="";
                                                }

                                                $add = $total_amount_own + $price;

                                                $sub = $total_amount_ten - $price;

                                                $date = date("Y-m-d");

                                                if ($te_info === "" && $ow_info == ""&& $recharg == "") {

                                                    $q1 = "INSERT INTO `payment`(`amonut`, `owner_email`, `tenant_email`, `date`) VALUES('$price','$hous_owner_email','$email','$date')";

                                                    $q2 = "UPDATE `tele-birr-wallet` SET `amount`='$sub' WHERE `owner`='$email'";
                                                    $q3 = "UPDATE `tele-birr-wallet` SET `amount`='$add' WHERE `owner`='$hous_owner_email'";

                                                    if ($conn->query($q1) && $conn->query($q2) && $conn->query($q3)) {
                                                        $info =
                                                            "<div class='alert alert-success'>
                                                            <strong>Success!</strong> Successfuly Paid. 
                                                        </div>";
                                                    } else {
                                                        print $conn->error;
                                                    }
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <?php print $info ?>
                                        <div class="mb-3">
                                            <label class="col-md-4 control-label" for="email">Haues Name <?php print $ow_info ?></label>
                                            <div class="col-md-10">
                                                <input name="owner_phone" type="text" value="<?php print $hous_name ?>" class="form-control" required>
                                            </div>
                                            <label class="col-md-4 control-label" for="email">Price <?php print $ow_info ?></label>
                                            <div class="col-md-10">
                                                <input name="owner_phone" type="text" value="<?php print $price ?>" class="form-control" required>
                                            </div>
                                            <hr style="width: 83%;">
                                            <label class="col-md-4 control-label" for="email">Your Owner Phone number <?php print $ow_info ?></label>
                                            <div class="col-md-10">
                                                <input name="owner_phone" type="text" value="<?php print $owner_phone ?>" class="form-control" required>
                                            </div>
                                            <hr style="width: 83%;">
                                            <label class="col-md-4 control-label" for="email">Your Phone number <?php print $te_info ?></label>
                                            <div class="col-md-10">
                                                <input name="tenant_phone" type="text" value="<?php print $tenant_phone ?>" class="form-control" required>
                                            </div>
                                            <hr style="width: 83%;">
                                            <div class="col-md-10 text-center">
                                                <button type="submit" name="done" style="width: 30%;" class="btn btn-primary">Done</button>
                                                <div class="col-md-10">
                                                </div>
                                    </form>
                                    
                                    <?php if($recharg == "insef"){
                                       
                                        ?>
                                    
                                    <form action="" method="POST">
                                    <div style="text-align: left;">
                                    <hr style="width: 83%;">
                                            <label class="col-md-4 control-label" for="email">Recharge Money <?php print $te_info ?></label>
                                            <div class="col-md-10">
                                                Enter Amount
                                                <input name="amount" type="text" class="form-control" required>
                                            </div>
                                            <hr style="width: 83%;">
                                            <div class="col-md-10 text-center">
                                                <button type="submit" name="Recharge" style="width: 30%;" class="btn btn-primary">Recharged</button>
                                                <div class="col-md-10">
                                                </div>
                                    </div>
                                    </form>
                                    <?php }
                                        ?>
                                    
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