<?php
session_start(); //inicio sesion para usar variables de sesion
?>
<html>
<head>
<title>MENU ESTUDIANTES</title>
</head>
<body>
<?php if($_SESSION['id_tipo_usuario']) { //verifico que se haya iniciado sesion mediante la existencia de una variable de sesion ?>
Bienvenido <?php echo $_SESSION['nom_usuario']; 
echo '<br>';
echo '<table align="center">';
echo '<tr><td><a href="test1.php">Estilos de aprendizaje PNL</a></td></tr>';
echo '<tr><td><a href="test2.php">KOLB</a></td></tr>';
echo '</table>';
?> 
Click aca para <a href="logout.php" tite="Logout">Salir.
<?php
}
else{
echo 'contenido protegido<br>';
echo '<a href="index.php">Click aca para regresar<a>';
}
?>

</body></html>