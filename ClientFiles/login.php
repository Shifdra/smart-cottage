<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../ClientFiles/jquery-2.1.4.min.js"></script>
    <script src="../ClientFiles/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../ClientFiles/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../ClientFiles/customstyle.css">
    <title>Cart-Life</title>
    <?php
    session_start();
    ?>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../ClientFiles/home.php">Cart-Life</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="../ClientFiles/home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <?php
                    if (isset($_SESSION["loggedin"])) {
                        echo "<li><a href='../ClientFiles/profile.php'><span class='glyphicon glyphicon-user'></span> Friends</a></li>"
                        . "<li><a href='../ClientFiles/stats.php'><span class='glyphicon glyphicon-stats'></span> Statistics</a></li>"
                        . "<li><a href='../ClientFiles/cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> My Cart</a></li>";
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../ClientFiles/signup.php"><span class="glyphicon glyphicon-flag"></span> Sign Up</a></li>
                    <li class="active"><a href="../ClientFiles/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <form class="form-horizontal" role="form" action="../ClientFiles/ProcessLoginRequest.php" method="post">
            <div class="form-group">
                <?php
                if (isset($_SESSION["incorrectlogin"])) {
                    echo $_SESSION["incorrectlogin"];
                    $_SESSION["incorrectlogin"] = null;
                }
                ?>
                <label class="control-label col-md-5" for="txt-username">Username:</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="txt-username" name="txt-username" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5" for="txt-password">Password:</label>
                <div class="col-md-2">
                    <input type="password" class="form-control" id="txt-password" name="txt-password" required>
                </div>
            </div>
            <div class="col-md-5"></div>
            <button type="submit" class="btn btn-primary col-md-2" id="btn-login" name="btn-login">Login</button>
        </form>
    </div>
</body>
</html>