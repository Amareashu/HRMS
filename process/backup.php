<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
  <link rel="stylesheet" href="..//style/css/style.css">
  <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
  <title>backup</title>
  <style>
    th {
      font-size: 25px;
    }
  </style>
</head>

<?php // include("..//connection.php") 
?>

<body style="background-color: gray;">
  <?php
  include('../menu.php');

  $connect = new PDO("mysql:host=localhost;dbname=hrms", "root", "");
  $get_all_table_query = "SHOW TABLES";
  $statement = $connect->prepare($get_all_table_query);
  $statement->execute();
  $result = $statement->fetchAll();

  if (isset($_POST['table'])) {
    $output = '';
    foreach ($_POST["table"] as $table) {
      $show_table_query = "SHOW CREATE TABLE " . $table . "";
      $statement = $connect->prepare($show_table_query);
      $statement->execute();
      $show_table_result = $statement->fetchAll();

      foreach ($show_table_result as $show_table_row) {
        $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
      }
      $select_query = "SELECT * FROM " . $table . "";
      $statement = $connect->prepare($select_query);
      $statement->execute();
      $total_row = $statement->rowCount();

      for ($count = 0; $count < $total_row; $count++) {
        $single_result = $statement->fetch(PDO::FETCH_ASSOC);
        $table_column_array = array_keys($single_result);
        $table_value_array = array_values($single_result);
        $output .= "\nINSERT INTO $table (";
        $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
        $output .= "'" . implode("','", $table_value_array) . "');\n";
      }
    }
    $file_name = 'hrms.sql';
    $file_handle = fopen($file_name, 'w+');
    fwrite($file_handle, $output);
    fclose($file_handle);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_name));
    ob_clean();
    flush();
    readfile($file_name);
    unlink($file_name);
  }

  ?>

  <br />
  <div class="container">

    <div class="row">
      <?php
      include("..//r_side_menu.php");

      ?>
      <div class="col-lg-9 bg-light rounded">
        <!-- <h2 align="center">How to Take Backup of Mysql Database using PHP Code</h2> -->
        <br />

        <form method="post" id="export_form">
          <hr>
          <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
            Select Tables for Export</h3>
          <hr>
          <div style="padding-left: 20%;">
            <?php
            foreach ($result as $table) {
            ?>
              <div class="checkbox">
                <label><input type="checkbox" class="checkbox_table" name="table[]" value="<?php echo $table["Tables_in_hrms"]; ?>" /> <?php echo $table["Tables_in_hrms"]; ?></label>
              </div>
            <?php
            }
            ?>
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Export" />
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  <script src="..//style/js/bootstrap.bundle.min.js"></script>
  <?php include("..//footer.php"); ?>
</body>

</html>

<script>
  $(document).ready(function() {
    $('#submit').click(function() {
      var count = 0;
      $('.checkbox_table').each(function() {
        if ($(this).is(':checked')) {
          count = count + 1;
        }
      });
      if (count > 0) {
        $('#export_form').submit();
      } else {
        alert("Please Select Atleast one table for Export!");
        return false;
      }
    });
  });
</script>