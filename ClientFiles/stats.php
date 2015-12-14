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
    if (!isset($_SESSION["loggedin"])) {
        header("location: ../ClientFiles/home.php");
    }
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
                    <li><a href="../ClientFiles/profile.php"><span class="glyphicon glyphicon-user"></span> Friends</a></li>
                    <li class="active"><a href="../ClientFiles/stats.php"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
                    <li><a href="../ClientFiles/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../ClientFiles/ProcessLogoutRequest.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <form class="form-horizontal" role="form" action="../ClientFiles/ProcessStatsRequest.php" method="post">
            <div class="col-md-6">
                <h3>Choose View</h3>
                <select class="form-control" id="sel-store" name="sel-store"></select>
            </div>
            
            <div class="col-md-6">
                <h3>Choose Friend</h3>
                <select multiple class="form-control input-lg" size="5" id="firend-list" name="friend-list"></select>
                <button type="submit" class="btn btn-default top-space" id="btn-submit" name="btn-submit">Submit</button>           
            </div>
        </form>
    </div>
</body>
</html>