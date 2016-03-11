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

    <h3>Venue has been added to the Seller table</h3>

<?php
if(!($stmt = $mysqli->prepare("INSERT INTO venues (name, dateTime, address, streetName, city, zip, sellerID) VALUES (?,?,?,?,?,?,?)"))){
    echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ssissii",$_POST['name'],$_POST['dateTime'],$_POST['address'],$_POST['streetName'],$_POST['city'],$_POST['zip'],$_POST['sellerID']))){
    echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
    echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
    echo "Successfully Added " . $stmt->affected_rows . " rows to contact table.";
}
?>

<form action="add.php">
    <input type="submit" value="Back">
</form>

</body>
</html>
































