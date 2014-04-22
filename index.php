<?php
session_start(); //inicio la sesion q habilita el uso de variables de sesion
$message="";
if(count($_POST)>0) {//veo si existen valores enviados por POST
	$conn = mysql_connect("localhost","root","root"); //conecto con la base de datos , luego lo hare con include
	mysql_select_db("seguimiento",$conn);				//
	$result = mysql_query("SELECT * FROM usuario WHERE nom_usuario='" . $_POST["user_name"] . "' and pass_usuario = MD5('". $_POST["password"]."')"); // realizo la consulta a la 	/////////////////////////////////////////////////////////^^^^^^db con comparando si existe un usuario con ese pass ingresados desde el input user_name y password de abajo
	$row  = mysql_fetch_array($result);// guardo el resultado en un array

	if(is_array($row)) { // verifico q exista el array en caso positivo
		$_SESSION["id_tipo_usuario"] = $row['id_tipo_usuario'];  // creo las variables de sesion
		$_SESSION["nom_usuario"] = $row['nom_usuario'];
	} 
	else {
		$message = "Usuario o Password Invalido!"; // caso contrario suelto el mensaje
	}
}
if(isset($_SESSION["id_tipo_usuario"])) { // verifico si existe la variable id tipo 1 para docente 2 para estudiante
	if($_SESSION["id_tipo_usuario"]=="1" ){
		header("Location:menu_docente.php"); // redirijo al menu del docente
	}
	if($_SESSION["id_tipo_usuario"]=="2" ){
		header("Location:menu_estudiante.php"); // redirijo al menu del alumno
	}

}
?>
<html>
<head>
<title>SISTEMA DE SEGUIMIENTO</title>
</head>
<body>
<!--DESDE ACA ESTAN LOS FORMS Y UNA PEQUEÑA PARTE DE PHP Q ES DONDE SE PONE EL MENSAJE DE USUARIO INVALIDO SI ES QUE
SE INGRESA MAL EL USUARIO -->
<form name="frmUser" method="post" action=""> 
<div class="message" align="center"><?php if($message!="") { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Inicio de Sesion</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="user_name"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Iniciar Sesion!!"></td>
</tr>
</table>
</form>
</body></html>