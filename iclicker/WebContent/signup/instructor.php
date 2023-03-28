<?php
session_start();
?>
<html>
    <head>
    <link rel = "stylesheet" href = "../css/create.css">
    <link rel="icon" href="../images/QClicker.png" type="image/icon type">
        <title>Instructor Sign Up</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="../images/QClicker.png" type="image/icon type">
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
        />
        
    </head>
    <body>
    <div class="content">
        <form method="post"  action = '../server/create_validate.php'>
            <input type="hidden" name="user_type" value="instructor">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="name">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

           

            <button type="submit">Sign up</button>
        </form>


    </div>
    </body>
