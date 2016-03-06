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
			<td>Name of the source</td>
			<td>Employment Option</td>
			<td>Number of Jobs per each source</td>

		</tr>
<?php

if(!($stmt = $mysqli->prepare("
SELECT s.name,j.emp_option, COUNT(j.j_id) 
FROM job j
INNER JOIN published p ON p.j_id = j.j_id
INNER JOIN source s ON s.s_id = p.s_id
where s.name=?
GROUP BY s.name;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['numJobSource']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name,$emp_option,$count

)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $emp_option . "\n</td>\n<td>\n".$count. "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>