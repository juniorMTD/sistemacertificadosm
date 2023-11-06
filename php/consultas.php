<?php
    //conexion a la base de datos
    require_once "./conexion/coneccion.php";														
    $start = new Conexion();
    $conn = $start->conexionbd();


    // consulta para tener datos del genero para mi select 
    $selecgenero="select  * from genero;";
    $datosgenero=$conn->query($selecgenero);
    $datosgenero=$datosgenero->fetchAll();


    // consulta de cardo del emplesdo
    $seleccargo="select  * from cargo;";
    $datoscargo=$conn->query($seleccargo);
    $datoscargo=$datoscargo->fetchAll();

  // consulta de cardo del rol
  $selecrol="select  * from rol;";
  $datosrol=$conn->query($selecrol);
  $datosrol=$datosrol->fetchAll();


   // consulta de modulo
   $selecmodulo="select  * from modulo;";
   $datosmodulo=$conn->query($selecmodulo);
   $datosmodulo=$datosmodulo->fetchAll();

    // consulta de especialista
    $selecespecialista="select  * from especialista;";
    $datosespecialista=$conn->query($selecespecialista);
    $datosespecialista=$datosespecialista->fetchAll();

    // consulta de especialista
    $selecinstructor="select  * from instructor;";
    $datosinstructor=$conn->query($selecinstructor);
    $datosinstructor=$datosinstructor->fetchAll();
?>