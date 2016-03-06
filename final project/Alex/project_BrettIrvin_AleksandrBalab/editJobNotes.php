
<form action="edit.php">
    <input type="submit" value="Back">
</form>

<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","balaba-db","e3zrCMTKu2uZxI0p","balaba-db");
if(!$mysqli || $mysqli ->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
	
if(!($stmt = $mysqli->prepare("UPDATE application set notes=? where a_id in ( select app_id from job j where j.title=?)"))) {
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ss",$_POST['notesUpdate'],$_POST['jobNotesUpdate']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "We've " . $stmt->affected_rows . " updated notes status.";
}
?>