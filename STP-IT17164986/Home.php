<?php
//    Name - Kapuge P.K.M.C
//    SID  -  IT17164986

session_start();
//Check User Login Status

if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: /Login.html');
    ob_end_flush();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!--Required Javascript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/token_request.js"></script>

    <title>Home</title>
  </head>

  <!--Invoking Ajax Function to Get CSRF Token and Set it in the Hidden Field of the Form -->
  <body onload="tokenRequest('<?php echo $_COOKIE['Name'];?>')">
  <div class="wrapper">
    <form name="loginForm" action="Token_Validation.php"  method="post">
      <input type="text" required="required" class="input-group mb-3" name="u_name" placeholder="Enter your Name">
      <br>
      <input type="text" required="required" name="sid" placeholder="Enter your SID">
      <br>
      <input type="hidden" id="MyToken" name="MyToken" value="" />
      <input type="submit"  class="btn btn-submit"value="Submit">
    </form>
  </div>
  </body>
</html>
