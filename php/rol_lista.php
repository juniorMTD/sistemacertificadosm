<?php

$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;
$tabla="";

if(isset($busqueda)&&$busqueda!=""){
    $consulta_datos="select * from paciente where
    dni like '%$busqueda%' or apellidos like '%$busqueda%'
    ORDER BY idpaciente DESC LIMIT $inicio,$registros";

    $consulta_total="select count(idpaciente) from paciente  where
    dni like '%$busqueda%' or apellidos like '%$busqueda%'";
}else{
    $consulta_datos="select * from paciente 
    ORDER BY idpaciente DESC LIMIT $inicio,$registros";

    $consulta_total="select count(idpaciente) from paciente";
}

$start = new Conexion();
$conn = $start->Conexiondb();


$datos=$conn->query($consulta_datos);
$datos=$datos->fetchAll();/* si es mas de un registro*/

$total=$conn->query($consulta_total);
$total=(int) $total->fetchColumn();

$npaginas=ceil($total/$registros); /* para redondear un decimal se utiliza ceil*/
$tabla.='
<div class="table-container ">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
        <thead class="notification is-primary">
            <tr class="has-text-centered">
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>celular</th>
                <th class="has-text-centered" colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
';

if($total>=1 && $pagina<=$npaginas){
    $contador=$inicio+1;
    $pag_inicio=$inicio+1;

    foreach($datos as $rows){
        $tabla.='
            <tr class="has-text-centered">
                <td>'.$contador.'</td>
                <td>'.$rows['nombres'].'</td>
                <td>'.$rows['apellidos'].'</td>
                <td>'.$rows['dni'].'</td>
                <td>'.$rows['celular'].'</td>
                <td>
                    <a href="index.php?mostrar=paciente_form_lista&idpaciente_form_lista='.$rows['idpaciente'].'" class="button is-warning is-rounded is-small">CONSULTAS</a>
                </td>
                <td>
                    <a href="index.php?mostrar=paciente_update&idpaciente_up='.$rows['idpaciente'].'" class="button is-success is-rounded is-small">Actualizar</a>
                </td>
                <td>
                    <a onclick="mialertaeliminar(event);" href="'.$url.$pagina.'&idpaciente_del='.$rows['idpaciente'].'" class="button is-danger is-rounded is-small" >Eliminar</a>
                </td>
            </tr>
        ';
        $contador++;
    }
    $pag_final=$contador-1;
}else{  
    if($total>=1){
        $tabla.='
            <tr class="has-text-centered">
                <td colspan="11">
                    <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </td>
            </tr>
        ';
    }else{
        $tabla.='
            <tr class="has-text-centered ">
                <td colspan="11" class="notification is-primary">
                    No hay registros en el sistema
                </td>
            </tr>
        ';
    }
}


$tabla.='
</tbody>
</table>
</div>
';

if($total>=1 && $pagina<=$npaginas){
    $tabla.='
    <p class="has-text-right">Mostrando pacientes <strong>"'.$pag_inicio.'"</strong> al <strong>"'.$pag_final.'"</strong> de un <strong>total de '.$total.'</strong></p>
    ';
}


$conn=null;
echo $tabla;

if($total>=1 && $pagina<=$npaginas){
    echo paginador_tablas($pagina, $npaginas,$url,7);
}

?>