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

//Getting User Session ID Saved in Cookie
$cookie = $_COOKIE['Name'];

//Getting CSRF Token User Submit
$received_token = $_POST['MyToken'];

//Formatting User Submitted CSRF Token for Comparison
$final_token = str_replace('"',"",$received_token);

//Open Token File using User Session ID and Extract Data from the File
$token_file = fopen(getcwd().'\tokens\\'.$cookie.".txt", "r") or die ("Can't Extract Data from Token !!!");
$token = fread($token_file, filesize(getcwd().'\tokens\\'.$cookie.".txt"));
fclose($token_file);

//Compare User Submitted CSRF Token with Server Generated Original CSRF Token
if ($token == $final_token){
  $_SESSION['status'] = "Details submitted!!! ";
  setcookie("Details",$_POST['u_name'].",".$_POST['sid']);
}else{
  $_SESSION['status'] = "Comparison Failed!!!";
  setcookie("Details","".","."");
}

header('Location: /STP/Data_Receiving_End_Point.php');
?>

