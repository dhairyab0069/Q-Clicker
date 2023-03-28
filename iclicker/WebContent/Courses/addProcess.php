<?php
session_start();
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// connect to the database
$servername = "localhost";
$dbusername = "dhairya";
$dbpassword = "db19082002";
$dbname = "iclicker";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the instructor's ID from the session
$instructor_id = $_SESSION['user_id'];

// get the course name from the form
$course_name = $_POST['course_name'];

$sql = "SELECT MAX(course_id) AS max_id FROM Courses";
$result = mysqli_query($conn, $sql);
$max_id = mysqli_fetch_assoc($result)['max_id'];

// increment the maximum value to get a unique course_id
$new_id = $max_id + 1;

// add the course to the database
$sql = "INSERT INTO Courses (course_id, instructor_id, course_name) VALUES ($new_id, '$instructor_id', '$course_name')";

if (mysqli_query($conn, $sql)) {
    echo "Course created successfully!";
    header("../dashboard/InstrucD.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close the connection
mysqli_close($conn);
?>