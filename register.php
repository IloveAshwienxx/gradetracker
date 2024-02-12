<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password)){
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values('$user_id','$user_name','$password')";

        mysqli_query($con,$query);

        header("Location: login.php");
        die;
    } else{
        echo "Please enter information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="csss/regstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="background-video">
        <video autoplay muted loop style="object-fit: cover; width: 100%; height: 100%;">
            <source src="https://packaged-media.redd.it/lpb2um45asv41/pb/m2-res_1080p.mp4?m=DASHPlaylist.mpd&v=1&e=1707336000&s=efb9f19d0d1d86c77c1e1be096caf274b1b7456e#t=0" type="video/mp4">
            iror
        </video>
    </div>
    <div class="wrapper">
    <form id="registrationForm" action="register.php" method="POST">
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" id="registerUsername" name="user_name" placeholder="Enter Username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" id="registerPassword" name="password" placeholder="Enter Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="agreement">
                <label><input type="checkbox" id="agreeCheckbox">Agree to <a href="agreement.html"> our terms and conditions </a></label>
            </div>

            <button type="submit" class="btn">Sign Up</button>

            <div class="register-link">
                <p>Already have an account?
                    <a href="login.php">Login here!</a>
                </p>
            </div>
        </form>
    </div>

</body>

</html>