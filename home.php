<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="csss\homestyle.css">

</head>

<body>
    <div class="background-image">

    </div>

    <div class="gradesheet">
        <a href="#" style="--clr:#1e9bff"><span>Gradesheet</span></a> 
    </div>

    <div class="support">
        <a href="https://support.google.com/websearch/answer/11181469" style="--clr:#1e9bff"><span>Need Help?</span></a>
    </div>

    <div class="mentalsupport">
        
    </div>

    <button type="button" class="btn"><a href="login.php">Go Back to Login Page</a></button>
</body>
</html>