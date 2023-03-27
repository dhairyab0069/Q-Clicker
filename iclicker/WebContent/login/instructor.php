<?php
session_start();
?>
<html>
    <head>
        <title>Instructor Log In</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="../images/QClicker.png" type="image/icon type">
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
        />
        <link rel = "stylesheet" href = "../css/login.css">
    </head>
    <body>
    <div class="content">
        <form name = 'login' method = 'post' >
        <div class="form">
          <img src="../images/qClicker.png" alt="Qclicker" class="logo" />
          <input type="hidden" name="user_type" value="instructor">
          <label class = "login">Instructor Log In </label>
          <input
            type="text"
            id="username"
            name="username"
            class="input-field"
            placeholder="Username"
          />
          <input
            type="password"
            id="password"
            name="password"
            class="input-field"
            placeholder="Password"
          />
          <button type="submit" class="login-button">Log In</button>
          <a href="forgot.php" class="forgot-password-link">Forgot Password?</a>
          <div class="signup-link">
            Don't have an account? <a href="validation_sign_up.php">Sign up</a>
          </div>
        </div>



        </form>
    </div>
    </body>
