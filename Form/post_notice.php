<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>notic</title>

    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <script type="text/javascript" src="../style/JS/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="../style/css/style.css">
    <script type="text/javascript" src="../style/JS/jquery.validate.js"></script>
    <style>
        #contact {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
            width: 80%;
        }
        label {
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 120%;
            color: black;
        }
    </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
    <?php
    include("../connection.php");
    include("../menu.php");
    $info = "";
    ?>

    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
            <?php
            include("../r_side_menu.php");
            ?>
            <div class="col-lg-9 rounded bg-secondary body1" style="color: white;">

                <form class="form-horizontal" method="post">
                    <div class="row col-md-9 rounded" id="contact">
                        <fieldset style="margin-left: 10%;">
                            <div class="col-md-10">
                                <h3 class="text-center rounded">Notification Bord</h3>

                                <?php
                                $email= $_SESSION['email'];
                                if (isset($_POST['send'])) {

                                    $subject = $_POST['subject'];
                                    $message = $_POST['message'];
                                    $date = date("d-m-y");
                                   
                                    if (!empty($message)) {
                                        if ($conn->query("INSERT INTO notic(`sender`,`subject`,`message`, `date`) 
                                    VALUES ('$email','$subject','$message','$date')")) {
                                            $info = "<i style='color: green'>Your message is successfuly sent</i>";
                                        } else {
                                            print "some error occured " . $conn->error;
                                        }
                                    } else {
                                        $info = "Sorry ! The Message Area is Empity";
                                    }
                                }
                                print "$info";
                                ?>
                                <hr>
                            </div>

                            <!-- subject input-->
                            <div class="mb-3">
                                <label class="col-md-4 control-label" for="email">Subject</label>
                                <div class="col-md-10">
                                    <input name="subject" type="text"  class="form-control" required>
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="mb-3">
                                <label class="col-md-3 control-label">Body message</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-12">
                                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                </form>


            </div>
        </div>
    </div>
    <?php include("../footer.php"); ?>
    <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>