<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$dni=limpiar_cadena($_POST['dni']);
$nombre=limpiar_cadena($_POST['nombre']);
$apellidop=limpiar_cadena($_POST['apellidop']);
$apellidom=limpiar_cadena($_POST['apellidom']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);


if($dni==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El dni es obligatorio completar,error";
    exit();
}
if($nombre==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellidop==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido paterno es obligatorio completar,error";
    exit();
}

if($apellidom==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido materno es obligatorio completar,error";
    exit();
}
if($celular==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El celular es obligatorio completar,error";
    exit();
}
if($correo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El correo es obligatorio completar,error";
    exit();
}




//esto me sirve para registrar un dato en la bd

$guardar_cliente = $start->conexionbd();
$guardar_cliente= $guardar_cliente->prepare(
    'insert into cliente values (:id,:dni,: Nombre_cliente,:apellido_paterno
    ,:apellido_materno0,: celular_cliente,: correo_cliente,: genero)'
);
$array_cliente = [
    ":id"=>'DEFAULT',
    ":dni"=>$dni,
    ":nombre_cliente"=>$nombre,
    ":apellido_paterno"=>$apellidop,
    ":apellido_materno0"=>$apellidom,
    ":celular_cliente"=>$celular,
    ":correo_cliente"=>$correo,
    ":genero"=>$genero

];

$guardar_cliente->execute($array_cliente);

if ($guardar_cliente->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}
