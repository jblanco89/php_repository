<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
    <center><section class = "card" style="width: 50em; margin-top:100px;">
            <h3 class="card-title bg-dark text-white">NEW USER REGISTER</h3>
            <div class ="form-group col-md-12 p-3">
                <form action = "includes/signup.inc.php" method="post">
                    <input class="form-control mb-3" style="border-radius:15px;" type="text" name="name" placeholder="Full name...">
                    <input class="form-control mb-3" style="border-radius:15px;" type="text" name="email" placeholder="E-mail...">
                    <input class="form-control mb-3" style="border-radius:15px;" type="text" name="uid" placeholder="Unsername...">
                    <input class="form-control mb-3" style="border-radius:15px;" type="password" name="pwd" placeholder="Password...">
                    <input class="form-control mb-3" style="border-radius:15px;"type="password" name="pwdrepeat" placeholder="Repeat password...">
                    <button class = "btn btn-primary mt-2 col-md-10" style="border-radius:15px;"type="submit" name="submit">Sign Up </button>
                </form>
            </div>
            <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields</p>"; 
            }
            elseif ($_GET["error"]== "invaliduid") {
                echo "<p>Choose a proper username</p>";
            }
            elseif ($_GET["error"]== "invalidemail") {
                echo "<p>Choose a proper email address</p>";
            }
            elseif ($_GET["error"]== "passworddontmatch") {
                echo "<p>Password a does not match!</p>";
            }
            elseif ($_GET["error"]== "stmtfailed") {
                echo "<p>Something went wrong, try again!</p>";
            }
            elseif ($_GET["error"]== "usernametaken") {
                echo "<p>Username already taken, please try another</p>";
            }
            elseif ($_GET["error"]== "none") {
                echo "<p>You have succesfully signed up!</p>";
            }
        }

        ?>
    </section></center>

</body>