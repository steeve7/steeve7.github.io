<?php
// start session
session_start();
// require connect
require_once "resource/connect.php";
// check if session isset
if (isset($_SESSION[$session_user_name])) {
    // if isset unset session
    unset($_SESSION[$session_user_name]);
}
// redirect to login
header("location: login");
exit();