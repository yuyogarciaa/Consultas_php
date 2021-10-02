<!-- modificar.php -->
<?php
$host= $_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='portada.php';
$p=addslashes(file_get_contents($_FILES['portfile']['tmp_name']));
$p1=$_POST['firstname']; 
$p2=$_POST['lastname'];
$p3=$_POST ['titleid'];
if(strlen($p1 )==0 || strlen ($p2)==0 || strlen($p3)==0) {
header("Location:http://$host$uri/$extra");
exit;
}
include('conexion.php');
$query = "update employees set portfile='{$p}', firstname ='{$p1}', lastname='{$p2}', titleid ='{$p3}' where employeeid={$_POST['empId']}";
$result = $connection ->query($query);
if(!$result){
echo("No se ha podido realizar la consulta!");
exit();
}
$connection->close();
header("Location:http://$host$uri/$extra");
exit;
?>