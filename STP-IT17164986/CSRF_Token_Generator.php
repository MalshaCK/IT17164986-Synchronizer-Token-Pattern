<?php
//    Name - Kapuge P.K.M.C
//    SID  - IT17164986

//Session Creation
session_start();

//Set Session Variable for Check User Login Status
$_SESSION['LoginState'] = 'SET';

//Setting a Cookie for Current Session
$sessionID = session_id();
$expiry = time()+60*60*24;
setcookie('Name', $sessionID, $expiry, '', '', '', TRUE);

//CSRF Token Generating Process
$CSRF_TOKEN = hash('sha256', $sessionID.rand(1000,10000));

//Storing CSRF Token Locally
$filename = getcwd().'\tokens\\'.$sessionID.".txt";

$TokenFile = fopen($filename, "w") or die("Unable to Create Token");
fwrite($TokenFile, $CSRF_TOKEN);
fclose($TokenFile);

header('Location: /STP/Home.php');

?>
