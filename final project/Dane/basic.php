<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","schoonod-db","uoZ2IDcnmGwEEAd5","schoonod-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.deep_purple-pink.min.css">
    <title>E-commerce DB</title>
</head>
<body style="margin-left:2vw; margin-right:2vw; width:96vw">

<script>
// document.forms['emptyTest'].reset()
</script>

<div class="navbar">
    <h3>DB functions navigation</h3>
    <div class="navbar-right">
        <ul>
            <li><a href="main.php">Home</a></li>
            <li><a href="products.php">View All Products</a></li>
            <li><a href="venues.php">View All Venues</a></li>
            <li><a href="users.php">View All Users</a></li>
            <li><a href="orders.php">View All Orders</a></li>
            <li><a href="basic.php">Basic Query</a></li>
            <li><a href="complex.php">Complex Query</a></li>
            <li><a href="add.php">Add to tables</a></li>
        </ul>
    </div>
</div>

<h3>This is a product filter</h3>

<div>
    <form method="post" action="productByVenue.php" style="margin:10px">
        <fieldset>
            <legend>Search Products by Venue</legend>
                <select name="productByVenue" style="width:180px">          
                     <?php
                        $result = $mysqli->query('
                            SELECT name FROM venues
                            ');      
                        while($row = $result->fetch_object()){
                            $indata = $row->venues_venueID;
                            $n = $row->name;
                            echo '<option value="'.$n.'">'.$n.'</option>';
                        }
                        $result->close();
                    ?>
                </select>
                <input type="submit" value="Search By Venue"/>
        </fieldset>
    </form>

    <form method="post" action="productBySeller.php" style="margin:10px">
        <fieldset>
            <legend>Search Products by Seller</legend>
                <select name="productBySeller" style="width:180px">          
                     <?php
                        $result = $mysqli->query('
                            SELECT email FROM user u
                            INNER JOIN seller s ON s.userID = u.userID
                            ');      
                        while($row = $result->fetch_object()){
                            $indata = $row->user_userID;
                            $n = $row->email;
                            echo '<option value="'.$n.'">'.$n.'</option>';
                        }
                        $result->close();
                    ?>
                </select>
                <input type="submit" value="Search By Seller"/>
        </fieldset>
    </form>

    <form method="post" action="productsLessThan10.php" style="margin:10px">
        <fieldset>
            <legend>Products Less Than $10</legend>
            <input type="submit" value="Find"/>
        </fieldset>
    </form>

    <form method="post" action="productsGreaterThan10.php" style="margin:10px">
        <fieldset>
            <legend>Products Greather Than $10</legend>
            <input type="submit" value="Find"/>
        </fieldset>
    </form>

</div>
<br>
</body>
</html>
