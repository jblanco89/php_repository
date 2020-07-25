<?php
include ('DB/dbhandler.php');

if(isset($_POST['report']))
{
	// CHARSET and File name
	header('Content-Type:text/csv; charset=utf8_general_ci');
	header('Content-Disposition: attachment; filename="Report.csv"');

	// File aoutput
	$output=fopen('php://output', 'w');
	// header
	fputcsv($output, array('Id Alumno', 'Nombre', 'Carrera', 'Grupo', 'Fecha de Ingreso'));
	// report creating..
	$reportCSV=$conn->query("SELECT *  FROM alumnos ORDER BY id_alumno ASC");
	while($RowR= $reportCSV->fetch_assoc())
		fputcsv($output, array($RowR['id_alumno'], 
								$RowR['nombre'],
								$RowR['carrera'],
								$RowR['grupo'],
								$RowR['fecha_ingreso']));

}
?>