<?php
function defDT()
{
    return date("Y-m-d H:i:s");
}
function inpCk($value)
{
    // break next line
    $value = nl2br($value);
    // triming white spaces
    $value = trim($value);
    // htmlentities
    $value = htmlspecialchars($value);
    // stripslashes
    $value = stripslashes($value);
    // db 
    $value = $GLOBALS['con']->real_escape_string($value);
    // return value
    return $value;
}
function inpCkArr($arr=[])
{
    $newArr = [];
    if ($arr) {
        foreach ($arr as $k => $v) {
            $newArr[$k] = inpCk($v);
        }
    }               
    //
    return $newArr;
}
function aprinter($arr=[],$dont_die=0)
{
    echo "<pre>";
    print_r ($arr);
    echo "</pre>";
    if (!$dont_die) {
        die();
    }
}
// error message
function errMsg($value)
{
    return "<div class='alert alert-danger'><span class='close' data-dismiss='alert'>&times;</span> ".$value."</div>";
}
// username
function check_username($value)
{
    $output = "";
    // check if the first char not a letter
    if (!preg_match("#[a-zA-Z]#", $value[0])) {
        $output = "Username must start with letters";
    }
    // check for length
    elseif (strlen($value) < 6) {
        $output = "Username must be greater than 6";
    }
    // check values
    elseif (in_array($value, ['admin','administrator'])) {
        $output = "Invalid Username";
    }
    // check for chars
    elseif (preg_match("#[?.\"\'%^,;\-/ &@\#]#", $value)) {
        $output = "Characters are not allowed in username";
    }
    //
    return $output;
}
// password
function password_check($value)
{
    $output = "";
    if (strlen($value) < 5) {
        $output = "Password too short. Require more than 5 chars";
    }
    return $output;
}
// verify password
function passwordConfirm($value1, $value2)
{
    if ($value1 !== $value2) {
        return "Password does not match!";
    }
}