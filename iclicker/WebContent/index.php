
<html>
    <head>
        <title>
            Iclicker Content
        </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/QClicker.png" type="image/icon type">
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
        />
        <link rel = "stylesheet" href = "css/index.css">
    </head>
    <body>
        <div class = "Title"> 

           <h2> <image src = "images/QClicker.png" class = "logo" alt ="icon">  QClicker - Courses made easier </h2>
        </div>
        <header>
        <?php

            if(isset($_SESSION['username']))
            {
                echo '<nav>';
                echo '<ul>';

                echo '<li><a href="validation/logout.php">Log Out</a></li>';
                echo '<li><a href="#">Profile</a></li>';
                echo '</ul>';
                echo '</nav>';
            }
            else{
                echo '<nav>';
                echo '<ul>';
                echo '<li>';
                echo 'Create An Account
                <ul>
                  <li><a href="signup/instructor.php">Instructor</a></li>
                  <li><a href="signup/student.php">Student</a></li>
                </ul>
              </li>';

              echo '<li>';
              echo 'Login
              <ul>';
                echo '<li><a href="login/student.php"> Student</a></li>';
                echo '<li><a href="login/instructor.php">Instructor</a></li></ul>';
                echo '</ul>';
                echo '</nav>';
                
            }


        ?>
        <br> <br><br>
        </header>
    </body>
</html>