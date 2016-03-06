<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","balaba-db","e3zrCMTKu2uZxI0p","balaba-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
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

<table border="1" style="width:100%" >
			<th colspan="17">General information About applied Jobs </th>
		<tr>
			<td>Jobs title</td>
			<td>Employment Option</td>
			<td>Salary</td>		
			<td>Experience</td>
			<td>Notes</td>
			<td>Application Status</td>
			<td>Company Name</td>
			<td>Company Address</td>		
			<td>Industry</td>
			<td>Contact's First name</td>
			<td>Contact's Last name</td>
			<td>Phone Number</td>
			<td>Email</td>
			<td>Source</td>
		</tr>
<?php

if(!($stmt = $mysqli->prepare("
SELECT j.title, j.emp_option, j.salary,j.experience, a.notes,a.app_st, 
co.name,co.address,co.industry,c.fname,c.lname,
c.phone,c.email, s.name FROM job j
INNER JOIN published p ON p.j_id = j.j_id
INNER JOIN source s ON s.s_id = p.s_id
INNER JOIN application a ON j.j_id=a.a_id 
INNER JOIN company co ON j.j_id = co.co_id
INNER JOIN contact c ON c.c_id=co.co_id
ORDER BY j.j_id DESC
LIMIT 3
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

if(!$stmt->bind_result($title, $emp_option, $salary, $experience, $notes, $app_st, $name, $address, $industry,$fname, $lname, $phone, $email,$Cname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $title . "\n</td>\n<td>\n" . $emp_option . "\n</td>\n<td>\n" . $salary . 
          "\n<td>\n" .$experience. "\n</td>\n<td>\n" . $notes . "\n</td>\n<td>\n" . $app_st . 
          "\n<td>\n" . $name . "\n</td>\n<td>\n" . $address . "\n</td>\n<td>\n" . $industry. "\n</td>\n<td>\n" . $fname . 
		  "\n<td>\n" . $lname . "\n</td>\n<td>\n" . $phone . "\n</td>\n<td>\n" . $email . "\n</td>\n<td>\n" . $Cname . "\n</td>\n</tr>";
}
$stmt->close();
?>
		</table>
</div>