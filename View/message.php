<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
  <link rel="stylesheet" href="..//style/css/style.css">
  <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
  <title>user feedback</title>
  <style>
    table {
      font-family: 'times new roman';
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
      include("..//r_side_menu.php")
      ?>

      <div class="col-lg-9 bg-light rounded">
        <hr>
        <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
          Message Listes</h3>
        <hr>
        <?php
        include("../connection.php");
        $li = 1;
        $sql = "SELECT * FROM `feedback` ORDER BY `status`";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          // output data of each row
          echo "<table class='table align-middle'>
                <tr>
                    <th>#</th> 
                    <th>Sender Address</th>          
                    <th>Date</th>            
                    <th>Status</th>            
                    <th>Action</th>
                </tr>";
          while ($row = $result->fetch_assoc()) {
            $c_id = $row["id"];
            //`sender`, `message`, `date`
            echo "
                    <tr>
                        <td>$li</td> 
                        <td>" . $row["sender"] . "</td> 
                        <td>" . $row["date"] . "</td>                        
                        <td>" . $row["status"] . "</td>                        
                        <td>
                            <a href='http://localhost/hrms/view/message_detial.php?c_id=$c_id'>
                            <button class='btn-success rounded'>View</button></a> 
                        </td>
                    </tr>";
            $li++;
          }
          echo "</table>";
        } else {
          echo "0 results";
        }

        ?>

      </div>
    </div>
  </div>
  <script src="..//style/js/bootstrap.bundle.min.js"></script>
  <?php include("..//footer.php"); ?>
</body>

</html>