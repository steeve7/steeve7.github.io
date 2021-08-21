<?php require_once "resource/global.php";?>
<?php 
user_check();
//

//signup
if ($signup = isset($_GET["signup"])){
    $page_title = "signup";
}
else $signup = true;
//query
$name = $username = $password = $vpassword = $msg ="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_POST = inpCkArr($_POST);
    extract($_POST);
    // for signup
if ($signup) {
    // check for empty values
    if (!$name or !$username or !$password) {
        $msg = errMsg("All fields are required!");
    }
    // check username
    elseif ($r = check_username($username)) {
        $msg = errMsg($r);
    }
    // check if username exist
    elseif ($r = $con->query("select id from users where username = '{$username}' limit 1") and $r->num_rows > 0) {
        $msg = errMsg("Username already exist");
    }
    // password
    elseif ($r = password_check($password)) {
        $msg = errMsg($r);
    }
    // verify password
    elseif ($r = passwordConfirm($password, $vpassword)) {
        $msg = errMsg($r);
    }
    // insert into table
    elseif ($con->query("insert into users (name, username, password, datetime) values ('$name', '$username', '".password_hash($password, PASSWORD_DEFAULT)."', '".defDT()."')")) {
        // get the last id
        $last_id = $con->insert_id;
        // open session
        $_SESSION[$session_user_name] = $last_id;
        // redirect to profile
        header("location: .");
        exit();
    }
    // else
    else {
        $msg = errMsg("Something is wrong somewhere. Check your village people, they are after you.");
    }
}   
}
?>
<?php include_once "header.php";?>
<link rel="stylesheet" href="style2.css">


<section>
    <div class="container">
        <div class="row padtb24">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div><?=$msg?></div>

                    <form action="signup.php?sign-up" method="post">
                        <div class="form-group">
                            <label for="username">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?=$name?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username?>">
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="password" placeholder="xxxx" value="<?=$password?>">
                                </div>
                            </div>

                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="pwd">Verify Password:</label>
                                    <input type="password" class="form-control" name="vpassword" placeholder="xxxx" value="<?=$vpassword?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            By clicking the signup button you agree to have read and implied to our <a href="#">terms of use</a>
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Signup</button>
                        </div>
                       
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-12">
                                Already a member? <a href="login.php?login">Login</a>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</section>




<?php include_once "footer.php";?>