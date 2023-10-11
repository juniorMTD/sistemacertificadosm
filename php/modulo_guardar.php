<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$nombre_modulo=limpiar_cadena($_POST['nombre']);


//esto me sirve para registrar un dato en la bd

$nombre_modulo = $start->conexionbd();

$nombre_modulo= $nombre_modulo->prepare(
    'insert into usuario values (:id,:nombre_modulo)'
);
$array_modulo= [
    ":id"=>'DEFAULT',
    ":nombre_modulo"=>$nombre,
];

$nombre_modulo->execute($array_modulo);

if ($nombre_modulo->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
    exit();
}