<?php

function conectar_base(){
    //Cambia por los detalles de tu base datos
    $dbserver = "localhost";
    $dbuser = "root";
    $password = "";
    $dbname = "catalogo_ropa";
    
    $database = new mysqli($dbserver, $dbuser, $password, $dbname);
    
    if($database->connect_errno) {
        //Error 100 = fallo la base de datos.
        return("100");
    }else{
        return $database;
    }
}

function select_generico($database,$table,$fields,$querywhere=""){
    $jsondata = array();
    $result = $database->query( "SELECT ".$fields." FROM  ".$table." ". $querywhere);
    if ( $result = $database->query( "SELECT ".$fields." FROM  ".$table." ". $querywhere)) {
        if( $result->num_rows > 0 ) {
            while( $row = $result->fetch_assoc() ) {
                $jsondata["data"]= $row;
            }
        }else{
            $jsondata = array(
                'message' => 'Error'
            );
        }
        $result->close();
    }else{
        $jsondata = array(
            'message' => $database->error
        );
    }
    return $jsondata;
}
?>