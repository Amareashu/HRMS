<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Account Creating Form</title>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: gray; ">
    <?php
    include("..//menu.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php")
            ?>

            <div class="col-lg-9 bg-gray rounded" id="body">
                <?php
                $unerror = $unerror1 = $passerror = $info = "";
                $full_name = $id_number = $role = $email = $address = $mrtial_s= $phone = $e_phone = $password = $re_password = "";
                if (isset($_POST['register'])) {

                    $full_name = $_POST['full_name'];
                    $id_number = $_POST['id_number'];
                    $role = $_POST['role'];
                    $mrtial_s = $_POST['mrtial_s'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $image = $_POST['image'];
                    $phone = $_POST['phone'];
                    $e_phone = $_POST['e_phone'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    

                   $unerror1 = ValidateEmail($email);
                    $unerror = chickString($full_name);
                    $passerror = chickMuch($password, $re_password);
                
                    $info = $passerror;
              
                    $result = $conn->query("SELECT * FROM `account` WHERE `email`='$email'");
                    if (!$result->num_rows > 0) {

                        if ($unerror == "" && $passerror == "" && $unerror1 == "") {
                            // $password = base64_encode($password);
                            //  `full_name`, `password`, `role`, `id_number`, `email`, `phone`, address `e_phone`, `image`
                            $db_password = base64_encode($password);
                            if (($conn->query("INSERT INTO account 
                            (`full_name`, `password`, `role`, `mrtial_s`,`id_number`,`address`,`email`, `phone`, `e_phone`, `image`) VALUES 
                            ('$full_name','$db_password','$role', '$mrtial_s','$id_number','$address','$email','$phone','$e_phone','$image')")) &&
                            $conn->query( "INSERT INTO `tele-birr-wallet`(`owner`, `phone`, `amount`) VALUES ('$email','$phone','17')") ) {
                                $info = "<div class='alert alert-success col-lg-12'>
                                              <strong>Successful!</strong>
                                          </div>";
                                $full_name = $id_number = $role = $email = $address = $phone = $e_phone = $password = $re_password = "";
                            } else {
                                $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong>!!
                            " . $conn->error . "</div>";
                            }
                        }
           
					else {
                        $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong> invalid Email or password!!
                            </div>";
                    }
					}
					else {
                        $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong> This Email is reserved!!
                            </div>";
                }}

function ValidateEmail($email) 
{
 if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
  {
    return " <i style='color: red'>Invaild  email </i>";
                    } 
  else {
	  return "";
                    }
}

                function  chickString($data)
                {
                    if (!preg_match("/^[a-zA-Z- 0-9]*$/", $data)) {
                        return " <i style='color: red'>Invaild  user name </i>";
                    } else {
                        return "";
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

                <hr>
                <h3 class="rounded">
                    Account Creating Form</h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-4">
                            <label for="full_name" class="form-label">Full Name * <?php print $unerror ?> </label>
                            <input title="" name="full_name" type="text" class="form-control" value="<?php print $full_name ?>" maxlength="50" minlength="5"required>
                        </div>

                        <div class="col-md-4">
                            <label for="uname" class="form-label">Email Address * <?php print $unerror ?> </label>
                            <input title="" name="email" value="<?php print $email ?>" type="email" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select">
                                <option><?php print $role ?></option>
                                <option>Owner</option>
                                <option>Tenant</option>
                                <option>System Admin</option>
                                <option>Kebele Admin</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="mrtial_s" class="form-label">Marital Status</label>
                            <select id="mrtial_s" name="mrtial_s" class="form-select">
                                <option><?php print $mrtial_s ?></option>
                                <option>Single</option>
                                <option>Marred</option>
                                <option>With Child</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="id_number" class="form-label">ID Number</label>
                            <input title="" value="<?php print $id_number ?>" name="id_number" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="id_number" class="form-label">Address</label>
                            <input title="" value="<?php print $address ?>" name="address" type="text" class="form-control"  required>
                        </div>
                        <div class="col-md-3">
                            <label for="password" class="form-label">Image</label>
                            <input title="" name="image" value="<?php print $image ?>" type="file" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="password" class="form-label">Phone</label>
                            <input title="" name="phone" type="tel" pattern='[\+]\d{3}[\(]\d{2}[\)]\d{3}[\-]\d{4}'  value="<?php print $phone ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Emrgency Phone</label>
                            <input title="" name="e_phone"type="tel" pattern='[\+]\d{3}[\(]\d{2}[\)]\d{3}[\-]\d{4}'  value="<?php print $e_phone ?>"  class="form-control" required>
                        </div>


                        <div class="col-md-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" id="Password" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number"
        class="form-control" placeholder="Enter Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
                        </div>

                        <div class="col-md-3">
                            <label for="re_password" class="form-label">Re-Enter Password</label>
                            <input title="This fild must be much to password" value="<?php print $re_password ?>" name="re_password" type="password" class="form-control" required>
                        </div>
                        <div>
                    </div>
                    <div>
                    </div>

                        <div class="col-6 text-center">
                            <button type="submit" name="register" class="btn btn-primary">Create</button>
                        </div>
                        <div class="col-6 text-center">
                            <button type="clear" class="btn btn-danger">clear</button>
                        </div>
                        <hr>
                    </form>
                </div>

                <hr>

            </div>
        </div>
    </div>
    <?php include("..//footer.php") ?>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>