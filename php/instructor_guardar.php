<?php

require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombre=limpiar_cadena($_POST['nombres']);
$apellido=limpiar_cadena($_POST['apellidos']);
$instruccion=limpiar_cadena($_POST['grado_instruccion']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$firma=limpiar_cadena($_FILES['firma_digital']['name']);//nombre del archivo




// if($nombre==""){
//     echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
//     exit();
// }
// if($apellido==""){
//     echo "!OOPSSS OCURRIO UN ERROR!,El apellido es obligatorio completar,error";
//     exit();
// }
// if($celular==""){
//     echo "!OOPSSS OCURRIO UN ERROR!,El celular es obligatorio completar,error";
//     exit();
// }
// if($instruccion==""){
//     echo "!OOPSSS OCURRIO UN ERROR!,El instrucctor es obligatorio completar,error";
//     exit();
// }
// if(empty($firma)){
//     echo "!OOPSSS OCURRIO UN ERROR!,El firmar es obligatorio completar,error";
//     exit();
// }

// validador para almacenar un archivo o imagen 

$url_temporal = $_FILES["firma_digital"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertada = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_target = str_replace('\\', './', $ruta_insertada) . '/' .$firma;

// crear la carpta si no existe

if (!file_exists($ruta_insertada)) {
    mkdir($ruta_insertada, 0777, true);
};


if (move_uploaded_file($url_temporal, $url_target)) {
    echo "El archivo " . htmlspecialchars(basename($firma)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}

$tipo_archivo = strtolower(pathinfo($firma,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "jpg" && $tipo_archivo!= "jpeg" && $tipo_archivo!= "png" ) {
    echo "Solo se permiten imágenes tipo JPG, JPEG, PNG ";
}


//esto me sirve para registrar un dato en la bd

$guardar_instructor = $start->conexionbd();
$guardar_instructor= $guardar_instructor->prepare(
    'insert into categoria values (:id,:nom,:ape,g_inst,:cel,:correo,:f_dig,:genero)'
);
$array_instructor = [
    ":id"=>'DEFAULT',
    ":nom"=>$nombre,
    ":ape"=>$apellido,
    ":g_inst"=>$instruccion,
    ":cel"=>$celular,
    ":correo"=>$correo,
    ":f_dig"=>$firma,
    ":genero"=>$generos
    
];

$guardar_instructor->execute($array_instructor);

if ($guardar_instructor->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}

