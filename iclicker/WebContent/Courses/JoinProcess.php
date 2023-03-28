<?php
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

// get the course name from the form
$course_name = $_POST['course_name'];

// retrieve the course id from the Courses table
$sql = "SELECT course_id FROM Courses WHERE course_name = '$course_name'";
$result = mysqli_query($conn, $sql);

// check if the course exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $course_id = $row["course_id"];
    
    // get the user id from the session
    $user_id = $_SESSION['user_id'];
    
    // insert the enrollment into the enrollments table
    $enrollment_date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO enrollments (enrollment_id, user_id, course_id, enrollment_date) VALUES (NULL, '$user_id', '$course_id', '$enrollment_date')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Enrollment successful!";
        header("Location: ../dashboard/StudentD.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: Course not found.<br><a href ='JoinCourse.php'>Go Back </a>";
}

// close the connection
mysqli_close($conn);
?>
