<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Styles ------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=css/style.css>
    
    <!-- Scripts --->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!--<script src="js/functions.js"></script>-->

   <body class="col-md-12 bg-primary">
    <center><section class="card" style="width: 55em; margin-top:100px;">
        <h3 class="card-title bg-dark text-white">USER LOG IN</h3>
            <div class="card-body" style="display:inline-flex;">
                <div class="col-md-4">
                <img style="width: 250px; height:250px;" src="img/myaccount.png" alt="login">
                </div>
                <div class ="form-group col-md-8">
                    <form class = "" action = "includes/login.inc.php" method="post">
                        <input class="form-control mb-3" style="border-radius:15px;" type="text" name="uid" placeholder="Unsername/Email...">
                        <input class ="form-control mb-3" style="border-radius:15px;" type="password" name="pwd" placeholder="Password...">
                        <button class = "btn btn-primary mt-2 col-md-12" style="border-radius:15px;" type="submit" name="submit">Log In</button>
                        <button class = "btn btn-primary mt-2 col-md-12" style="border-radius:15px;" type="submit" name="submit">Log In with Facebook</button>
                        <button class = "btn btn-danger mt-2 col-md-12" style="border-radius:15px;" type="submit" name="submit">Log In with Google</button>
                    </form>
                </div>

            </div>
    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
        echo "<p class='p-1 mb-2 bg-danger text-white' >Fill all the fields</p>"; 
        }
        elseif ($_GET["error"]== "wronglogin") {
            echo "<p class='p-1 mb-2 bg-warning text-dark'>Incorect login information</p>";
        }
        elseif ($_GET["error"]== "userdoesnotexist") {
            echo "<p class='p-1 mb-2 bg-warning text-dark'>user or email does not exist</p>";
        }
    }

    ?>
    </section></center>
</body>

