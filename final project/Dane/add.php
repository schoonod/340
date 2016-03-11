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

	<h3>These are the table Add queries</h3>




	<div>
		<form method="post" action="addUser.php" style="background-color:rgb(233,30,99); padding:15px"> 
			<fieldset>
				<legend style="color:white"><h5>Add User</h5></legend>
				<p>Email: <input type="text" name="email"/></p>
				<p>Password: <input type="text" name="password"/></p>
				<p>Seller: <input type="text" name="seller"/> (1 or 0)</p>
				<p>Registration Date: <input type="text" name="registrationDate"/> (yyyy-mm-dd hh:mm:ss)</p>
			</fieldset>
			<input style="background-color:cyan" type="submit" value="Add User" class="mdl-button mdl-js-button mdl-button--raised"/>
		</form>
	</div>
	<br>




	<div>
		<form method="post" action="addSeller.php" style="padding:15px"> 
			<fieldset>
				<legend><h5>Add Seller</h5></legend>
				<p>Rating: <input type="text" name="rating" /></p>	
			</fieldset>

			<fieldset name="userEmail">
				<legend>User Email</legend>
				<select name="userEmail">
					<?php
                        if(!($stmt = $mysqli->prepare("SELECT userID, email FROM user"))){
                        		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                        }
						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($userID, $email)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
						    echo '<option value=" '. $userID . ' "> ' . $email . ' </option>\n';
						}
						$stmt->close();
                    ?>
				</select>
			</fieldset>
			<input style="background-color:rgb(233,30,99); color:white; margin-top:10px" type="submit" value="Add Seller" class="mdl-button mdl-js-button mdl-button--raised"/>
		</form>
	</div>
	<br>




	<div>
		<form method="post" action="addProduct.php" style="background-color:rgb(233,30,99); padding:15px"> 
			<fieldset>
				<legend style="color:white"><h5>Add Product</h5></legend>
				<p>Price: $ <input type="text" name="price" /></p>
				<p>Name: <input type="text" name="name" /></p>
				<p>Description: <input type="text" name="description" /></p>
				<p>Ingredients: <input type="text" name="ingredients" /></p>
			</fieldset>
			
			<fieldset name="sellerID">
				<legend>Seller Email</legend>
				<select name="sellerID">
					<?php
                        if(!($stmt = $mysqli->prepare("
                        	SELECT sellerID, email FROM user u
                        	INNER JOIN seller s ON s.userID = u.userID
                    	"))){
                        	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                        }
						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($sellerID, $email)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
						    echo '<option value=" '. $sellerID . ' "> ' . $email . ' </option>\n';
						}
						$stmt->close();
                    ?>
				</select>
			</fieldset>

			<input style="background-color:cyan; margin-top:10px" type="submit" value="Add Product" class="mdl-button mdl-js-button mdl-button--raised"/>
		</form>
	</div>
	<br>




	<div>
		<form method="post" action="addVenue.php" style="padding:15px"> 

			<fieldset>
				<legend><h5>Add Venue</h5></legend>
				<p>Name: <input type="text" name="name" /></p>
				<p>Date: <input type="text" name="dateTime" /> (yyyy-mm-dd hh:mm:ss)</p>
				<p>Street Number: <input type="text" name="address" /></p>
				<p>Street Name: <input type="text" name="streetName" /></p>
				<p>City: <input type="text" name="city" /></p>
				<p>Zip: <input type="text" name="zip" /></p>
			</fieldset>
			
			<fieldset name="sellerID">
				<legend>Seller Email</legend>
				<select name="sellerID">
					<?php
                        if(!($stmt = $mysqli->prepare("
                        	SELECT sellerID, email FROM user u
                        	INNER JOIN seller s ON s.userID = u.userID
                    	"))){
                        	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                        }
						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($sellerID, $email)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
						    echo '<option value=" '. $sellerID . ' "> ' . $email . ' </option>\n';
						}
						$stmt->close();
                    ?>
				</select>
			</fieldset>

			<input style="background-color:rgb(233,30,99); color:white; margin-top:10px" type="submit" value="Add Venue" class="mdl-button mdl-js-button mdl-button--raised"/>
		</form>
	</div>
	<br>





</body>
</html>





















