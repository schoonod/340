<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","wolfordj-db","jC39X2rJKFt9prbp","wolfordj-db");
if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("INSERT INTO bsg_people(fname, lname, homeworld, age) VALUES (?,?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

// NOTE THAT SSII MEANS "STRING STRING INTEGER INTEGER" TO SPECIFY TYPES OF DATA BEING POSTED
// NOTE THAT 'FirstName' is the name of the field in the form (HTMLexample.php)
	// it is also a KEY in the associative array that the POST sends
if(!($stmt->bind_param("ssii",$_POST['FirstName'],$_POST['LastName'],$_POST['Homeworld'],$_POST['Age']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to bsg_people.";
}
?>