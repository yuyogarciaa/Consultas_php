<!-- bajaEmpleado . php -->
<?php
$p1 = $_GET['empId'];
if (strlen($p1) == 0) {
header ("Location:portada.php");
exit ;
}
echo "<html>";
echo "<head>";
echo "<title> Bajas de Empleados </title>";
echo "<link rel='stylesheet' type ='text/css'
href = './css/baja.css'/>";
echo "</head>";
echo "<body>";
echo "<form name='formulario' action ='eliminar.php'
method ='post'>";
echo "<center>";
echo "<h1>Bajas de Empleados </h1 >";
echo " </center>";
include ('conexion.php');
$query = " select E.employeeid,E.portfile, E.firstname, E. lastname,
T.descripcion as title from employees E join title T
on E.titleid =T.titleid and E.employeeid =".$p1.";";
$result = $connection->query($query);
if (!$result){
echo ("No se ha podido realizar la consulta!");
exit;
}
$row = $result->fetch_assoc();
$connection->close();
echo "<input type = 'hidden' name='empId' value='",$p1,"'>";
echo "<center>";
echo "<table class='content-table'>";
echo "<tr class='pie' height ='80'>";
echo "<td>&nbsp;&nbsp;Datos del Empleado&nbsp;&nbsp;</td>";
echo "</tr>";
echo "<tr class='p' height ='60'>";
?>
<td><img width="150" src="data:image/png;base64,<?php
echo base64_encode($row['portfile']); 
?>"/></td>
<?php
echo "</tr>";
echo "<tr class='p' height ='60'>";
echo "<td>FirstName:<br>
<input type ='text' name='firstname' value ='",
$row['firstname'],"'disabled></td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
echo "<td>LastName:<br >
<input type ='text' name ='lastname' value ='",
$row['lastname'],"'disabled></td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
echo "<td>TitleID:<br>
<input type='text' name ='title' value='",
$row['title'],"'disabled></td >";
echo " </tr>";
echo "<tr height='80'>";
echo "<td class='num'><input class='boton' type='submit' value='Baja Empleado'></td >";
echo "</tr>";
echo "</table>";
echo "</center>";
echo "</form>";
echo "</body>";
echo "</html>";
?>
