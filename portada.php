<?php
echo "<html>";
echo "<head>";
echo "<title>Base de Datos Northwind con MySQL </title>";
echo "<meta http-equiv ='content-type' content ='text/html;
charset=utf-8'>";
echo "<link rel='stylesheet' type ='text/css'href = 'css/portada.css'/>";
echo "</head >";
echo "<body>";
echo "<br>";
echo "<center>";
echo "<h1>Base de Datos Northwind con MySQL</h1>";
echo "<h2>Altas de Empleados &nbsp; <a href=altaEmpleado.php>
<img src=icon/add.png width='43'>
</a></h2>";
echo " </center>";
include ('conexion.php');
$query = "select E.employeeid,E.portfile, E.firstname, E.lastname,
T.Descripcion as title from employees E join title T on E.titleid =
T.titleid order by E.employeeid";
$result = $connection -> query($query);
if (!$result) {
echo("No se ha podido realizar la consulta!");
exit();
}
$nrows=$result-> num_rows;
$connection->close ();
echo "<center>";
echo "<table class='content-table'>";
echo "<tr class='primer' height='80'>";
echo "<th width='50'>No </th >
<th width = '150'> Portfile</th>
<th width = '300'> FirstName</th>
<th width = '400'> LastName</th>
<th width = '250'> Title</th>
<th width = '150'> Modificar</th>
<th width = '150'> Eliminar</th>";
echo "</tr>";
for ($i =0; $i <$nrows ; $i++) {
$result -> data_seek ($i);
$row = $result -> fetch_assoc ();
echo "<tr height ='60'>";
echo "<td>", $i +1, "</td >";
?>
<td><img width="64" src="data:image/png;base64,<?php
echo base64_encode($row['portfile']); 
?>"/></td>
<?php  
echo "<td>", $row ['firstname'], "</td >";
echo "<td>", $row ['lastname'], "</td >";
echo "<td>", $row ['title'], "</td >";
echo "<td>
<a href=cambioEmpleado.php?empId={$row['employeeid']}>
<img src='icon/modify.png' width ='35'>
</a></td>";
echo "<td>
<a href=bajaEmpleado.php?empId={$row['employeeid']}>
<img src='icon/delete.png' width='35'>
</a></td>";
}
echo "<tr class='num' height='80'>
<th colspan ='7'> Total de registros: ",($nrows),
"</th ></tr>";
echo " </table>";
echo " </center>";
echo " </body>";
echo " </html>";
?>


