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
<form action="complex.php">
    <input type="submit" value="Back">
</form>
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
			<td>Company Industry</td>	
			<td>Contact's First name</td>
			<td>Contact's Last name</td>
			<td>Phone Number</td>
			<td>Email</td>
			<td>Source</td>
		</tr>
<?php

if(!($stmt = $mysqli->prepare("
SELECT 
j.title,
j.emp_option,
j.salary,
j.experience,
a.notes,
a.app_st,
co.address,
co.name,

co.industry,
c.fname,
c.lname,
c.phone,
c.email,
s.name
from job j 

INNER JOIN company co on co.co_id=j.j_id
INNER JOIN application a on a.a_id=j.app_id
INNER JOIN contact c on c.c_id=co.contact_id
INNER JOIN published p on p.j_id=j.j_id
INNER JOIN source s on s.s_id=p.s_id
WHERE j.emp_option=? AND  s.name=?
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("ss",$_POST['manyEmp'],$_POST['manySource']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($title,$emp_option,$salary,$experience,$notes,$app_st,$address,$name,$industry,$fname,$lname,
$phone,$email,$cName

)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $title . "\n</td>\n<td>\n" . $emp_option . 
         "\n</td>\n<td>\n" . $salary . "\n</td>\n<td>\n". $experience .  
		  "\n</td>\n<td>\n" . $notes . "\n</td>\n<td>\n". $app_st.
		  "\n</td>\n<td>\n" . $address . "\n</td>\n<td>\n". $name.
		   "\n</td>\n<td>\n" . $industry . "\n</td>\n<td>\n". $fname.
		     "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n". $phone. "\n</td>\n<td>\n" .$email. "\n</td>\n<td>\n" .$cName. 
		 "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>