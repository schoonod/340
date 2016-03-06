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
	
	
if(!($stmt = $mysqli->prepare("INSERT INTO job (title, emp_option, salary, experience,app_id,company_id) VALUES (?,?,?,?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ssisii",$_POST['JobTitle'],$_POST['EmpOption'],$_POST['PotSal'],$_POST['ReqExp'],
$_POST['AppStatus'],$_POST['CompanyName']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to job.";
}
?>


