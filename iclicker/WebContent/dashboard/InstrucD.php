<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	$servername = "localhost";
    $dbusername = "dhairya";
    $dbpassword = "db19082002";
    $dbname = "iclicker";
    $conn = mysqli_connect("localhost", "$dbusername", "$dbpassword", "$dbname");

    // check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	// get the instructor's ID from the session
	$instructor_id = $_SESSION['user_id'];

	// retrieve the courses being taught by the instructor
    $sql = "SELECT course_name FROM Courses WHERE instructor_id = $instructor_id";
    $result = mysqli_query($conn, $sql);

    // get the number of courses being taught by the instructor
    $num_courses = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Instructor Dashboard</title>
	<link rel ="stylesheet" href = "../css/dashboard.css">
	<link rel="icon" href="../images/QClicker.png" type="image/icon type">
	
</head>
<body>
	<h1>Welcome!</h1>
	

	<p>You are currently teaching <?php echo $num_courses; ?> courses.</p>
	<h2>Your Courses</h2>
	<button onclick="location.href='../Courses/addCourse.php'">Add Course</button>
	<table> 
		<tr>
			<th>Course Name</th>
		</tr>
		<?php
		

  		// connect to the database
		  $servername = "localhost";
		  $dbusername = "dhairya";
		  $dbpassword = "db19082002";
		  $dbname = "iclicker";
  		$conn = mysqli_connect("localhost", "$dbusername", "$dbpassword", "$dbname");

  		// check if the connection was successful
  		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
  		}

  		
  		

  		// retrieve the courses being taught by the instructor
  		$sql = "SELECT course_name FROM Courses WHERE instructor_id = $instructor_id";
  		$result = mysqli_query($conn, $sql);

  		// display the courses in a table
  		while ($row = mysqli_fetch_assoc($result)) {
    		echo "<tr><td>" . $row['course_name'] . "</td></tr>";
  		}

  		// close the  connection
  		mysqli_close($conn);
		?>

	</table>
	
	<a href="../logout.php">Log Out</a>
</body>
</html>
