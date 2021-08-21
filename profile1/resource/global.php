<?php
session_start();

require_once "connect.php";

//
function loggedin(){
    return isset($_SESSION[$GLOBALS["session_user_name"]]);
}
// check if user is not loggedin

function clogin_user(){
    if(!loggedin()){
        header("location: login.php");
        exit();
    }
}
// check if user is loggedin

function user_check(){
    if(loggedin()){
        header("location:profile.php");
        exit();
    }
}