<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password)){

        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: home.php");
                    die;
                }
            }
        }
        }
    } else{
        echo "Please enter information.";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Capstone</title>
    <link rel="stylesheet" href="csss/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="background-video">
        <video autoplay muted loop style="object-fit: cover; width: 100%; height: 100%;">
            <source src="https://packaged-media.redd.it/lpb2um45asv41/pb/m2-res_1080p.mp4?m=DASHPlaylist.mpd&v=1&e=1707336000&s=efb9f19d0d1d86c77c1e1be096caf274b1b7456e#t=0" type="video/mp4">
            ERROR LOADING MEDIA
        </video>
    </div>
    <div class="wrapper">
        <form id="loginForm" method="POST" action="login.php">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" id="loginUsername" name="user_name" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" id="loginPassword" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Log in</button>

            <div class="register-link">
                <p>Don't have an account?
                    <a href="register.php">Register here!</a>
                </p>
            </div>
        </form>
    </div>

</body>

</html>
