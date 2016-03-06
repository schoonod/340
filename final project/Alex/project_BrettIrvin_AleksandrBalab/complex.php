<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","balaba-db","e3zrCMTKu2uZxI0p","balaba-db");
if(!$mysqli || $mysqli ->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>

<script>
document.forms['emptyTest'].reset()
</script>
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

<h1> Filtering the information from database</h1>



<br>
	<form method="post" action="complexSalEmp.php" > 
		<fieldset>
			<legend>Filter Jobs by Employment and Salary </legend>
			<p>With Salary More Then: <input type="number" name="compSalary" autocomplete="off"/> 
			that are NOT
			<select name="notEmp">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT emp_option FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->emp_option;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select>
				<input type="submit" value="Search by Salary" /></p>				
		</fieldset>
	</form>
	
	<br>
	<form method="post" action="complexLocEmp.php" > 
		<fieldset>
			<legend>Filter Jobs by Salary and Location, Industry </legend>
			<p> Jobs that are <select name="complexEmpLoc">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT emp_option FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->emp_option;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select>  in
			  <select name="complexLoc">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT address FROM company');      
                while($row = $result->fetch_object()){
                   $indata = $row->co_id;
                   $p = $row->address;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
			</select>  City and
	
			  <select name="complexIndustry">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT industry FROM company');      
                while($row = $result->fetch_object()){
                   $indata = $row->co_id;
                   $p = $row->industry;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
			 </select>
				Industry&nbsp <input type="submit" value="Search by Salary" /></p>				
		</fieldset>
	</form>
	
	
	<br>
	<form method="post" action="complexCount.php" > 
		<fieldset>
			<legend>Filter Jobs by Source Many-to-Many</legend>
			<p> Jobs that are <select name="manyEmp">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT emp_option FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->emp_option;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select> 
			 that were found in 
			  <select name="manySource">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT name FROM source');      
                while($row = $result->fetch_object()){
                   $indata = $row->s_id;
                   $p = $row->name;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
			 </select>
				Industry&nbsp <input type="submit" value="Search Source" /></p>				
		</fieldset>
	</form>

	
	
		<br>
		
	<form method="post" action="complexCountSource.php" > 
		<fieldset>
			<legend>Number of Jobs per Source </legend>
			
			<p> Source Name
			  <select name="numJobSource">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT name FROM source');      
                while($row = $result->fetch_object()){
                   $indata = $row->s_id;
                   $p = $row->name;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
			 </select>
			 <input type="submit" value="Search Source" /></p>				
		</fieldset>
	</form>
	<br>
	<div>
	<form method="post" action="complexAvg.php">
		<fieldset>
			<legend>Average Salary by Industry</legend>
				Salary by Industry
				<select name="AvgSalary">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT industry FROM company');      
                while($row = $result->fetch_object()){
                   $indata = $row->co_id;
                   $p = $row->industry;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select>
						<input type="submit" value="Search By Industry"/>
		</fieldset>

	</form>
</div>



</body>
</html>
