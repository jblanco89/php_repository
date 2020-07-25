<?php
include ('DB/dbhandler.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exporting - Ajax</title>
    <!-- Styles ------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <!-- Scripts --->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/functions.js"></script>

</head>


<body class="col-md-12">
    <div>
    
    </div>
    <div class="container mt-0">
        <div class="card">
            <div class="card-body bg-secondary">
                <h1 style="color:white;"> RESULT TABLE </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class ="card bg-gradient-dark">
            <div class = "card-body col-lg-12">
                <form class="form-inline my-2 my-lg-2">
                    <input class="form-control mr-sm-2 col-lg-4" type="search" id="search" placeholder="Nombre..." aria-label="Search">
                </form>
            </div>
            <div class ="col-lg-12">
                <table class="table table-hover" id="result_table"></table>
            </div>
        </div>
        <div class="mt-2" style="display:block;">
            <form method="post" action="addstudent.php">
                <button type="submit" name="add" class="btn btn-success mt-0 mb-1 col-lg-3"><i class="fas fa-user-plus"></i>ADD STUDENT</button>
            </form>
            <form method="post" action="export.php">
                <button type="submit" name="report" class="btn btn-info mt-0 mb-3 col-lg-3"><i class="fas fa-download"></i> SUMMARY REPORT</button>
            </form>
        </div>

    </div>

</body>
</html>