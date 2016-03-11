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
    <h3>Ecommerce Database navigation</h3>
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

    <p>Below is a breakdown of the links at the top of this page.

    <h4>View All Products</h4>
    <p>This contains a basic query that displays the products table.</p>

    <h4>View All Venues</h4>
    <p>This contains a basic query that displays the venues table.</p>

    <h4>View All Users</h4>
    <p>This contains a basic query that displays the user table.</p>

    <h4>View All Orders</h4>
    <p>This contains a basic query that displays the orders table.</p>

    <h4>Basic Query</h4>
    <p>This contains several basic queries:</p>
    <ul>
        <li>Search Products by Venue: Shows all products designated by a user-selected Venue</li>
        <li>Search Products by Seller: Shows all products designated by a user-selected Seller (designated by email address)</li>
        <li>Search for Products less than $10</li>
        <li>Search for Products greater than $10</li>
        <li>And a special entity: Venues</li>
    </ul>

    <h4>Complex Query</h4>
    <p>This contains a complex query that finds products being sold from a venue which have not been ordered yet.</p>

    <h4>Add to Tables</h4>
    <p>This allows addition of rows to all tables that are non-index tables.</p>








</section>

</body>
</html>