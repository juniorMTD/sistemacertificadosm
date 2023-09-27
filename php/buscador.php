<?php

    
    $modulo_buscador=limpiar_cadena($_POST['modulo_buscador']);
    $modulos=["rol","paciente","consulta"];  //cadena para los diferentes modulos de busqueda

    if(in_array($modulo_buscador,$modulos)){
        $modulos_url=[
            "rol"=>"rol_form",
            "paciente"=>"paciente_form",
            "consulta"=>"consulta_form",
        ];

        $modulos_url=$modulos_url[$modulo_buscador];

        $modulo_buscador="busqueda_".$modulo_buscador;

        // iniciar la busqueda
        if(isset($_POST['txt_buscador'])){
            $txt=limpiar_cadena($_POST['txt_buscador']);

            if($txt==""){
                echo    '<div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        Introducir un termino de busqueda
                        </div>';
            }else{

                    $_SESSION[$modulo_buscador]=$txt;
                    header("Location: index.php?mostrar=$modulos_url",true,303);
                    exit();
                
            }
        }
        //eliminar la busqueda
        if(isset($_POST['eliminar_buscador'])){
            unset($_SESSION[$modulo_buscador]);
            header("Location: index.php?mostrar=$modulos_url",true,303);
            exit();
        }


    }else{
        echo    '<div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No podemos procesar la petición
            </div>';
    }



?>