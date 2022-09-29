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
            margin-left: 30%;
            margin-top: 2%;
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

<body>
    <?php
    session_start();
    include("../connection.php");
    include("../image_menu.php");
    $not = 0;

    $r1 = $conn->query("SELECT * FROM `feedback` WHERE `status`='un_view'");
    $not = $r1->num_rows;

    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mt-1 rounded">
        <div class="container">
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-menu" style="font-size: 15px;">
                <ul class="navbar-nav me-auto">
                </ul>

                <a href="http://localhost/hrms/index.php">
                    <li class="nav-link">Home</li>
                </a> 
                <a href="http://localhost/hrms/log/contact.php">
                    <li class="nav-link">Feedback</li>
                </a>
                <a href="http://localhost/hrms/Form/create_account.php">
                    <li class="nav-link">Account</li>
                </a>

                <?php
                if (isset($_SESSION['role'])) {
                ?>
                    <a href="http://localhost/hrms/log/logout.php">
                        <li class="nav-link">Logout</li>
                    </a>
                <?php
                } else {
                ?>
                    <a href="http://localhost/hrms/log/login.php">
                        <li class="nav-link">Login</li>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <b>
            <hr>
        </b>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            $info = "";
            ?>
            <div class="col-lg-10" id="body">
                <?php
                if (isset($_SESSION['no_login_message'])) {
                    $info = $_SESSION['no_login_message'];
                }
                if (isset($_POST['login'])) {

                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $info = $email . $password;

                    $sql_query = "SELECT * FROM account WHERE email = '$email'";

                    $result = $conn->query($sql_query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $st = "deactive"; 
                            $status = $row['status'];

                            if ($st == $status) {
                                $info = "<i>You Can't Login,  Your account is blocked !!</i>";
                            } else {
                                $password = base64_encode($password);
                                if ($row['email'] == $email && $row['password'] == $password) {

                                    $info = "You are Login";
                                    $_SESSION['role'] = $row['role'];
                                    $_SESSION['email'] = $row['email'];
                                    $user_id = $row['id'];

                                    header("Location:http://localhost/hrms/index.php?");

                                    $login = $row['role'];
                                } else {
                                    $info = "<i>You Enterd Invalid Password !!</i>";
                                }
                            }
                        }
                    } else {
                        $info = "<i>You Enterd Inavalid User Email !!</i>";
                    }
                }
                ?>

                <form class="row g-4" method="post">
                    <div class="row col-md-6 rounded" id="login">

                        <h3 class="text-center rounded">Login</h3>

                        <?php print $info; ?>

                        <div class="mb-3">
                            <label for="" class="form-label">User Email *</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="col-6">
                            <button type="submit" name="login" style="width: 70%; margin:10%" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" style="width: 70%; margin:10%" class="btn btn-danger">Clear</button>
                        </div>
                        <div class="col-6">
                            <a href="http://localhost/hrms/index/forgot_password.php">Forgot password ???</a>
                        </div>  
                        <div class="col-5" style="text-align: right;">
                            <a href="http://localhost/hrms/Form/create_account.php">Sign UP???</a>
                        </div>
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