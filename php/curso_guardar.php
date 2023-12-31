<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$codigo = limpiar_cadena($_POST['curso_codigo']);
$nombre = limpiar_cadena($_POST['curso_nombre']);
$f_inicio = limpiar_cadena($_POST['inicio']);
$f_fin = limpiar_cadena($_POST['fin']);
$estado = limpiar_cadena($_POST['estado']);
$d_certificado = limpiar_cadena($_FILES['disenio']['name']);
$n_instructor = limpiar_cadena($_POST['nombre_instructor']);
$f_instructor = limpiar_cadena($_FILES['firma_instructor']['name']);
$n_especialista = limpiar_cadena($_POST['nombresEspecialista']);
$f_especialista = limpiar_cadena($_FILES['firma_especialista']['name']);
$h_lectivas = limpiar_cadena($_POST['lectivas']);

 /*if($codigo==""){
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
/if($n_instructor==""){
     echo "!OOPSSS OCURRIO UN ERROR!,El nombre del instructor es obligatorio completar,error";
     exit();
 }
 if(empty($f_instructor)){
     echo "!OOPSSS OCURRIO UN ERROR!,La firma del instructuor es obligatorio completar,error";
     exit();
 }*/

// validador para almacenar un archivo 

$url_temporal = $_FILES["disenio"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertadacertificado = dirname(__FILE__) . "../..//biblioteca/certificado"; // carpeta donde se almacena el archivo
$url_finaldcertificado = str_replace('\\', './', $ruta_insertadacertificado) . '/certi'.$d_certificado;

// crear la carpta si no existe

if (!file_exists($ruta_insertadacertificado)) {
    mkdir($ruta_insertadacertificado, 0777, true);
};
$tipo_archivo = strtolower(pathinfo($d_certificado,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo!= "pdf" ) {
   echo "Solo se permiten archivos de tipo PDF";
} else {
    if (move_uploaded_file($url_temporal, $url_finaldcertificado)) {
        echo "El archivo " . htmlspecialchars(basename($d_certificado)) . " ha sido cargado con éxito.";
    } else {
        echo "Ha habido un error al cargar tu archivo.";
    }
}

// // validador para almacenar un archivo o imagen 

$url_temporal2 = $_FILES["firma_especialista"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
$ruta_insertadafirmaespecialista = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
$url_firmaespecialista = str_replace('\\', './', $ruta_insertadafirmaespecialista) . '/' .$f_especialista;

// crear la carpta si no existe

if (!file_exists($ruta_insertadafirmaespecialista)) {
    mkdir($ruta_insertadafirmaespecialista, 0777, true);
};
$tipo_archivo2 = strtolower(pathinfo($f_especialista,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo2!= "jpg" && $tipo_archivo2!= "jpeg" && $tipo_archivo2!= "png") {
  echo "Solo se permiten archivos de tipo jpg, jpeg y png";
} else {
   if (move_uploaded_file($url_temporal2, $url_firmaespecialista)) {
       echo "El archivo " . htmlspecialchars(basename($f_especialista)) . " ha sido cargado con éxito.";
   } else {
       echo "Ha habido un error al cargar tu archivo.";
   }
}

// // validador para almacenar un archivo o imagen 

 $url_temporal4 = $_FILES["firma_instructor"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 
 $ruta_insertadafirmainstructor = dirname(__FILE__) . "../..//biblioteca/firmas"; // carpeta donde se almacena el archivo
 $url_firmainstructor = str_replace('\\', './', $ruta_insertadafirmainstructor) . '/' .$f_instructor;

 // crear la carpta si no existe

 if (!file_exists($ruta_insertadafirmainstructor)) {
     mkdir($ruta_insertadafirmainstructor, 0777, true);
 };
 $tipo_archivo3 = strtolower(pathinfo($f_instructor,PATHINFO_EXTENSION)); //Extensión de nuestro archivo 

if($tipo_archivo3!= "jpg" && $tipo_archivo3!= "jpeg" && $tipo_archivo3!= "png") {
   echo "Solo se permiten archivos de tipo jpg, jpeg y png";
} else {
    if (move_uploaded_file($url_temporal4, $url_firmainstructor)) {
        echo "El archivo " . htmlspecialchars(basename($f_instructor)) . " ha sido cargado con éxito.";
    } else {
        echo "Ha habido un error al cargar tu archivo.";
    }
}



//esto me sirve para registrar un dato en la bd

$guardar_curso = $start->conexionbd();
$guardar_curso= $guardar_curso->prepare(
    'insert into curso values (:id,:cod,:c_nombre,:ini,:fin,:est,:dis,:n_inst,:f_inst,:n_espe,:f_espe,:lect)'
);
$array_curso = [
    ":id" => 'DEFAULT',
    ":cod" => $codigo,
    ":c_nombre" => $nombre,
    ":ini" => $f_inicio,
    ":fin" => $f_fin,
    ":est" => $estado,
    ":dis" => $url_finaldcertificado,
    ":n_inst" => $n_instructor,
    ":f_inst" => $url_firmainstructor,
    ":n_espe" => $n_especialista,
    ":f_espe" => $url_firmaespecialista,
    ":lect" => $h_lectivas,
];

$guardar_curso->execute($array_curso);

    if ($guardar_curso->rowCount() == 1) {
        echo "!REGISTRADO!,El curso se registro correctamente,success";
        exit();
    } else{
        echo "!OOPSSS OCURRIO UN ERROR!,No se registro al curso,error";
    }         

