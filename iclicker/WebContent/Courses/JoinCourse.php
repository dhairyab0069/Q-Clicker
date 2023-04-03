<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<head>
<link rel ="stylesheet" href = "css/JoinCourse.css">
    <title>Create Course</title>
    
</head>
<body>
    <h1>Join Course</h1>
    <form method="post" action ="JoinProcess.php">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>
        <br><br>
        <input type="submit" value="Join Course">
    </form><br><br>
    <a href = "../dashboard/studentD.php">[Go Back]</a>
</body>
</html>