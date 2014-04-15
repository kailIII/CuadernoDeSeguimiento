<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "seguimiento";

$conexion = mysql_connect($server,$user,$password);
mysql_select_db($db,$conexion);
?>