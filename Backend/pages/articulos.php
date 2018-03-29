<?php
include 'base_datos.php';

$response_json = select_generico("articulos","id_articulo, nro_articulo, nombre, descripcion, precio_lista,stock");
error_log($response_json["data"]["articulos"], 3, "error.log");
header('Content-type: application/json; charset=utf-8');
echo json_encode($response_json);
 $database->close();
 
?>