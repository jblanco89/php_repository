<?php
include ('DB/dbhandler.php');

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column Index
$columnName = $_POST['columns'][$columnIndex]['data'];//column name
$columnSortOrder = $_POST['order'][0]['dir']; //
$searchValue = $_POST['search']['value'];

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (id_alumno like '%".$searchValue."%' or 
        nombre like '%".$searchValue."%' or 
        carrera like'%".$searchValue."%' or
        grupo like '%".$searchValue."%')";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"SELECT count(*) as allcount from alumnos");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"SELECT count(*) as allcount from alumnos WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT * FROM alumnos WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "id_alumno"=>$row['id_alumno'],
      "nombre"=>$row['nombre'],
      "carrera"=>$row['carrera'],
      "grupo"=>$row['grupo'],
      "fecha_ingreso"=>$row['fecha_ingreso']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);

?>