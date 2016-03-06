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
<body>

<div class="navbar">
    <h3>DB functions navigation</h3>
    <div class="navbar-right">
        <ul>
            <li><a href="products.php">View All Products</a></li>
            <li><a href="venues.php">View All Venues</a></li>
            <li><a href="basic.php">Filter Products (Basic)</a></li>
            <li><a href="complex.php">Filter Products (Complex)</a></li>
            <li><a href="addOrder.php">Add a new Job application</a></li>
			<li><a href="editVenues.php">Edit A job</a></li>
			<li><a href="main.php">Home</a></li>
        </ul>
    </div>
</div>

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
WHERE v.name = ?
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['productByVenue']))){
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




