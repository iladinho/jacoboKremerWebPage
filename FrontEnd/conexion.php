
<html><head><meta charset="utf-8"> </head>
<body>
<?php
//Ejemplo aprenderaprogramar.com

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "catalogo_ropa");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
$result = mysqli_query($link, "SELECT * FROM colores");
while ($fila = mysqli_fetch_array($result)){
mostrarDatos($fila);
}
mysqli_free_result($result);
mysqli_close($link);

function mostrarDatos ($resultados) {
	if ($resultados !=NULL) {
		echo "- Nombre: ".$resultados['nombre']."<br/> ";
		echo "**********************************<br/>";
	}
	else {
		echo "<br/>No hay más datos!!! <br/>";
	}
}
?>
</body></html>