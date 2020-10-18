
<section class = "signup-form">
    <h2> Sign Up </h2>
    <div class ="signup-form-form">
        <form action = "includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="E-mail...">
            <input type="text" name="uid" placeholder="Unsername...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up </button>
        </form>
    </div>
</section>

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