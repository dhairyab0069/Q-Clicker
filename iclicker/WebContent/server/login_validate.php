<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Check which form was submitted (student or instructor)
    if (isset($_POST['user_type']) && $_POST['user_type'] === 'student') 
    {
        $prefix = '1'; // Set prefix for student login 
    } 
    else 
    {
        $prefix = '9'; // Set prefix for instructor login 
    }

    // Getting data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['user_type'] = $_POST['user_type'];

    if (!empty($username) && !empty($password)) 
    {
        $host = 'localhost';
        $dbusername = 'dhairya';
        $dbpassword = 'db19082002';
        $dbname = 'iclicker';
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

        // Checking for connection
        if(!$conn)
        {
            die("Connection Failed".mysqli_connect_error());
        }

        // Checking whether user exists
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
            // User exists, set session variables and redirect to dashboard
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: ../dashboard.php?user_id=".$row['user_id']);
            exit();
        } 
        else 
        {
            // User does not exist, show error message
            echo "<h1>".$username."</h1><br>";
            echo "Invalid username or password";
        }
    }
    else
    {
        echo 'Please enter your username and password.';
    }
}

?>

