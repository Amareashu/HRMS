<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>notice ditaile</title>
    <style>
        table {

            font-size: 140%;
            font-family: 'Times New Roman';
            margin-left: 5%;
            margin-right: 5%;
        }

        tr td {
            width: 7%;
            padding: 0.5%;
        }

        #active {
            font-weight: bold;
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
            $name = "";
            $m_id=$_GET['c_id'];
            ?>

            <div class="col-lg-9 bg-secondary rounded">
                
                <?php
                include("../connection.php");             
                    

                $sql_update = "UPDATE `feedback` SET `STATUS`='View' WHERE id = '$_GET[c_id]'";

                $conn->query($sql_update);

                $sql = "SELECT * FROM `feedback` WHERE id = '$_GET[c_id]'";

                $result = $conn->query($sql);
                if ($result) {
                    //print "successs <br>";
                } else {
                    print $conn->error;
                }
                //print $result->num_rows;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id =  $row['id'];
                        $sender =  $row['sender'];
                        $message = $row['message'];
                        $date = $row['date'];
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <hr>
                <h3 class="rounded" style="
                    background-color: rgb(56, 52, 52); 
                    text-align: center; 
                    color: wheat;
                    font-family: 'Times New Roman';">
                    <?php print"Feedback Ditail Information"; ?> </h3>
                <hr>
                
                <div class="col-lg-12">
                <?php
                 if(isset($_POST['send'])){
                        
                    print "<b class='text-info'>You are Successfuly Send to $sender</b>";
                    }
                ?>
                    <table>
                        <tr>
                            <td>Sender Address :</td>
                            <td> <?php print "<i> " . $sender . "</i>" ?></td>
                        </tr>
                        <tr>
                            <td>Message :</td>
                            <td> <?php print "<i> " . $message . "</i>" ?></td>
                        </tr>
                        <tr>
                            <td>Date of Sending :</td>
                            <td> <?php print "<i> " . $date . "</i>" ?></td>
                        </tr>
                            <td>
                                <hr>
                                Action :
                            </td>
                            <td> 
                                <hr>
                                <a href='http://localhost/hrms/delete/delete_message.php?c_id=<?php print $id?>'>
                                    <button class='btn-danger rounded' name="delete">Delete</button>
                                </a>
                                <br>
                                <a href='http://localhost/hrms/View/message.php#'>
                                    <button class='btn-primary rounded'>
                                        Back</button>
                                </a> <form action="" method='POST'>
                                <button class="btn-primary rounded" name="replay">Replay</button> 
                                </form>
                            </td>
                        </tr>
                    </table>

                    <?php
                    if(isset($_POST['replay'])){
                    ?>
                    <hr>
                   <form action="" method="POST">
<table>
    <tr>
        <td>
            <div class="mb-3">
                            <label for="" class="form-label">Enter Message *</label>
                            <input name="mesage" type="text" id="message"/>
                    </div>
                </td>
                    <td>
                    <button class='btn-info' name="send">
                            Send
                    </button> 
                    </td>
    </tr>
</table>
                   <hr>
                    
                    
                   </form>
                   <?php                        
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>