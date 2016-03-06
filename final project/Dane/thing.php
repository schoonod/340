
	
You are screensharing and presenting to everyoneStop
Aleksandr
You
Aleksandr Balab	2 participants
Group chat
To list all available commands enter "/?".
	
me	12:07 PM
https://packagecontrol.io/installation
	
Aleksandr Balab	12:15 PM
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
<form action="main.php">
  <input type="submit" value="Back">
</form>
 <table border="1" style="width:100%" >
 	<th colspan="17">General information About a Career </th>
 	<tr>
 	<td>Jobs title</td>
 	<td>Average Salary</td>
 	<td>Industry</td>	 
 	<td>Req. Education</td>
 	<td>Starting Position</td>
 	<td>In demand</td>
 	<td>Obsolete</td>
 	<td>Dos</td>
 	<td>Don'ts</td> 
 	<td>Career's trend</td>
 	<td>Updated On</td>
 	<td>Interviewee</td>
 	<td>Title</td>
 	<td>Company</td>
 	<td>Contact</td>
 	</tr>
<?php

if(!($stmt = $mysqli->prepare("
SELECT c.title, c.salary, c.industry, sk.education, sk.common_pos, sk.hot, sk.cold, p.dos, p.donts, p.trends, p.updated, s.name, s.title, s.company, s.contact
FROM career c
INNER JOIN source s ON c.source_id = s.s_id
INNER JOIN skills sk ON c.skills_id = sk.sk_id
INNER JOIN pitfalls p ON c.pitfalls_id = p.p_id
WHERE c.title = ?
"))){
 echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['career']))){
 echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
 echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($title,$salary,$industry,$education,$common_pos,$hot,$cold,$dos,$donts,$trends,$updated,
$name,$stitle,$company,$contact

)){
 echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
  echo "<tr>\n<td>\n" . $title . "\n</td>\n<td>\n" . $salary . 
  "\n</td>\n<td>\n" . $industry . "\n</td>\n<td>\n".

Enter chat message or link here
Your camera is on.