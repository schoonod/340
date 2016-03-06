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

<section>
	<h3>About</h3>
	<p>This database project is the first step in developing a fully functional database for an e-commerce website.</p>
	<p>It has some of the most basic components of an e-commerce website:</p>
	<ul>
		<li>Users</li>
		<li>Sellers</li>
		<li>Products</li>
		<li>Orders</li>
		<li>And a special entity: Venues</li>
    </ul>
</section>

</body>
</html>