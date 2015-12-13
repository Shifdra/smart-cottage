<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../ClientFiles/jquery-2.1.4.min.js"></script>
    <script src="../ClientFiles/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="../ClientFiles/cartscript.js"></script>
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
                    <li><a href="../ClientFiles/profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li><a href="../ClientFiles/stats.php"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
                    <li class="active"><a href="../ClientFiles/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../ClientFiles/ProcessLogoutRequest.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <form class="form-horizontal" role="form" action="../ClientFiles/ProcessCartRequest.php" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <h3>Create New Item</h3>
                    <select class="form-control" id="sel-retail" name="sel-retail">
                        <option selected disabled hidden>Select Retailer</option>
                        <?php
                        include '../LogicFiles/Catalogue.php';
                        //$catalogue = new Catalogue();
                        //$retailerNames = $catalogue->getRetailerNames();
                        //$i = 1;
                        //foreach ($retailerNames as $name) {
                            //echo "<option value='".$i."'>".$name."</option>";
                            //$i++;
                        //}
                        echo "<option value='1'>Value 1</option>
                        <option value='2'>Value 2</option>
                        <option value='3'>Value 3</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-store" name="sel-store" disabled>
                        <option selected disabled hidden>Select Store</option>
                        <?php
                        echo "<option value='1'>Value 1</option>
                        <option value='2'>Value 2</option>
                        <option value='3'>Value 3</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-cat" name="sel-cat" disabled>
                        <option selected disabled hidden>Select Category</option>
                        <?php
                        echo "<option value='1'>Value 1</option>
                        <option value='2'>Value 2</option>
                        <option value='3'>Value 3</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-item" name="sel-item" disabled>
                        <option selected disabled hidden>Select Item</option>
                        <?php
                        echo "<option value='1'>Value 1</option>
                        <option value='2'>Value 2</option>
                        <option value='3'>Value 3</option>";
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="control-label" for="price">Price Per Unit ($):</label>
                    <input type="text" class="form-control" id="txt-price" name="txt-price" disabled>
                </div>
                <div class="form-group">
                    <label class="control-label" for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="txt-quantity" name="txt-quantity" disabled>
                    <button type="submit" class="btn btn-default top-space" id="btn-add-item" name="btn-add-item">Add Item to Cart</button>
                    <button type="button" class="btn btn-default top-space" id="btn-clear-form">Clear Form</button>
                </div>
            </div>
            
            <div class="col-md-6">
                <h3>Your Cart</h3>
                <select multiple class="form-control input-lg" size="15" id="sel-cart"></select>
                <button type="submit" class="btn btn-default top-space" id="btn-remove-item" name="btn-rmv-item">Remove Item</button>
            </div>
        </form>
    </div>
</body>
</html>