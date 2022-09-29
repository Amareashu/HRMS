<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Update House</title>
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
            include("..//r_side_menu.php")
            ?>

            <div class="col-lg-9 bg-secondary rounded" id="body">

                <?php

                $fnerror = $lnerror = $mnerror = $tellerror = "";

                $info = "";

                $email= $_SESSION['email'];
                $result_phone = $conn->query("SELECT * FROM `account` WHERE `email` ='$email'");
                    if ($result_phone->num_rows > 0) {
                        while ($row_p = $result_phone->fetch_assoc()) {
                            $phone = $row_p["phone"];

                    }
                }else{
                    print $conn->error;
                }

                //`hous_name`, `category`, `no_room`, `mobile`, `address`, `price`, `email`,`description`, `image`

                $h_id=$_GET['h_id'];

                $result_up_house = $conn->query("SELECT * FROM `House` WHERE `id` ='$h_id'");
                    if ($result_up_house->num_rows > 0) {
                        while ($row_up_house = $result_up_house->fetch_assoc()) {
                            
                    $h_name = $row_up_house['hous_name'];
                    $category = $row_up_house['category'];
                    $no_room = $row_up_house['no_room'];
                    $mobile = $row_up_house['mobile'];
                    $address = $row_up_house['address'];
                    $price = $row_up_house['price'];
                    $email = $row_up_house['email'];
                    $description = $row_up_house['description'];
                    $image = $row_up_house['image'];

                    }
                }else{
                    print $conn->error;
                }


                if (isset($_POST['save'])) {
                    $h_name = $_POST['h_name'];
                    $category = $_POST['category'];
                    $no_room = $_POST['no_room'];
                    $mobile = $_POST['phone'];
                    $address = $_POST['address'];
                    $price = $_POST['price'];
                    $email = $_POST['email'];

                    if(empty($_POST['image'])){
                        $image=$image;
                    }else{
                        $image = $_POST['image'];
                    }

                    if(empty($_POST['description'])){
                        $description=$description;
                    }else{
                        $description = $_POST['description'];
                    }
                    

                        $sql_update="UPDATE `house` SET 
                        `hous_name`='$h_name',`category`='$category',
                        `no_room`='$no_room',`mobile`='$mobile',
                        `address`='$address',`price`='$price',
                        `email`='$email',`description`='$description',
                        `image`='$image' WHERE `id`='$h_id'";

                        if ($conn->query($sql_update)) {
                            $info =
                                "<div class='alert alert-success'>
                                    <strong>Success!</strong> Your are successful updated. 
                                </div>";
                            $id = $hname = $address = $gender = $age = $image = "";
                        } else {
                            $info =$conn->error;
                        }
                    
                }


                ?>

                <hr>
                <h3 class="rounded">
                    Update House
                </h3>
                <div id="inform">
                    <i><?php print "$info" ?></i>
                </div>
                <hr>
                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-4">
                            <label for="fname" class="form-label">House Name *</label>
                            <input name="h_name" type="text" value="<?php print  $h_name ?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="category" class="form-label">Category *</label>
                            <select id="catgory" name="category" class="form-select">
                                <option>Shooping</option>
                                <option>Hotel</option>
                                <option>Cafe</option>
                                <option>Hospital</option>
                                <option>Education</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="form-label">Number of Room *</label>
                            <input name="no_room" type="number" value="<?php print  $no_room ?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="lname" class="form-label">Email*</label>
                            <input name="email" type="text" value="<?php print  $email ?>" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone * <?php print $tellerror ?></label>
                            <input name="phone" type="text" minlength="10" maxlength="13" placeholder="+251 or 09" value="<?php print  $phone ?>" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="id" class="form-label">Address *</label>
                            <input name="address" type="text" value="<?php print  $address ?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="id" class="form-label">Price *</label>
                            <input name="price" type="number" value="<?php print  $price ?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="id" class="form-label">Image *</label>
                            <input name="image" type="file" value="<?php print  $image ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="description" value="hello" rows="5"></textarea>
                            </div>
                        </div>

                        
                        <div class="col-6 text-center">
                            <button type="submit" id="register" name="save" class="btn btn-primary">Save</button>
                        </div>

                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("..//footer.php") ?>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>