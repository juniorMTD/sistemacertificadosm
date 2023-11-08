<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$n_especialista=limpiar_cadena($_POST['nombres_especialista']);
$apellido=limpiar_cadena($_POST['apellidos']);
$firma=limpiar_cadena($_FILES['firma_especialista']['name']);
$cargo=limpiar_cadena($_POST['cargo']);


if($n_especialista==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellido==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El  apellido es obligatorio completar,error";
    exit();
}

if(empty($firma)){
    echo "!OOPSSS OCURRIO UN ERROR!,El firmar es obligatorio completar,error";
     exit();
    }
    if($cargo==""){
        echo "!OOPSSS OCURRIO UN ERROR!,El cargo es obligatorio completar,error";
        exit();
    }
    // validador para almacenar un archivo o imagen 

$firma1 = $_FILES["firma_especialista"]["name"];  
$url_temporal = $_FILES["firma_especialista"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_especialista = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_especialista = str_replace('\\', './', $ruta_especialista) . '/' .$firma;

// crear la carpta si no existe

if (!file_exists($ruta_especialista)) {
    mkdir($ruta_especialista, 0777, true);
};
 

if (move_uploaded_file($url_temporal, $url_especialista)) {

} else {
    echo "Ha habido un error al cargar tu archivo.";
    exit();
}

$tipo_archivo = strtolower(pathinfo($firma,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "jpg" && $tipo_archivo!= "jpeg" && $tipo_archivo!= "png" ) {
    echo "Solo se permiten imágenes tipo JPG, JPEG, PNG ";
    exit();
}
//esto me sirve para registrar un dato en la bd

$guardar_especialista = $start->conexionbd();
$guardar_especialista= $guardar_especialista->prepare(
    'insert into especialista values (:id,:nom,:ape,:firma,:carg)'
);
$array_especialista = [
    ":id"=>'DEFAULT',
    ":nom"=>$n_especialista,
    ":ape"=>$apellido,
    ":firma"=>$firma1,
    ":carg"=>$cargo

];

$guardar_especialista->execute($array_especialista);

if ($guardar_especialista->rowCount() == 1) {
    echo "!REGISTRADO!,El especialista se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro el especialista,error";
}