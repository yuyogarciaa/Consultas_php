<!-- eliminar . php -->
<?php
include('conexion.php');
$query= "delete from employees where employeeid={$_POST['empId']}";
$result= $connection->query($query);
if (!$result){
echo("No se ha podido realizar la consulta!");
exit();
}
$connection->close();
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'portada.php';
header ("Location:http://$host$uri/$extra");
exit;
?>