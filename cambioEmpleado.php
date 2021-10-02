<!-- cambioEmpleado . php -->
<?php
$p1 = $_GET['empId'];
if (strlen($p1) == 0) {
header ("Location: portada.php");
exit ;
}
echo "<html>";
echo "<head>";
echo "<title>Cambios de Empleados</title>";
echo "<link rel='stylesheet' type='text/css' href='css/cambio.css'/>";
echo "</head>";
echo "<body>";
echo "<form name='formulario' action ='modificar.php'
method='post' enctype='multipart/form-data'>";
echo "<center>";
echo "<h1>Cambios de Empleados</h1>";
echo "</center>";
include('conexion.php');
$query = "select employeeid, portfile, firstname, lastname, titleid
from employees where employeeid =".$p1.";";
$result = $connection->query($query);
if (!$result){
echo("No se ha podido realizar la consulta!");
exit;
}
$row = $result->fetch_assoc();
$connection ->close();
echo "<input type ='hidden' name='empId' value ='",$p1,"'>";
echo "<center>";
echo "<table class='content-table'>";
echo "<tr  class='primer' height ='80'>";
echo "<td>&nbsp;&nbsp;Datos del Empleado&nbsp;&nbsp;</td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
?>
<td><img width="150" src="data:image/png;base64,<?php
echo base64_encode($row['portfile']); 
?>"/><br><input  class="files" type=file REQUIRED name="portfile"></td>
<?php
echo "</tr>";
echo "<tr height ='60'>";
echo "<td class='p'>FirstName:<br>
<input type='text' name='firstname' value ='",
$row ['firstname'],"'</td >";
echo "</tr>";
echo "<tr height='60'>";
echo "<td class='p'>LastName:<br>
<input type='text' name='lastname' value='",
$row['lastname'],"'></td >";
echo "</tr>";
echo "<tr height='60'>";
echo "<td class='p'>TitleID:<br>
<input type ='text' name='titleid' value='",
$row['titleid'],"'></td>";
echo "</tr>";
echo "<tr  class='num' height='80'>";
echo "<td><input class='boton' type='submit' value='Cambiar'>
</td>";
echo "</tr>";
echo "</table>";
echo "</center>";
echo "</form>";
echo "</body>";
echo "</html>";
?>
