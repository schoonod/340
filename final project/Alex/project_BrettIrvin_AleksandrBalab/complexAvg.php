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
			<th colspan="3">General information About applied Jobs </th>
		<tr>
			<td>Industry Name</td>
			<td>Average salary in the industry</td>
		</tr>
<?php

if(!($stmt = $mysqli->prepare("
SELECT 
co.industry, AVG(j.salary)
from job j 
INNER JOIN company co on co.co_id=j.j_id
INNER JOIN application a on a.a_id=j.app_id
INNER JOIN contact c on c.c_id=co.contact_id

INNER JOIN published p on p.j_id=j.j_id
INNER JOIN source s on s.s_id=p.s_id

WHERE co.industry = ?
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['AvgSalary']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($industry,$avg

)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $industry . "\n</td>\n<td>\n" .$avg. 
		 "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>