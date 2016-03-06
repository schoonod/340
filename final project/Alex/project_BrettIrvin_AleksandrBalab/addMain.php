<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","balaba-db","e3zrCMTKu2uZxI0p","balaba-db");
if(!$mysqli || $mysqli ->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	header( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0" );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>

</div>

<div class="navbar">
    <h3>Job application Database</h3>
    <div class="navbar-right">
        <ul>
            <li><a href="viewAll.php">View All Jobs</a></li>
			<li><a href="viewRecent.php">View Most Recent</a></li>
            <li><a href="basic.php">Basic Search</a></li>
            <li><a href="complex.php">Complex Search</a></li>
            <li><a href="addMain.php">Add a new Job application</a></li>
			<li><a href="edit.php">Edit A job</a></li>
			<li><a href="main.php">Home</a></li>
        </ul>
    </div>
</div>

<h1> Please fill out each Table with  desired information</h1>
<h2> Each Table has a Submit Button. Add to Tables Individually.</h2>

<div>
	<form method="post" action="addContact.php"> 

		<fieldset>
			<legend>Add Contact information </legend>
			<p>First Name: <input type="text" name="FirstName" /></p>
			<p>Last Name: <input type="text" name="LastName" /></p>
			<p>Title: <input type="text" name="Title" /></p>
			<p>Phone Number: <input type="text" name="PhoneNumber" /></p>
			<p>Email Address: <input type="text" name="Email" /></p>
		</fieldset>
		<p><input type="submit" value="Add Contact" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addCompany.php"> 

		<fieldset>
			<legend>Add Company information </legend>
			<p>Company Name: <input type="text" name="CompanyName" /></p>
			<p>Address: <input type="text" name="Address" /></p>
			<p>Industry: <input type="text" name="Industry" /></p>
			<p>Department: <input type="text" name="Department" /></p>
		</fieldset>

				<fieldset name="CompanyContact">
			<legend>Contact in the Company</legend>
			<select name="CompanyContact">
<?php
if(!($stmt = $mysqli->prepare("SELECT c_id, fname, lname FROM contact"))){echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;}
if(!$stmt->execute()){echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;}
if(!$stmt->bind_result($c_id, $fname, $lname)){echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;}
//while($stmt->fetch()){echo '<option value=" '. $c_id . ' " >   '. $lname .'  </option>\n';}
while($stmt->fetch()){
    echo '<option value=" '. $c_id . ' "> ' . $fname . '  ' . $lname . '  </option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" value="Add Company"/></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addApplication.php"> 

		<fieldset>
			<legend>Add Application information </legend>
			<p>Method of Submission: <input type="text" name="Method" /></p>
			<p>Application Status: <input type="text" name="ApplicationStatus" /></p>
			<p>Submission Date: <input type="text" name="SubmissionDate" /></p>
			<p>Notes: <input type="text" name="Notes" /></p>
		</fieldset>
		
		<p><input type="submit" value="Add Application"/></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addJob.php"> 

		<fieldset>
			<legend>Add Job Information</legend>
			<p>Job's Title: <input type="text" name="JobTitle" /></p>
			<p>Emp Option: <input type="text" name="EmpOption" /></p>
			<p>Potencial Salary: <input type="number" name="PotSal" /></p>
			<p>Required Experience: <input type="text" name="ReqExp" /></p>
		</fieldset>


		<fieldset name="Application">
			<legend>Application Status</legend>
			<select name="AppStatus">
		
		<?php
if(!($stmt = $mysqli->prepare("SELECT a_id, notes FROM application"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($a_id, $notes)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $a_id . ' " >   '. $notes .'  </option>\n';
}
$stmt->close();

?>
</select>
</fieldset>
		
		<fieldset >
			<legend>Company Name</legend>
			<select name="CompanyName">


<?php
if(!($stmt = $mysqli->prepare("SELECT co_id, name FROM company"))){echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;}
if(!$stmt->execute()){echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;}
if(!$stmt->bind_result($co_id, $company)){echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;}
while($stmt->fetch()){echo '<option value=" '. $co_id . ' "> ' . $company . '</option>\n';}
$stmt->close();

?>
			</select>
		</fieldset>
		<p><input type="submit"  value="Add Job"/></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addPublished.php"> 

		<fieldset>
		
			<legend>Add Source to Job </legend>
			<h4>This field is required for a job to be properly filtered</h4>
			<select name="sourceToJob">
		
		<?php
if(!($stmt = $mysqli->prepare("SELECT s_id, name FROM source"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($s_id, $name)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $s_id . ' " >   '. $name .'  </option>\n';
}
$stmt->close();
?>
</select>
			
			<select name="jobToSource">
		
		<?php
if(!($stmt = $mysqli->prepare("SELECT j_id, title, name FROM job inner join company co on j_id=co_id"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($j_id, $title,$name)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $j_id . ' " >   '. $title .'   '. $name .' </option>\n';
}
$stmt->close();

?>
</select>
		</fieldset>
		
		<p><input type="submit" value="Connect Job to Source"/></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addSource.php"> 

		<fieldset>
			<legend>Add Source information </legend>
			<p>Name of Job's Source: <input type="text" name="Source" /></p>
		</fieldset>
		
		<p><input type="submit" value="Add Job Source"/></p>
	</form>
</div>



</body>
</html>