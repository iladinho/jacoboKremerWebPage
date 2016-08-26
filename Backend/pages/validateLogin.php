<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "catalogo_ropa");
$result = mysqli_query($link, "SELECT * FROM usuarios");
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