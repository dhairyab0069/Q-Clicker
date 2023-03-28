<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <title> Student</title>
        <link rel = "stylesheet"href = "../css/dashboard.css">
        <link rel="icon" href="../images/QClicker.png" type="image/icon type">
    </head>
    <body>
<?php
// Connect to database
$host = 'localhost';
$dbusername = 'dhairya';
$dbpassword = 'db19082002';
$dbname = 'iclicker';
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get user's enrollments
$sql = "SELECT  courses.course_name 
        FROM enrollments 
        INNER JOIN courses ON enrollments.course_id = courses.course_id 
        WHERE enrollments.user_id = $user_id";
$result = mysqli_query($conn, $sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Display user's enrollments in a table
echo "<h1>My Enrollments</h1>";
echo "<table>";
echo "<tr><th>COURSES</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['course_name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close database connection
mysqli_close($conn);
?>
<a href ="../logout.php"> Log Out> </a>
</body>
</html>