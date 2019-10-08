<?php
//    Name - Kapuge P.K.M.C
//    SID  -  IT17164986

session_start();

//check User Login Status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: /Login.html');
    ob_end_flush();
    die();
}

//Extracting User Data from Cookie
if(isset($_COOKIE["Details"])){
    $pieces = explode(",", $_COOKIE["Details"]);
    $username = $pieces[0];
    $sid = $pieces[1];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Required CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Data End-Point</title>
  </head>

  <body class="wrapper">
    <label ><?php echo $_SESSION['status']; ?></label>
    <label><br>Name : <?php echo $username ?></label>
    <label><br><br>SID : <?php echo $sid ?></label>
  </body>
</html>
