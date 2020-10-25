<?php
include 'DB/dbhandler.php';
session_start();
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=css/style.css>
    
    <!-- Scripts --->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!--<script src="js/functions.js"></script>-->


</head>
<body class="col-md-12 bg-primary">
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="collapse navbar-collapse navbar-brand">
            <a class= "nav-link" href="index.php"></a><img src="img/logo.png" alt="logo">
            <ul class="navbar-nav">
                <li><a href="index.php">Home</a></li>
                <?php

                    if (isset($_SESSION["userid"])) {
                        echo '<li><a href="profile.php">Profile</a></li>'; 
                        echo '<li><a href="logout.php">Log Out</a></li>';
                    }
                    else {
                        echo '<li><a href="signup.php">Sign Up</a></li>';
                        echo '<li><a href="login.php">Log In</a></li>';
                    }

                ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-0">
        <div class="card">
            <div class="card-body bg-dark">
                <center><h1 style="color:white;">STUDENTS MANAGEMENT </h1></center>
            </div>
        </div>
    </div>
    <div class="container">
        <div class ="card bg-gradient-dark">
            <div class = "card-body col-lg-12">
                <form class="form-group form-inline mx-1">
                    <form class="" method="post">
                        <input class="form-control mr-sm-2 col-lg-4" type="search" id="search" placeholder="Buscar..." aria-label="Search">
                    </form>
                    <form method="" action="" class="">
                        <button type="button" name="add" id="add" class="btn btn-success" style="width:100px;" data-toggle="modal" data-target="#add_data_Modal"><i class="fas fa-user-plus"></i></button>
                    </form>
                    <form method="post" action="export.php">
                        <button type="submit" name="report" class="btn btn-info" style="width:100px;margin-top:5px;"><i class="fas fa-download"></i></button>
                    </form>
                    
                </form>
            </div>
            <div class ="col-md-12">   
                <table class="table table-hover" id="result_table" name="">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name </th>
                            <th>Career</th>
                            <th>Group</th>
                            <th>Admission Date</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="mb-5">
                <form class="form-inline col-md-6" method="post" enctype="multipart/form-data" id="filesForm">
                    <div class="">
                        <input class="form-control" type="file" name="file">
                    </div>
                    <div>
                        <button type="button" onclick="uploadfile()" class="btn btn-secondary form-control col-lg-12"><i class="fas fa-upload"></i></button>
                    </div>
                 </form>
            </div>
            <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-tile">ADD NEW STUDENT</h4> 
                        </div>
                            <div class="modal-body">
                                <form action="" method="post" id="insert_form">
                                    <label for="">Enter Student ID:</label>
                                    <input type="number" name="id" id="id" class="">
                                    </br>
                                    <label for="">Enter Student Full Name:</label>
                                    <input type="text" name="name" id="name" class="form-control"/>
                                    </br>
                                    <label for="">Enter Student Career:</label>
                                    <select name="career" id="career">
                                        <option value="Ing. Química">Ing. Química</option>
                                        <option value="Ing. Materiales">Ing. Materiales</option>
                                        <option value="Ing. Informática">Ing. Informática</option>
                                        <option value="Administración">Administración</option>
                                    </select>
                                    </br>
                                    <label for="">Enter Student Group:</label>
                                    <input type="text" name="group" id="group">
                                    </br>
                                    <label for="">Select Date of Admission</label>
                                    <input type="date" name="dateAdmission" id="dateAdmission">
                                    </br>
                                    </br>
                                    <input type="submit" value="ADD STUDENT" name="addStudent" id="addStudent" class="btn btn-success col-lg-12" style="display:block;">
                                </form>
                            </div>
                            <div  class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss ="modal">Close</button>
                            </div>
                    </div>
                </div>
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
            //alert('Rgeisters Succesfully added!');
        }
    });
};
$(document).ready(function(){
    $('#insert_form').on('submit',function(event){
        event.preventDefault();
        if($('#name').val()=='')
        {
            alert ("name is required");   
        }
        else if($('#id').val()=='')
        {
            alert ("id is required");
        }
        else if($('#career').val()==''){
            alert ('Career is required');
        }
        else if($('#group').val()==''){
            alert ('Group is requiered');
        }
        else if($('#date').val()==''){
            alert ('Date is required');
        }
        else
        {
            $.ajax({
                url:"addstudent.php",
                method:"POST",
                data:$('#insert_form').serialize(),
                success:function(data)
                {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#result_table').html(data);
                }
            })
        }
    });
});
$(document).ready(function(){
   $('#result_table').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'pagination.php'
      },
      'columns': [
         { data: 'id_alumno' },
         { data: 'nombre' },
         { data: 'carrera' },
         { data: 'grupo' },
         { data: 'fecha_ingreso' },
      ]
   });
});
</script>
</body>
</html>