<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="..//style/css/icon.css">
    <title>Login Form</title>
    <style>
        #login {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            margin-left: 20%;
            margin-top: 1%;
            width: 60%;
        }

        label {
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 110%;
        }

        i {
            color: red;
            font-family: 'times new roman';
            font-weight: bold;
        }
    </style>
</head>
<?php
include("..//connection.php");
?>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    ?>
    <div class="container-fluid">
        <b>
            <hr>
        </b>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            $info = "";
            ?>
            <div class="col-lg-12" id="body">
                <?php
                $unerror = $passerror = "";
                if (isset($_POST['save'])) {

                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $re_password = $_POST['r_password'];

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    $sql_query = "SELECT * FROM account WHERE email = '$email' AND phone = '$phone'";

                    $result = $conn->query($sql_query);

                    if ($result->num_rows > 0) {
                        if ($info == "" && $passerror == "") {

                            $db_password = base64_encode($password);

                            if ($conn->query("UPDATE `account` SET  `password`= '$db_password'
                                     WHERE `email` = '$email'")) {
                                $info = "<div class='alert alert-success col-lg-12' style='text-align: left;'>
                                        <strong>Successful!</strong>
                                        </div>";
                                $_SESSION['no_login_message']=$info;
                                header("Location:http://localhost/HRMS/log/login.php");
                            } else {
                                $info = 
                                "<div class='alert alert-danger col-lg-12' style='text-align: left;'>
                                        <strong>Warning!</strong>  Error!!
                                        </div>";
                            }
                            
                        }
                    } else {
                        $info = "<i>You Enterd Inavalid email or phone !!</i>";
                    }
                }

                function  chickMuch($data, $data2)
                {
                    if ($data == $data2) {
                        return  "";
                    } else {
                        return "<i style='color: red'>Password is no much</i>";
                    }
                }
                ?>

                <form class="row g-4" method="post">
                    <div class="row col-md-8 rounded" id="login">

                        <h3 class="text-center rounded">Forgot password</h3>

                        <?php print $info; ?>

                        <div class="mb-3">
                            <label for="" class="form-label">Pleae Enter Email *</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Plesae Enter your emergence Phone *</label>
                            <input title="" name="phone" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Enter New Password *</label>
                            <input name="password" type="password" id="Password" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number"
        class="form-control" placeholder="Enter Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Re Enter New Password *</label>
                            <input type="password" class="form-control" name="r_password" required>
                        </div>

                        <div class="col-6">
                            <button type="submit" name="save" style="width: 70%; margin:10%" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" style="width: 70%; margin:10%" class="btn btn-danger">Clear</button>
                        </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
    <?php include("..//footer.php") ?>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>