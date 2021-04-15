<?php


function conectar(){
    if(!$link=mysqli_connect("localhost","root","","db_turnos")){
        echo "error de comunicacion";
        exit();
    }
    return $link;
}
$link=conectar();
