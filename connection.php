<?php

$dbhost = "sql6.freemysqlhosting.net";
$dbuser = "sql6683618";
$dbpass = "7g9Rp6kmqd";
$dbname = "sql6683618";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect!");
}