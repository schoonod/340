<form method="post" action="careers.php">
 	<fieldset>
 	<legend>Please select desired career</legend>
 	<select name="careers">	 
 	<?php
  $result = $mysqli->query('SELECT c.title FROM career c');  
  while($row = $result->fetch_object()){
  $indata = $row->c_id;
  $p = $row->title;
  echo '<option value="'.$p.'">'.$p.'</option>';
  }
 	$result->close();
  ?>
 	</select>
 	<input type="submit" value="Search"/>
 	</fieldset>
