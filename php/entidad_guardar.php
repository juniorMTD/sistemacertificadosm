<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$ruc=limpiar_cadena($_POST['ruc']);
$nombres=limpiar_cadena($_POST['nombre']);
$celular=limpiar_cadena($_POST['celular']);
$direccion=limpiar_cadena($_POST['direccion']);
$descripcion=limpiar_cadena($_POST['descripcion']);



//esto me sirve para registrar un dato en la bd

$guardar_entidad = $start->conexionbd();
$guardar_entidad= $guardar_entidad->prepare(
    'insert into entidad values (:id,:ruc,:nom,:cel,:direc,:descrip)'
);
$array_entidad = [
    ":id"=>'DEFAULT',
    ":ruc"=>$ruc,
    ":nom"=>$nombres,
    ":cel"=>$celular,
    ":direc"=>$direccion,
    ":descrip"=>$descripcion

];

$guardar_entidad->execute($array_entidad);

if ($guardar_entidad->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}