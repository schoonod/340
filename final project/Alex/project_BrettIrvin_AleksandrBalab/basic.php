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


<div>
	<form method="post" action="basicIndustry.php">
		<fieldset>
			<legend>Filter Jobs by Industry</legend>
				<select name="basicIndustry">			
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
<br>
<div>
	<form method="post" action="basicExp.php">
		<fieldset>
			<legend>Filter Employment option</legend>
				<select name="basicExp">			
					 <?php
            $result = $mysqli->query('SELECT DISTINCT experience FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->experience;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select>
						<input type="submit" value="Search by Req Exp" />
		</fieldset>
	</form>
</div>
<br>
<div>
	<form method="post" action="basicEmp.php">
		<fieldset>
			<legend>Filter Employment option</legend>
				<select name="basicEmp">			
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
						<input type="submit" value="Search by Employment" />
		</fieldset>
	</form>
</div>
<br>
<div>
	<form method="post" action="basicAppSt.php">
		<fieldset>
			<legend>Filter Application Status</legend>
				<select name="basicAppStatus">			
					 <?php
					$result = $mysqli->query('SELECT DISTINCT app_st FROM application');      
					while($row = $result->fetch_object()){
                   $indata = $row->a_id;
                   $p = $row->app_st;
                   echo '<option value="'.$p.'">'.$p.'</option>';
                }
				$result->close();
            ?>
				</select>
						<input type="submit" value="Search by App Status" />
		</fieldset>

	</form>
</div>



<br>
	<form method="post" action="basicSalary.php" > 
		<fieldset>
			<legend>Filter Jobs by salary: </legend>
			<p>Between:&nbsp &nbsp &nbsp <input type="number" name="lowerAmount" autocomplete="off" /> &nbsp and &nbsp <input type="number" name="Higher_Amount" autocomplete="off" /><input type="submit" value="Search by Salary" /></p>
			<p>Less Then:&nbsp <input type="number" name="lowerBasicSalary" autocomplete="off" /> <input type="submit" value="Search by Salary" /></p>
			<p>More Then: <input type="number" name="basicSalary" autocomplete="off"/> <input type="submit" value="Search by Salary" /></p>
		</fieldset>
	</form>




</body>
</html>
