<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
  <style>
 /* define a fixed width for the entire menu */
.navigation {
  width: 300px;
}

/* reset our lists to remove bullet points and padding */
.mainmenu, .submenu {
list-style-type: circle;
  padding: 0;
  margin: 0;
}

/* make ALL links (main and submenu) have padding and background color */
.mainmenu a {
  display: block;
  background-color: #2c3e50;
  text-decoration: none;
  padding: 10px;
  color: white;
  border-bottom: double;}

/* add hover behaviour */
.mainmenu a:hover {
    background-color: #C5C5C5;
}


/* when hovering over a .mainmenu item,
  display the submenu inside it.
  we're changing the submenu's max-height from 0 to 200px;
*/

.mainmenu li:hover .submenu {
  display: block;
  max-height: 200px;
}

/*
  we now overwrite the background-color for .submenu links only.
  CSS reads down the page, so code at the bottom will overwrite the code at the top.
*/

.submenu a {
  background-color: #999;
  color:black;
}

/* hover behaviour for links inside .submenu */
.submenu a:hover {
  background-color: #666;
  color:white;
}

/* this is the initial state of all submenus.
  we set it to max-height: 0, and hide the overflowed content.
*/
.submenu {
  overflow: hidden;
  max-height: 0;
  -webkit-transition: all 0.5s ease-out;
} 
  
.DataImage {
    position: relative;
    text-align: center;
    color: black;
	font-weight: bold;
		font-size:20px;		
}
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
  </head>

  <body style="font-family: Verdana;font-size:16px;">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="collegelogo.png" alt="attendance" style="width:40px;height:50px;" align="left">
       
	   <a class="navbar-brand" href="#">THE OXFORD COLLEGE OF SCIENCE</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Facultyprofile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
			  <li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">My Profile Settings</a>
				<div class="dropdown-content">
				  <a href="faculty_profile.html">Edit Profile</a>
				  <a href="MySubjects.html">My Subjects</a>
				  <a href="changepassword.php">Change Password/Username</a>
				</div>
			  </li>
            </li>
 
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
			 <a class="nav-link" href="logout.php">Log Out</a>

          </form>
        </div>
      </nav>
    </header>

<!--- Include Header.html -->

<div class="container-fluid">
      <div class="row">
		<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
			<ul class="mainmenu nav nav-pills flex-column">
				<li class="nav-item">
					  <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
				 </li>
				<li class="nav-item"><a class="nav-link"href="FacultyEnroll.html">Subjects</a></li>
				
				<li class="nav-item"><a class="nav-link"href="">Attendance</a>
				  <ul class="submenu">
					<li><a href="theory.php">Theory Attendance</a></li>
					<li><a href="Lab_Attendance.php">Lab Attendance</a></li>
					<li><a href="ViewAttendance.php">View Attendance</a></li>
					
				  </ul>
				</li>
				<li><a href="ViewTimetable.html">Timetable</a></li>
				<li><a href="SemesterReport.php">Attendance Report</a></li>
				<li><a href="fact_msg.php">Messages</a></li>

			</ul>          
          
        </nav>                    
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

<?php
$SrNo = $_GET['SrNo'];

$get_msg="select * from notification where SrNo='$SrNo'";
$res_msg=mysqli_query($connection,$get_msg);
$row_msg = mysqli_fetch_assoc($res_msg);
$Message=$row_msg['Message'];
$Topic=$row_msg['Topic'];
$Date=$row_msg['Date'];
$Time=$row_msg['Time'];
$Sender=$row_msg['Sender'];

echo "<div style=''>";
echo "<div style=''>";
echo "<h3 style='margin-left:10px;'><b>$Topic</b></h3>";
echo "<h6 style='margin-left:10px;'>By: $Sender</h6>";
echo "<h6 style='margin-left:10px;'>Date and Time:$Date $Time</h6>";
echo "<hr>";

echo "</div>";
echo "<h3 style='margin-left:10px;'>Message:</h3>";
echo "<h5 style='margin-left:10px;'>$Message</h5>";
echo "<br><br><br>";
echo "</div>";
/*date_default_timezone_set('Asia/Kolkata');
$date = date('g:i:a');
echo $date;*/
?>