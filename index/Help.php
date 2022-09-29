<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Help</title>

  <link rel="stylesheet" href="../style/css/bootstrap.min.css">
  <script type="text/javascript" src="../style/JS/jquery-1.4.2.min.js"></script>
  <link rel="stylesheet" href="../style/css/style.css">
  <script type="text/javascript" src="../style/JS/jquery.validate.js"></script>
  <style>
    #index h3 {
      font-family: 'Times New Roman';
      font-weight: bold;
      font-size: 140%;
      background-color: rgb(56, 52, 52);
    }

    p {
      font-family: 'Times New Roman', Times, serif;
      font-size: 125%;
      color: black;
      margin-left: 3%;
    }

    p {
      margin-left: 4%;
    }

    h4 {
      margin-left: 3%;
      margin-top: 2%;
    }
  </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
  <?php
  include("../menu.php");
  ?>

  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
    <?php
      include("..//r_side_menu.php");
      ?>
      <div class="col-lg-9 rounded  bg-light body1">

        <div id="about" class="rounded" style="margin-top: 2%;">
          <h3 class="text-center rounded">Service</h3>
          <h4 style="
          color: black; 
          font-size: 140%; 
          font-weight: bold; 
          font-family: 'Times New roman';">
		<th>  <td  align="left" width="675px" bgcolor="#d5e4f7">
  <br/> <font color="black" face="lucida" size="4" >   
   <center><strong><font size="4" face="elephant">Help page for House Owner to use the System Easily</font></strong></center><br>
              Dear customer you should need to follow the following steps for easy use of our system. 
     <ol>
	 <li>If you are new user choose create account link on the home page; fill all the required fields carefully then registered. </li>
	 <li>Else if you have previousilly created account login with your email and password to access the system. </li>
	 <li>else you forget password your password choose change password link press on forget password button then fill the form and press on change password button. </li>
	 <li>After you get entered you will see different links on the home page so select a link for the purpose you need. </li>
<li>If you choose upload the house link the page will be displayed for you; fill all the required fields carefully. If you filled correctly and click submitt it will be saved to database and display you success message.</li>
		 <li>If you have previousily posted house information and want to update your house informations press on update link and update the house datas.</li>
			 <li>Click on view link to view house reservation and prevous reservation cancel requests sent from tenants and confirm if you interested in or denay if you not interested with the request.</li>
<li>If you accept the request the house will be reserved for the requester so you can follow the payment status of your house by choosing view payment status option on the home page;  </li>
<li>if the tenants paid you can check payment amount and data of paided  by go to transaction </li> 
<li>If you want to change your password choose change password link then fill the form and press on change password button. </li>
<li>If you want to support incase of any accedient or conflict on the system choose feedback link and fill all the required fillds then submit. </li>
<li>After you finished all tasks and want to leave the site press on logout button it will automatically logs you out. </li>
</ol>
  </td></th>
<tr>
<left><td colspan=3 bgcolor="#80584c">

<th>  <td  align="left" width="675px" bgcolor="#d5e4f7">
  <br/> <font color="black" face="lucida" size="4" >   
   <center><strong><font size="4" face="elephant">Help page for Tenants to use the System Easily</font></strong></center><br>
              Dear customer you should need to follow the following steps for easy use of our system. 
     <ol>
	 <li>If you are new user choose create account link on the home page; fill all the required fields carefully then submitt. </li>
	 <li>Else if you have previousilly created account login with your email and password to access the system. </li>
	  <li>else you forget password your password choose change password link press on forget password button then fill the form and press on change password button. </li>
	 <li>After you get entered you will see different links on the home page so select a link for the purpose you need. </li>
<li>After viewing a number availabe houses posted in the system with their details you can choose the best house that will much your requirement and send the rental request to the house owner by clicking on reserve button.</li>
		 <li>You will be unaproved until the house owner accept for your request; then press on view responses link if he or she allowed you to reserve press pay button to pay the required money for the house owner </li>
			 <li>If you paid the money the house will be reserved for you so you can go to use it. You can follow the payment progress of the house by pressing on payment of the house or rooms you reserved option   </li>
<li>If you paid the the house  payment  you can follow the payment status of your house then you can cheeck view the payment  on transaction</li>
<li>If you want to cancel resrvation request you can press on send cancel reservation request on the payment page and fill the fields then submitt.</li>
<li>If you want to support incase of any accedient or conflict on the system choose feedback link and fill all the required fillds then submit. </li>
<li>If you want to change your password choose change password link then fill the form and press on update button. </li>
<li>After you finished all tasks and want to leave the site press on logout button it will automatically logs you out. </li>
	</ol>
  </td></th>
<tr>
<center><td colspan=3 bgcolor="#80584c">
        </div>
        <br>
      </div>
    </div>
  </div>

  <?php include("../footer.php"); ?>
  <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>