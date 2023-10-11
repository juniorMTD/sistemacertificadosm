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

?>