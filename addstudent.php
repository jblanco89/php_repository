<?php
include ('DB/dbhandler.php');

$id = $_POST['id'];
$name = $_POST['name'];
$career = $_POST['career'];
$group = $_POST['group'];
$dateAdmission = $_POST['dateAdmission'];

$sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo, fecha_ingreso) 
            VALUES ('$id','$name','$career','$group','$dateAdmission')";

mysqli_query ($conn, $sql);

?>