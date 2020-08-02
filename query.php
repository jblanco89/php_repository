<?php
include ('DB/dbhandler.php');
$table = "";
$query = "SELECT * FROM alumnos ORDER BY id_alumno ASC";


if(isset($_POST['alumnos']))
{
    $q=$conn->real_escape_string($_POST['alumnos']);
	$query="SELECT * FROM alumnos WHERE 
		id_alumno LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		carrera LIKE '%".$q."%' OR
		grupo LIKE '%".$q."%' OR
		fecha_ingreso LIKE '%".$q."%'";
}
{
    $alumnos = $conn->query($query);
    if ($alumnos->num_rows > 0){
        $table .=
            '<tbody class="col-lg-12">
                <tr>
                    <th>Student ID</th>
                    <th>Name </th>
                    <th>Career</th>
                    <th>Group</th>
                    <th>Admission Date</th>
                </tr>';
            while ($result = $alumnos->fetch_assoc())
            {
                $table .=
                '<tr>
                        <td>'.$result['id_alumno'].'</td>
                        <td>'.$result['nombre'].'</td>
                        <td>'.$result['carrera'].'</td>
                        <td>'.$result['grupo'].'</td>
                        <td>'.$result['fecha_ingreso'].'</td>
                </tr>';
            }
            $table.= '</tbody>';
    } 
    else 
    {
        $table= "<h3>RESULTS NO FOUND.</h3>";
    }
};
echo $table;
?>