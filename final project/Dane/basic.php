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
<script>
// document.forms['emptyTest'].reset()
</script>

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

<h3>This is a product filter</h3>

<div>
	<form method="post" action="productByVenue.php">
		<fieldset>
			<legend>Search Products by Venue</legend>
				<select name="productByVenue">			
					 <?php
            			$result = $mysqli->query('SELECT name FROM venues');      
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

    <form method="post" action="productBySeller.php">
        <fieldset>
            <legend>Search Products by Seller</legend>
                <select name="productBySeller">          
                     <?php
                        $result = $mysqli->query('
                            SELECT sellerID FROM seller s
                            INNER JOIN user u ON s.userID = u.userID
                            ');      
                        while($row = $result->fetch_object()){
                            $indata = $row->seller_sellerID;
                            $n = $row->name;
                            echo '<option value="'.$n.'">'.$n.'</option>';
                        }
                        $result->close();
                    ?>
                </select>
                        <input type="submit" value="Search By Seller"/>
        </fieldset>
    </form>

</div>
<br>
</body>
</html>
