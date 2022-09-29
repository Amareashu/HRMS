<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Including Bootstrap Icons in HTML</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="http://localhost/hrms/ion.css">
</head>

<body>
    <h1><i class="bi-globe"></i> Hello, world!</h1>
    facebook
    <i class="fa-brands fa-facebook"></i>


    <button type="submit" class="btn btn-primary"><span class="bi-search"></span> Search</button>
    <button type="submit" class="btn btn-secondary"><span class="bi-search"></span> Search</button>

    <hr>
    <form action="https://www.w3schools.com/action_page.php" style="max-width:500px;margin:auto">
  <h2>Register Form</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="usrnm">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw">
  </div>

  <button type="submit" class="btn">Register</button>
</form>
<hr>

<div class="col">
<a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
         <a href="#" class="fb btn">
          <i class="fa fa-telegram fa-fw"></i> Login with telegram
         </a>
         <a href="#" class="twitter btn">
          <i class="fa fa-youtube fa-fw"></i> Login with youtube
        </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-phone fa-fw"></i> Login with phone
        </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="style/js/bootstrap.bundle.min.js"></script>
</body>

</html>