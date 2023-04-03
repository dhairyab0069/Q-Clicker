<?php
session_start();
if (isset($_GET['course_name'])) {
    $course_name = $_GET['course_name'];
    // Store course name in a session
} else {
    // Redirect to the previous page if course name is not provided
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
<html>
<body>
<title>Qclicker System</title>
<div class = "course_name"><h1><?php  echo  $course_name ?></h1></div>
<div class = "statistics"><h3><i><b>Statistics</b></i></h3></div>
<div class = "attendance"><h3><i>Attendance</i></h3></div>
</BODY>
</html>