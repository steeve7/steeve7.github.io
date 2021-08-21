<?php require_once "resource/global.php";?>
<?php
user_check();
//
$page_title = "Login";
//login
if($login = isset($_GET["login"])){

}
//
else $login = true;
//query
$name = $username = $password = $vpassword = $msg ="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_POST = inpCkArr($_POST);
    extract($_POST);
    // login
    if ($login) {
        // check for empty values
        if (!$username or !$password) {
            $msg = errMsg("All fields are required!");
        }
        // check if username exist
        elseif ($r = $con->query("select id,password,status from users where username = '{$username}' limit 1") and $r->num_rows > 0) {
            // fetch associative array of the result assign to found variable
            $found = $r->fetch_assoc();
            // check password
            if (!password_verify($password, $found['password'])) {
               $msg = errMsg("Incorrect Password"); 
            }
            // check the user status
            elseif (!$found['status']) {
                $msg = errMsg("Account is blocked");
            }
            // login
            else {
                // open session
                $_SESSION[$session_user_name] = $found['id'];
                // redirect to profile
                header("location:.");
                exit();
            }
        }
        // 
        else {
            $msg = errMsg("Invalid User");
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
                    <form action="login.php?login" method="post" >
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="xxxx" value="<?=$password?>">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm"></span>    
                            Login</button>
                        </div>
                       
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-12">
                                Not a member? <a href="signup.php?sign-up">Sign Up</a>
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <a href="#">forgotten password</a>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</section>
<div class="progress">
<div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 40%">
</div>
</div>

<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Inbox
    <span class="badge badge-primary badge-pill">12</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ads
    <span class="badge badge-primary badge-pill">50</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Junk
    <span class="badge badge-primary badge-pill">99</span>
  </li>
</ul>



<?php include_once "footer.php";?>