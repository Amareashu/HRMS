<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
  <link rel="stylesheet" href="..//style/css/style.css">
  <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
  <title>Account List</title>
  <style>
    table {
      font-family: 'times new roman';
    }

    .btn {
      font-family: 'Times New Roman', Times, serif;
      height: 30px;
    }
  </style>
</head>

<?php include("..//connection.php");


if (!empty($_FILES)) {
  // Validating SQL file type by extensions
  if (!in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
    "sql"
  ))) {
    $response = array(
      "type" => "error",
      "message" => "Invalid File Type"
    );
  } else {
    if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
      move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
      $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
    }
  }
}

function restoreMysqlDB($filePath, $conn)
{
  $sql = '';
  $error = '';

  if (file_exists($filePath)) {
    $lines = file($filePath);

    foreach ($lines as $line) {

      // Ignoring comments from the SQL script
      if (substr($line, 0, 2) == '--' || $line == '') {
        continue;
      }

      $sql .= $line;

      if (substr(trim($line), -1, 1) == ';') {
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          $error .= mysqli_error($conn) . "\n";
        }
        $sql = '';
      }
    } // end foreach

    if ($error) {
      $response = array(
        "type" => "error",
        "message" => $error
      );
    } else {
      $response = array(
        "type" => "success",
        "message" => "Database Restore Completed Successfully."
      );
    }
    exec('rm ' . $filePath);
  } // end if file exists

  return $response;
}
?>

<body style="background-color: gray;">
  <?php
  include("..//menu.php");
  ?>
  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

      <?php
      include("..//r_side_menu.php");
      ?>
      <div class="col-lg-9 bg-light rounded">
        <hr>
        <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
          Restore Database</h3>
        <hr>
        <div>
          <div style="padding-left: 20%;">
            <?php
            include("../connection.php");

            if (!empty($response)) {
            ?>
              <div class="response <?php echo $response["type"]; ?>">
                <?php echo nl2br($response["message"]); ?>
              </div>
            <?php
            }
            ?>
            <form method="post" action="" enctype="multipart/form-data" id="frm-restore">
              <div class="col-md-6">
                <label class="col-md-4 control-label">Choose Backup File</label>
                <input type="file" name="backup_file" class="form-control" required class="input-file" />
                <input type="submit" name="restore" value="Restore" class="form-control" required class="btn-action" />
              </div>
            </form>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
  </div>
  <script src="..//style/js/bootstrap.bundle.min.js"></script>
  <?php include("..//footer.php"); ?>
</body>

</html>