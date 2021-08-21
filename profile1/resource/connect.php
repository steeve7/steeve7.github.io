<?php
$serverHost = "localhost";
$serverName = "root";
$serverPassword = "";
$maindb = "profiledb";

$con = new mysqli($serverHost, $serverName, $serverPassword, $maindb);

if (!$con)
    die("Could not connect to Server");

require_once "function.php";
require_once "resources.php";

// session names
$session_user_name = $maindb."usernamelogin";
?>
