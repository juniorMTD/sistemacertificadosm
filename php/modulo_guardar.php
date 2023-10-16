<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$nombre_modulo=limpiar_cadena($_POST['nombre_modulo']);

if($nombre_modulo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}


//esto me sirve para registrar un dato en la bd

$nombre_modulo = $start->conexionbd();

$nombre_modulo= $nombre_modulo->prepare(
    'insert into usuario values (:id,:nombre_m)'
);
$array_modulo= [
    ":id"=>'DEFAULT',
    ":nombre_m"=>$nombre_modulo,
];

$nombre_modulo->execute($array_modulo);

if ($nombre_modulo->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
    exit();
}


