<?php
include ('DB/dbhandler.php');
$fileStudent = $_FILES['file']; 
$fileStudent = file_get_contents($fileStudent['tmp_name']); 

$fileStudent = explode("\n", $fileStudent);
$fileStudent = array_filter($fileStudent); 

// Turning out into Array
foreach ($fileStudent as $student) 
{
	$StudentList[] = explode(",", $student);
}

// Inserting Students
foreach ($StudentList as $studentData) 
{
	$conn->query("INSERT INTO alumnos 
										(id_alumno,
										nombre,
										carrera,
										grupo,
										fecha_ingreso)
										VALUES
										(
										'{$studentData[0]}',
										'{$studentData[1]}', 
										'{$studentData[2]}',
										'{$studentData[3]}',
										'{$studentData[4]}'
										)

										"); 
}

?>