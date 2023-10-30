<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$codigo=limpiar_cadena($_POST['curso_codigo']);
$nombre=limpiar_cadena($_POST['curso_nombre']);
$f_inicio=limpiar_cadena($_POST['inicio']);
$f_fin=limpiar_cadena($_POST['fin']);
$h_lectivas=limpiar_cadena($_POST['lectivas']);
$d_certificado=limpiar_cadena($_FILES['disenio']['name']);
$n_director=limpiar_cadena($_POST['nombre_director']);
$f_director=limpiar_cadena($_FILES['firma_director']['name']);
$n_especialista=limpiar_cadena($_POST['nombre_especialista']);
$f_especialista=limpiar_cadena($_FILES['firma_especialista']['name']);
$n_instructor=limpiar_cadena($_POST['nombre_instructor']);
$f_instructor=limpiar_cadena($_FILES['firma_instructor']['name']);

if($codigo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El codigo del curso es obligatorio completar,error";
    exit();
}
if($nombre==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del curso es obligatorio completar,error";
    exit();
}
if($f_inicio==""){
    echo "!OOPSSS OCURRIO UN ERROR!,La fecha de inicio es obligatorio completar,error";
    exit();
}
if($f_fin==""){
    echo "!OOPSSS OCURRIO UN ERROR!,La fecha fin es obligatorio completar,error";
    exit();
}
if($h_lectivas==""){
    echo "!OOPSSS OCURRIO UN ERROR!,Las horas lectivas es obligatorio completar,error";
    exit();
}
if(empty($d_certificado)){
    echo "!OOPSSS OCURRIO UN ERROR!,El diseño del certificado es obligatorio completar,error";
    exit();
}
if($n_director==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del director es obligatorio completar,error";
    exit();
}
if(empty($f_director)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del director es obligatorio completar,error";
    exit();
}
if($n_especialista==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del especialista es obligatorio completar,error";
    exit();
}
if(empty($f_especialista)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del especialista es obligatorio completar,error";
    exit();
}
if($n_instructor==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del instructor es obligatorio completar,error";
    exit();
}
if(empty($f_instructor)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del instructuor es obligatorio completar,error";
    exit();
}

// validador para almacenar un archivo 

$url_temporal = $_FILES["disenio"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertada = dirname(__FILE__) . "../..//bibliotecas/certificado"; // carpeta donde se almacena el archivo
$url_target = str_replace('\\', './', $ruta_insertada) . '/' .$d_certificado;

// crear la carpta si no existe

if (!file_exists($ruta_insertada)) {
    mkdir($ruta_insertada, 0777, true);
};
 

if (move_uploaded_file($url_temporal, $url_target)) {
echo "El archivo " . htmlspecialchars(basename($d_certificado)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}

$tipo_archivo = strtolower(pathinfo($d_certificado,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "pdf" ) {
    echo "Solo se permiten archivos de tipo pdf ";
}

// validador para almacenar un archivo o imagen 

$url_temporal = $_FILES["firma_director"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertada = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_target = str_replace('\\', './', $ruta_insertada) . '/' .$f_director;

// crear la carpta si no existe

if (!file_exists($ruta_insertada)) {
    mkdir($ruta_insertada, 0777, true);
};
 

if (move_uploaded_file($url_temporal, $url_target)) {
echo "El archivo " . htmlspecialchars(basename($f_director)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}

$tipo_archivo = strtolower(pathinfo($f_director,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "jpg" && $tipo_archivo!= "jpeg" && $tipo_archivo!= "png" ) {
    echo "Solo se permiten imágenes tipo JPG, JPEG, PNG ";
}

// validador para almacenar un archivo o imagen 

$url_temporal = $_FILES["firma_especialista"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertada = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_target = str_replace('\\', './', $ruta_insertada) . '/' .$f_especialista;

// crear la carpta si no existe

if (!file_exists($ruta_insertada)) {
    mkdir($ruta_insertada, 0777, true);
};
 

if (move_uploaded_file($url_temporal, $url_target)) {
echo "El archivo " . htmlspecialchars(basename($f_especialista)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}

$tipo_archivo = strtolower(pathinfo($f_especialista,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "jpg" && $tipo_archivo!= "jpeg" && $tipo_archivo!= "png" ) {
    echo "Solo se permiten imágenes tipo JPG, JPEG, PNG ";
}

// validador para almacenar un archivo o imagen 

$url_temporal = $_FILES["firma_instructor"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertada = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_target = str_replace('\\', './', $ruta_insertada) . '/' .$f_instructor;

// crear la carpta si no existe

if (!file_exists($ruta_insertada)) {
    mkdir($ruta_insertada, 0777, true);
};
 

if (move_uploaded_file($url_temporal, $url_target)) {
echo "El archivo " . htmlspecialchars(basename($f_instructor)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}

$tipo_archivo = strtolower(pathinfo($f_instructor,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "jpg" && $tipo_archivo!= "jpeg" && $tipo_archivo!= "png" ) {
    echo "Solo se permiten imágenes tipo JPG, JPEG, PNG ";
}



//esto me sirve para registrar un dato en la bd

$guardar_curso = $start->conexionbd();
$guardar_curso= $guardar_curso->prepare(
    'insert into categoria values (:id,:cod,:c_nombre,:est,:ini,:fin,:lect,:dis,:n_dir,:f_dir,:n_espe,:f_espe,:n_inst,:f_inst)'
);
$array_curso = [
    ":id"=>'DEFAULT',
    ":cod"=>$codigo,
    ":c_nombre"=>$nombre,
    ":est"=>$estado,
    ":ini"=>$f_inicio,
    ":fin"=>$f_fin,
    ":lect"=>$h_lectivas,
    ":dis"=>$d_certificado,
    ":n_dir"=>$n_director,
    ":f_dir"=>$f_director,
    ":n_espe"=>$n_especialista,
    ":f_espe"=>$f_especialista,
    ":n_inst"=>$n_instructor,
    ":f_inst"=>$f_instructor,
];

$guardar_curso->execute($array_curso);
