<?php

if( isset($_POST['usuario'])  && isset($_POST['contrasena'])  ) {
  get_persons($_POST['usuario'],$_POST['contrasena']);
} else {
  die("Solicitud no válida.");
}

function get_persons( $usuario, $contrasena ) {
 
	 //Cambia por los detalles de tu base datos
	 $dbserver = "localhost";
	 $dbuser = "root";
	 $password = "";
	 $dbname = "catalogo_ropa";
	 
	 $database = new mysqli($dbserver, $dbuser, $password, $dbname);

	 if($database->connect_errno) {
	   die("No se pudo conectar a la base de datos");
	 }

	$jsondata = array();
	$querywhere = "WHERE usuario = '" . $usuario. "' AND contrasena = '".$contrasena."'" ;

	 	error_log($querywhere, 3, "error.log");

	 
	if ( $result = $database->query( "SELECT * FROM usuarios " . $querywhere)) {
		if( $result->num_rows > 0 ) {
		    $jsondata["success"] = true;
		    $jsondata["data"]["message"] = "Ingresando...";
		    while( $row = $result->fetch_object() ) {
		       $jsondata["data"]["user"][] = $row;
		     }

	    }else{
		    $jsondata["success"] = false;
		    $jsondata["data"] = array(
		      'message' => 'usuario o contraseña invalidos'
		    );
	    }

	   	$result->close();
	 
	}else{
	 
	   	$jsondata["success"] = false;
	    $jsondata["data"] = array(
	      'message' => $database->error
	    );
	}
	 
	$database->close();
	header('Content-type: application/json; charset=utf-8');
	  echo json_encode($jsondata);
	 
}

?>