<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$webad?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$page_title?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$webad?>style.css">
    <link rel="stylesheet" href="<?=$webad?>asset/css/bootstrap.min.css">
    <script src="web.js"></script>
</head>

<body>
<header>

<div class="navbar">
            <h1 class="logo">WebTacker</h1>
            <ul class="nav">
            <?php if (loggedin()): ?>
                <li><a href="about/">About-Us</a></li>
                <li><a href="profile/">Profile</a></li>
                <li><a href="blog/">Blog</a></li>
                <li><a href="contact/">Contact</a></li>
                <li><a href="logout.php?logout">Logout</a></li>
                <?php else: ?>
                <li><a href="login/?login">Login</a></li>
                <li><a href="signup/?signup">Sign-Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="containerr">
            <div class="outer">
                <div class="details">
                    <h2>Great value to your business</h2>
                    <span>Website to go with your business.</span>
                </div>
            </div>
        </div>