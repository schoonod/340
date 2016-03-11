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

<h3>This is the Complex query results</h3>

<table border="1" style="width:100%" >
			<th colspan="6">All product entities in the database:</th>
		<tr>
			<td>ProductID</td>
			<td>Price</td>
			<td>Name</td>
			<td>Description</td>
			<td>Ingredients</td>
			<td>SellerID</td>
		</tr>

<?php
if(!($stmt = $mysqli->prepare("
SELECT p.productID, p.price, p.name, p.description, p.ingredients, p.sellerID FROM products p
INNER JOIN venues_products vp ON vp.pid = p.productID
INNER JOIN venues v ON v.venueID = vp.vid
WHERE v.name = ? AND p.productID NOT IN
(
SELECT p.productID FROM products p
INNER JOIN products_orders po ON po.pid = p.productID
INNER JOIN orders o ON o.orderID = po.oid
)

"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['complexByVenue']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

if(!$stmt->bind_result($productID,$price,$name,$description,$ingredients,$sellerID)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $productID . "\n</td>\n<td>\n" . $price . 
         "\n</td>\n<td>\n" . $name . "\n</td>\n<td>\n". $description .  
		  "\n</td>\n<td>\n" . $ingredients . "\n</td>\n<td>\n". $sellerID.
		  "\n</td>\n</tr>";
}
$stmt->close();
?>
</table>
</body>
</html>



