<?php

function conectar_base(){
    //Cambia por los detalles de tu base datos
    $dbserver = "localhost";
    $dbuser = "root";
    $password = "";
    $dbname = "catalogo_ropa";
    
    $database = new mysqli($dbserver, $dbuser, $password, $dbname);
    
    if($database->connect_errno) {
        return("No se pudo conectar a la base de datos");
       }else{
           return $database;
       }
    }

   function select_generico($table,$fields,$querywhere=""){
       $database = conectar_base();
       $jsondata = array();
       $result = $database->query( "SELECT ".$fields." FROM  ".$table." ". $querywhere);
       if ( $result = $database->query( "SELECT ".$fields." FROM  ".$table." ". $querywhere)) {
           if( $result->num_rows > 0 ) {
               $jsondata["success"] = true;
               while( $row = $result->fetch_object() ) {
                   $jsondata["data"][$table][] = $row;
                }
                
            }else{
                $jsondata["success"] = false;
                $jsondata["data"] = array(
                    'message' => 'Error'
                );
            }
            
            $result->close();
            
        }else{
            $jsondata["success"] = false;
            $jsondata["data"] = array(
                'message' => $database->error
            );
        }
        return $jsondata;
    }
?>