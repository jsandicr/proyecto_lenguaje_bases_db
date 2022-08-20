<?php

function conexion(){
        
    $conn = oci_connect('ADMPIZZA', 'Admin01', 'localhost/BDPIZZA');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    return $conn;
}



?>