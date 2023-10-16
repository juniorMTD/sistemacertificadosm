<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombre=limpiar_cadena($_POST['nombre']);

if($nombre ==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nmombre es obligatorio completar,error";
    exit();
}


//esto me sirve para registrar un dato en la bd

$guardar_categoria = $start->conexionbd();
$guardar_categoria= $guardar_categoria->prepare(
    'insert into categoria values (:id,:cate)'
);
$array_categoria = [
    ":id"=>'DEFAULT',
    ":cate"=>$nombre
];

$guardar_categoria->execute($array_categoria);