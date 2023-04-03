<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables with empty values
$name = $username = $email = $password = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate name
  if (empty($_POST["user_type"])) {
    $user_typeErr = "User type is required";
  } else {
    $user_type = test_input($_POST["user_type"]);
  }

  // Validate username
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // Check if username only contains alphanumeric characters and underscore
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
      $usernameErr = "Only letters, numbers, and underscore allowed";
    }
  }

  // Validate email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Validate password
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  // If there are no errors, add the data to the database
  if (empty($user_typeErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
    
    // Create a connection to the database
    $servername = "localhost";
    $dbusername = "dhairya";
    $dbpassword = "db19082002";
    $dbname = "iclicker";
    

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert the data into the database
    
    //creating a user id
    $user_id = "";
    if ($user_type == "student") {
        $query = "SELECT COUNT(*) FROM users WHERE user_id BETWEEN 1000 AND 1999";
        $result = $conn->query($query);
        $row = $result->fetch_row();
        $count = $row[0];
        $user_id = 1000 + $count + 1;
    }
    else{
        $query = "SELECT COUNT(*) FROM users WHERE user_id BETWEEN 9000 AND 9999";
        $result = $conn->query($query);
        $row = $result->fetch_row();
        $count = $row[0];
        $user_id = 9000 + $count + 1;

    }
    $sql = "INSERT INTO users (user_id, username, email, password) VALUES ('$user_id', '$username', '$email', '$password')";

    
    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        // Store the user_id in the session and redirect to success page
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        header('Location: ../dashboard.php');
        exit;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      

    $stmt->close();
    $conn->close();
  }
}

// Function to validate input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
