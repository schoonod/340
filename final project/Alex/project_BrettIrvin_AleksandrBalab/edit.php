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
<h2> Each Table has a Submit Button</h2>

<form method="post" action="editJobStatus.php"> 
		<fieldset>
			<legend>Edit Job's Status </legend>
			<p>New Status <input type="text" name="statusUpdate" />
	
				of the 
				<select name="jobTitleUpdate">			
					 <?php
            $result = $mysqli->query('SELECT  title FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->title;
                   echo '<option value="'.$p.'">'.$p.' </option>';
                }
				$result->close();
            ?>

			</p>
				</select>
						<input type="submit" value="Edit Job's Status"/>
	</fieldset>
</form>	

<form method="post" action="editJobNotes.php"> 
		<fieldset>
			<legend>Edit Job's Notes </legend>
			<p>New notes <input type="text" name="notesUpdate" />
	
				of the 
				<select name="jobNotesUpdate">			
					 <?php
            $result = $mysqli->query('SELECT  title FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->title;
                   echo '<option value="'.$p.'">'.$p.' </option>';
                }
				$result->close();
            ?>

			</p>
				</select>
						<input type="submit" value="Edit Job's Notes"/>
	</fieldset>
</form>	

<form method="post" action="editJobTitle.php"> 
		<fieldset>
			<legend>Edit Job's Title </legend>
			<p>New Job Title <input type="text" name="titleUpdate" />
	
				of the 
				<select name="jobTitleUpdate">			
					 <?php
            $result = $mysqli->query('SELECT  title FROM job');      
                while($row = $result->fetch_object()){
                   $indata = $row->j_id;
                   $p = $row->title;
                   echo '<option value="'.$p.'">'.$p.' </option>';
                }
				$result->close();
            ?>

			</p>
				</select>
						<input type="submit" value="Edit Job's Notes"/>
	</fieldset>
</form>	


<form method="post" action="deleteContact.php"> 
		<fieldset>
			<legend>Delete a Contact </legend>
			<p>First Name 
				<select name="deleteFname">			
					 <?php
            $result = $mysqli->query('SELECT  fname FROM contact');      
                while($row = $result->fetch_object()){
                   $indata = $row->c_id;
                   $p = $row->fname;
                   echo '<option value="'.$p.'">'.$p.' </option>';
                }
				$result->close();
            ?>
			</select>	
			Last Name
				<select name="deleteLname">			
					 <?php
            $result = $mysqli->query('SELECT  lname FROM contact');      
                while($row = $result->fetch_object()){
                   $indata = $row->c_id;
                   $p = $row->lname;
                   echo '<option value="'.$p.'">'.$p.' </option>';
                }
				$result->close();
            ?>
				</select>	
				<input type="submit" value="Delete Contact"/>
				</p>
	</fieldset>
	
	
	
</form>	




	

</body>
</html>