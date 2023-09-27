<?php

// veriricar los tipos de datos
function verificar_datos($filtro,$cadena){
    if(preg_match("/^".$filtro."$/",$cadena)){
        return false;
    }
    else{
        return true;
    }
}

//limpiar  cadenas de texto

function limpiar_cadena($cadena){
    $cadena=trim($cadena);//quitar espacios en blanco o sobreescribirlos
    $cadena=stripslashes($cadena); // para evitar inyeccion sql
    //quita las sentencia mostradas
    $cadena=str_ireplace("<script>","",$cadena); // para evitar inyeccion sql con javascript 
    $cadena=str_ireplace("</script>","",$cadena); // para evitar inyeccion sql con javascript
    $cadena=str_ireplace("<script src","",$cadena); // para evitar inyeccion sql con javascript
    $cadena=str_ireplace("<script type=","",$cadena); // para evitar inyeccion sql con javascript
    $cadena=str_ireplace("SELECT * FROM","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("DELETE FROM","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("INSERT INTO","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("DROP TABLE","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("DROP DATABASE","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("TRUNCATE TABLE","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("SHOW TABLES","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("SHOW DATABASES","",$cadena); // para evitar inyeccion sql con sql
    $cadena=str_ireplace("<?php","",$cadena); // para evitar inyeccion con php
    $cadena=str_ireplace("?>","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("--","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("^","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("<","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("[","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("]","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("==","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace(";","",$cadena); // para evitar inyeccion sql con php
    $cadena=str_ireplace("::","",$cadena); // para evitar inyeccion sql con php
    $cadena=trim($cadena);//quitar espacios en blanco o sobreescribirlos
    $cadena=stripslashes($cadena); // para evitar inyeccion sql

    return $cadena;
}

// renombrar las fotos
function renombrar_fotos($nombre){
    $nombre=str_ireplace(" ","_",$nombre);
    $nombre=str_ireplace("/","_",$nombre);
    $nombre=str_ireplace("#","_",$nombre);
    $nombre=str_ireplace("-","_",$nombre);
    $nombre=str_ireplace("$","_",$nombre);
    $nombre=str_ireplace(".","_",$nombre);
    $nombre=str_ireplace(",","_",$nombre);
    $nombre=str_ireplace("%","_",$nombre);
    $nombre=str_ireplace("&","_",$nombre);
    $nombre=str_ireplace("@","_",$nombre);
    $nombre=str_ireplace("*","_",$nombre);
    $nombre=str_ireplace("+","_",$nombre);

    $nombre=$nombre."_".rand(0,100); // para que no haya repeticion en nombres de la fotos le asigna un numero aleatorio

    return $nombre;
}

// funcion paginador de tablas
function paginador_tablas($pagina, $npaginas,$url,$botones){  
    $tabla='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

        //boton anterior
        if($pagina<=1){
            $tabla.='
            <a class="pagination-previous is-disable" disabled >Anterior</a>
            <ul class="pagination-list">
            ';
        }else{
            $tabla.='<a class="pagination-previous" href="'.$url.($pagina-1).'">Anterior</a>;
            <ul class="pagination-list">
                <li><a class="pagination-link" href="'.$url.'1">1</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
            ';
        }


        $contadori=0;
        for($i=$pagina;$i<=$npaginas;$i++){

            if($contadori>=$botones){
                break;
            }
            if($pagina==$i){
                $tabla.='<li><a class="pagination-link is-current" href="'.$url.$i.'">'.$i.'</a></li>';
            }else{
                $tabla.='<li><a class="pagination-link" href="'.$url.$i.'">'.$i.'</a></li>';
            }

            $contadori++;
        }

        // boton siguiente
        if($pagina==$npaginas){
            $tabla.='
            </ul>
            <a class="pagination-next is-disabled" disabled >Siguiente</a>
            ';
        }else{
            $tabla.='
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link" href="'.$url.$npaginas.'">'.$npaginas.'</a></li>
            </ul>
            <a class="pagination-next" href="'.$url.($pagina+1).'">Siguiente</a>
            ';
        }

    $tabla.='</nav>';
    return $tabla;
}

?>