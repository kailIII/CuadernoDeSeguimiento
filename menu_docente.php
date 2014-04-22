<?php
session_start(); // inicio sesion para poder jalar las variables pasadas por el login
?>
<html>
<head>
<title>MENU DOCENTE</title>
</head>
<body>

<?php if($_SESSION['id_tipo_usuario']) {// verifico que se haya pasado alguna variable del login caso contrario muestro mensaje para regresar ?> 
Bienvenido <?php echo $_SESSION['nom_usuario']; 
echo '<br>'; // muestro mensaje y menus 
echo '<table align="center">';
echo '<tr><td><a href="cuad_teoria.php">CUADERNO DE TEORIA Y PRACTICA</a></td></tr>'; // link a los cuadernos
echo '<tr><td><a href="cuado_practica.php">CUADERNO DE LABORATORIO</a></td></tr>';
echo '</table>';

?> 

<br>Haz click aca para  <a href="logout.php" tite="Logout">Salir.
<?php
}
	else{
	echo 'contenido protegido<br>'; // mensaje mostrado si se quiere entrar por otras partes
	echo '<a href="index.php">Click aca para regresar<a>'; // link para volver a la pagina inicial
}
?>

</body></html>