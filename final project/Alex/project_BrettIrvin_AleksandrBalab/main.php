<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","balaba-db","e3zrCMTKu2uZxI0p","balaba-db");
if($mysqli->connect_errno){
echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Job Application </title>
</head>
<body>

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

<div class="welcome">
    <p>
    <h2>Welcome to Job Application Database <p><h4>by Brett Irvin and Aleksandr Balab</h4></p></h2><hr><hr>
    </p>
	<h3>Short Description</h3>
	<p>For our 340 project, we chose to construct a database of jobs that we have applied to.  As computer science students, we will likely apply to several jobs before being hired.</p>
   <p>	This database will help us keep a close eye on the job applications and their status. It will serve as a fast reference if we need to react on a professional email or a phone call.  </p>
    <p>Additionally it should keep everything organized and will help us out with follow up calls.</p>
	<hr><hr>
</p>
</div>

<div class="boxed">
<div class="rightDec">
    <div class="banner">
      <h2>Final Project Navigation</h2>
    </div>
    <div class="rightText">
      <p>
        The navigation bar at the top of the screen links to each required section for the final project.
      </p>
      <p>
        If you're searching for a specific requirement, they can be found as follows:
        <p>
        <ul>
          <li>Add Your Own Info : Add information to every table </li>
            <ul>
              <li>Job can be added to in "Add a new Job application" sections"</li>
			   <li>Each table information can be added with the confirmation page  </li>
              <li> Source table  must be filled out for a proper job search </li>
            </ul>
          </p>

          <p>
          <li>Basic Search : Seach for a piece of user entered information from every</li>
            <ul>
              <li> Will show most important information about all jobs that are already in the database </li>
			  <li> Filter by Job industry- will produce all jobs that belong to a user specified industry </li>
			  <li> Filter Employment option- will produce all jobs that require specific experience</li>
		  	  <li> Filter Application Status- will produce all jobs with specific current status</li>
			  <li> Filter Jobs by salary will produce jobs with specific salaray </li>
            </ul>
          </p>

		     <p>
          <li>Complex Search : search for a job that with specific salary and <b>is not</b> Part-time/Full-time/Internship</li>
            <ul>
              <li> Filter Jobs by Salary and Location, Industry - Will use narrow search criteria for job application </li>
			  <li> Filter Jobs by Source . This is many to many table relationship. It will produce all jobs with specific employment option that were found in user specified source </li>
			  <li> Number of Jobs per Source - will show how many jobs were published per specific source </li>
			  <li> Average Salary by Industry - will show how the Average salaray by industry</li>
            </ul>
          </p>
		  
  <li> Edit a job </li>
            <ul>
              <li> Edit Job's Status will allow to change the status of the application  </li>
			   <li> Edit Job's Notes will allow to change the notes of the application  </li>
			  <li> Edit Job's Title will allow to change the title of the application </li>
			  <li> Delete a contact will delete the contact , it uses  ON DELETE SET NULL ON UPDATE CASCADE </li>
            </ul>
			
        </ul>
      </p>
    </div>
  </div>
</div>

</div>




</body>
</html>