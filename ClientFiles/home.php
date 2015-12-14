<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../ClientFiles/jquery-2.1.4.min.js"></script>
    <script src="../ClientFiles/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../ClientFiles/bootstrap-3.3.6-dist/css/bootstrap.min.css">
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
                    <li class="active"><a href="../ClientFiles/home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <?php
                    if (isset($_SESSION["loggedin"])) {
                        echo "<li><a href='../ClientFiles/profile.php'><span class='glyphicon glyphicon-user'></span> Friends</a></li>
                        <li><a href='../ClientFiles/stats.php'><span class='glyphicon glyphicon-stats'></span> Statistics</a></li>
                        <li><a href='../ClientFiles/cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> My Cart</a></li>";
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!isset($_SESSION["loggedin"])) {
                        echo "<li><a href='../ClientFiles/signup.php'><span class='glyphicon glyphicon-flag'></span> Sign Up</a></li>
                        <li><a href='../ClientFiles/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    } else {
                        echo "<li><a href='../ClientFiles/ProcessLogoutRequest.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <h3>About</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada mauris felis, a vehicula enim sollicitudin non.
        Maecenas consequat est id est dictum lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
        himenaeos. Proin finibus, nibh sit amet aliquet lacinia, nulla dolor consectetur diam, a semper justo sapien vitae mauris. Ut
        rhoncus velit et nisi tristique, dapibus sodales est semper. Pellentesque porttitor a purus et porta. Sed nunc metus, hendrerit
        in dictum ut, bibendum tristique libero.</p>
        
        <p>Praesent scelerisque libero eget pretium blandit. Vivamus semper, sapien dapibus imperdiet ullamcorper, sem ante rhoncus
        nunc, eget tempor magna augue at dolor. Donec vulputate purus sapien, eget eleifend mi varius non. Proin condimentum, libero et
        aliquam porttitor, sem risus aliquet purus, non convallis ipsum nunc ac augue. Morbi ornare massa nibh, nec sollicitudin sem
        hendrerit vel. Proin sed justo ut nisi sodales luctus. Aliquam imperdiet magna vitae urna vulputate, sit amet faucibus tellus
        facilisis. Donec non pulvinar mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
        egestas. Duis at molestie tellus. Nulla eu diam orci. Ut molestie odio sagittis accumsan porta. Ut quis augue facilisis,
        ultrices ex id, viverra lorem. Vivamus eu lorem dignissim, fermentum dolor quis, rhoncus magna. Donec sed nisi eros.</p>

        <h3>News</h3>
        <p>Nullam euismod tincidunt erat, non tristique lectus facilisis sit amet. Sed gravida non arcu nec sollicitudin. Nam finibus, sem
        quis molestie maximus, nulla quam euismod sem, dignissim condimentum odio ante nec nunc. Etiam vel mauris venenatis, molestie
        nulla sit amet, dictum metus. Donec dolor dui, hendrerit ac tortor fermentum, imperdiet consectetur metus. Aenean sem lacus,
        condimentum ut tristique mollis, facilisis a est. Vivamus ornare turpis dictum, sollicitudin ipsum a, interdum velit. Vivamus
        malesuada erat lectus, at venenatis turpis euismod at. Aliquam erat volutpat.</p>
        
        <h3>FAQ</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada mauris felis, a vehicula enim sollicitudin non.
        Maecenas consequat est id est dictum lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
        himenaeos. Proin finibus, nibh sit amet aliquet lacinia, nulla dolor consectetur diam, a semper justo sapien vitae mauris. Ut
        rhoncus velit et nisi tristique, dapibus sodales est semper. Pellentesque porttitor a purus et porta. Sed nunc metus, hendrerit
        in dictum ut, bibendum tristique libero.</p>
    </div>
</body>
</html>