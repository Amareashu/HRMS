<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS</title>
</head>

<body>
    <?php
    session_start();
    include("connection.php");
    include("image_menu.php");
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
                <?php $no_message = 0;
                if (isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    if ($role == 'Owner') {
                ?>
                        <a href="http://localhost/hrms/View/view_update_house.php">
                            <li class="nav-link">House</li>
                        </a>
                        <a href="http://localhost/hrms/Form/house_registration.php#">
                            <li class="nav-link">Upload House</li>
                        </a>
                        <a href="http://localhost/hrms/View/View_request.php">
                            <li class="nav-link">Request</li>
                        </a>

                        <a href="http://localhost/hrms/View/transaction.php#">
                            <li class="nav-link">Transaction <sup style="color: red;"><?php print $no_message ?></sup></li>
                        </a>

                    <?php
                    }
                    if ($role == 'Tenant') {
                    ?>
                        <a href="http://localhost/hrms/View/house_list.php">
                            <li class="nav-link">House</li>
                        </a>
                        <a href="http://localhost/hrms/process/payment.php">
                            <li class="nav-link">Payment</li>
                        </a>
                        <a href="http://localhost/hrms/View/my_request.php">
                            <li class="nav-link">My Request</li>
                        </a>

                        <a href="http://localhost/hrms/View/transaction.php#">
                            <li class="nav-link">Transaction <sup style="color: red;"><?php print $no_message ?></sup></li>
                        </a>
                    <?php
                    }
                    if ($role == 'System Admin') {
                        //http://localhost/hrms/process/backup_db.php?action=Backup
                    ?>

                        <a href="http://localhost/hrms/process/restore.php">
                            <li class="nav-link">Restor</li>
                        </a>
                        <a href="http://localhost/hrms/process/backup.php">
                            <li class="nav-link">Backup</li>
                        </a>
                        <a href="http://localhost/hrms/View/account_list.php">
                            <li class="nav-link">User Account</li>
                        </a>
                        <a href="http://localhost/hrms/View/gnerate_report.php">
                            <li class="nav-link">Report</li>
                        </a>
                        <?php
                        $no_message = "";
                        $sql = "SELECT * FROM `feedback` WHERE `status`='un_view'";
                        $result = $conn->query($sql);
                        $no_message = $result->num_rows;
                        ?>
                        <a href="http://localhost/hrms/View/message.php#">
                            <li class="nav-link">Comment<sup style="color: red;"><?php print $no_message ?></sup> </li>
                        </a>
                    <?php
                    }
                    if ($role == 'Kebele Admin') {
                    ?>
                        <a href="http://localhost/hrms/View/gnerate_report.php">
                            <li class="nav-link">Report</li>
                        </a>
                        <a href="http://localhost/hrms/View/house_list.php">
                            <li class="nav-link">House</li>
                        </a>
                        <a href="http://localhost/hrms/Form/post_notice.php">
                            <li class="nav-link">Post Notice</li>
                        </a>
                        <a href="http://localhost/hrms/View/custmer_list.php">
                            <li class="nav-link">Tenant</li>
                        </a>
                        <a href="http://localhost/hrms/View/user_list.php">
                            <li class="nav-link">Owner</li>
                        </a>
                    <?php
                    }
                    $no_message = "";
                    $sql = "SELECT * FROM `feedback` WHERE `status`='un_view'";
                    $result = $conn->query($sql);
                    $no_message = $result->num_rows;
                    ?>
                    <a href="http://localhost/hrms/View/notice.php">
                        <li class="nav-link">Notice</li>
                    </a>
                    <a href="http://localhost/hrms/update/change_password.php">
                        <li class="nav-link">Change password</li>
                    </a>
                    <a href="http://localhost/hrms/log/logout.php">
                        <li class="nav-link">Logout</li>
                    </a>

                <?php
                } else {
                ?>
                    <a href="http://localhost/hrms/view/location.php">
                        <li class="nav-link">Location</li>
                    </a>
                    <a href="http://localhost/hrms/Form/create_account.php">
                        <li class="nav-link">Account</li>
                    </a>

                    <a href="http://localhost/hrms/log/contact.php">
                        <li class="nav-link">Feedback</li>
                    </a>

                    <a href="http://localhost/hrms/log/login.php">
                        <li class="nav-link">Login</li>
                    </a>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>
    <script src="style/js/bootstrap.bundle.min.js"></script>
</body>

</html>