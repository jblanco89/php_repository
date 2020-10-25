<?php
if (isset($_POST["submit"])) {
    $username = $_POST["uid"]; // it does not matter if user gives us email or username. It's going to work in the same.
    $pwd = $_POST["pwd"];

    require_once '../DB/dbhandler.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location:../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location:../login.php");
    exit();
}

