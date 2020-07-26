<?php
include ('DB/dbhandler.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exporting - Importing - Adding - Ajax</title>
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
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Student Summary Report</span>
    </nav>
    <div class="container mt-0">
        <div class="card">
            <div class="card-body bg-secondary">
                <h1 style="color:white;"> STUDENTS MANAGEMENT </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class ="card bg-gradient-dark">
            <div class = "card-body col-lg-12">
                <form class="form-group form-inline">
                    <form class="my-2" method="post">
                        <input class="form-control mr-sm-2 col-lg-4" type="search" id="search" placeholder="Buscar..." aria-label="Search">
                    </form>
                    <form method="post" action="export.php">
                        <button type="submit" name="report" class="btn btn-info mt-0 mb-1"><i class="fas fa-download"></i></button>
                    </form>
                    <button type="submit" name="add" class="btn btn-success mt-0 mb-1"><i class="fas fa-user-plus"></i></button>
                </form>
            </div>
            <div class ="col-lg-12">
                <table class="table table-hover" id="result_table"></table>
            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data" id="filesForm">
                    <div class="col-md-5">
                        <input class="form-control" type="file" name="file">
                    </div>
                    <div>
                        <button type="button" onclick="uploadfile()" class="btn btn-secondary form-control col-sm-1"><i class="fas fa-upload"></i></button>
                    </div>
                 </form>
            </div>
            
        </div>
    </div>
<script>
    function uploadfile()
{

    var Form = new FormData($('#filesForm')[0]);
    $.ajax({

        url: "import.php",
        type: "POST",
        data : Form,
        processData: false,
        contentType: false,
        success: function(data)
        {
            alert('Rgeisters Succesfully added!');
        }
    });
};

</script>
</body>
</html>