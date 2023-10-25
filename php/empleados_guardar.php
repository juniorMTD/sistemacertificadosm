<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombres=limpiar_cadena($_POST['nombre']);
$apellido=limpiar_cadena($_POST['apellidos']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$cargo=limpiar_cadena($_POST['cargo']);

$usuario=limpiar_cadena($_POST['usuario']);
$clave=limpiar_cadena($_POST['contrasena']);
$clavex2=limpiar_cadena($_POST['contrasena_duplicado']);
$rol=limpiar_cadena($_POST['rol']);

if($nombres==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellido==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido es obligatorio completar,error";
    exit();
}
if($celular==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El número de celular es obligatorio completar,error";
    exit();
}
if($correo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El correo es obligatorio completar,error";
    exit();
}
if($cargo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El cargo es obligatorio completar,error";
    exit();
}


$verificar_usuario=$start->conexionbd();
$verificar_usuario=$verificar_usuario->query('SELECT * FROM usuario WHERE usuario="'.$usuario.'"');

if($verificar_usuario->rowCount()>0){
    echo "!OOPSSS OCURRIO UN ERROR!,El usuario ya esta registrado,error";
    exit();
}
$verificar_usuario= null;

if($clave!=$clavex2){
    echo "!OOPSSS OCURRIO UN ERROR!,Las claves no coiniciden,error";
    exit();
}

//esto me sirve para registrar un dato en la bd

$guardar_empleados = $start->conexionbd();
$guardar_empleados= $guardar_empleados->prepare(
    'insert into empleado values (:id,:nom,:ape,:cel,:corre,:carg)'
);
$array_empleados = [
    ":id"=>'DEFAULT',
    ":nom"=>$nombres,
    ":ape"=>$apellido,
    ":cel"=>$celular,
    ":corre"=>$correo,
    ":carg"=>$cargo
];

$guardar_empleados->execute($array_empleados);

if ($guardar_empleados->rowCount() == 1) {
    
    $valor_maximo = $start->conexionbd();
    $valor_maximo=$valor_maximo->query("SELECT max(e.idempleado) FROM empleado e;");

    $ultimoempleado=$valor_maximo->fetch(PDO::FETCH_COLUMN);

    $guardar_usuario = $start->conexionbd();
    $guardar_usuario= $guardar_usuario->prepare(
        'insert into usuario values (:id,:usu,:contra,:esta,:idempleado,:rol)'
    );
    $array_usuario= [
        ":id"=>'DEFAULT',
        ":usu"=>$usuario,
        ":contra"=>$clave,
        ":esta"=>1,
        ":idempleado"=>$ultimoempleado,
        ":rol"=>$rol
    ];
    $guardar_usuario->execute($array_usuario);

    if ($guardar_usuario->rowCount() == 1) {
        echo "!REGISTRADO!,Es usuario y empleado se registro correctamente,success";
        exit();
    } else{
        echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
    }         
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al empléado,error";
}

