<?php
include '../../datos/base_datos.php';
$database = conectar_base();
if($database == "100"){
    error_log( "No se pudo conectar a la base de datos",3,"error.log");
}else{
    $response_json = select_generico($database,"articulos"," nro_articulo, casa, stock, precio_venta,precio_lista");
    header('Content-type: application/json; charset=utf-8');
    $database->close();
    echo json_encode($response_json);
}
?>