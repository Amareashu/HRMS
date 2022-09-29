<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>left side menu</title>
    </title>
</head>
<?php
$image = "user.jpg";

if (isset($_SESSION['loging_user'])) {
    $loging_user = $_SESSION['loging_user'];
} else {
    $loging_user = "For more login";
}

?>

<body>
    <div class="col-lg-3 rounded  text-left">
        <ul class="list-group" style="
        font-family: 'Times New Roman', Times, serif; 
        font-size: 120%;">
            <div class="text-center bg-secondary">
                <img src="http://localhost/hrms/images/<?php print $image ?>" style="width: 40%; padding: 15px; border-radius: 50%;" alt="nott">
            </div>

            <li class="list-group-item bg-secondary text-light" aria-current="true">
                <h4> <?php print $loging_user ?></h4>
            </li> 

            <a href="http://localhost/hrms/index/service.php">
                <li class="list-group-item"><button class="rounded">Service</button></li>
            </a>

            <a href="http://localhost/hrms/index/about.php">
                <li class="list-group-item"><button class="rounded">About</button></li>
            </a>
 
            
            <a href="http://localhost/hrms/index/mission.php">
                <li class="list-group-item"><button class="rounded">Mission</button></li>
            </a>
 

            <a href="http://localhost/hrms/index/Vission.php">
                <li class="list-group-item"><button class="rounded">Vision</button></li>
            </a> 

            <a href="http://localhost/hrms/index/team.php">
                <li class="list-group-item"><button class="rounded">Developer</button></li>
            </a>
			            <a href="http://localhost/hrms/index/Help.php">
                <li class="list-group-item"><button class="rounded">Help</button></li>
            </a>
            <a href="">
                <li class="list-group-item"></li>
            </a>
        </ul>
    </div>
</body>

</html> 