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
    include '../LogicFiles/Catalogue.php';
    
    $catalogue = new Catalogue();
    
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
                        $retailerNames = $catalogue->getRetailerNames();
                        foreach ($retailerNames as $name) {
                            echo "<option value='".$name."'>".$name."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-store" name="sel-store" disabled>
                        <option selected disabled hidden>Select Store</option>
                        <?php
                        if (isset($_SESSION["retailselected"])) {
                            $storeNames = $catalogue->getStoreNamesByRetailer($_SESSION["retailselected"]);
                            foreach ($storeNames as $name) {
                                echo "<option value='".$name."'>".$name."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-cat" name="sel-cat" disabled>
                        <option selected disabled hidden>Select Category</option>
                        <?php
                        if (isset($_SESSION["storeselected"])) {
                            $categoryNames = $catalogue->getCategoryNames();
                            foreach ($categoryNames as $name) {
                                echo "<option value='".$name."'>".$name."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel-item" name="sel-item" disabled >
                        <option selected disabled hidden>Select Item</option>
                        <?php
                        if (isset($_SESSION["catselected"])) {
                            $itemNames = $catalogue->getItemNamesByCategory($_SESSION["catselected"]);
                            foreach ($itemNames as $name) {
                                echo "<option value='".$name."'>".$name."</option>";
                            }
                        }
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
                <select multiple class="form-control input-lg" size="15" id="sel-cart" name="sel-cart[]">
                    <?php
                    //if there are order items in the session arrays then populate the select box
                    if (isset($_SESSION["orderitemsel"][0])) {
                        $i = 0;
                        foreach($_SESSION["orderitemsel"] as $val) {
                            echo "<option value='" . $i . "'>" . $_SESSION["orderquantity"][$i] . " "
                            . $_SESSION["orderitemsel"][$i] . "(s) @ $" . $_SESSION["orderprice"][$i] . " each</option>";
                            $i++;
                        }
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-default top-space" id="btn-remove-item" name="btn-rmv-item">Remove Item From Cart</button>
                <button type="submit" class="btn btn-default top-space" id="btn-commit" name="btn-commit">Commit Items</button>
            </div>
        </form>
    </div>
</body>
</html>