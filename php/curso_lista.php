<?php

$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;
$tabla="";

if(isset($busqueda)&&$busqueda!=""){
    $consulta_datos="SELECT c.codigo,c.nombre_curso,c.fecha_inicio,c.fecha_fin,c.estado,c.diseno,concat(i.nombre_instructor,' ',i.apellido_instructor) as instructor,ca.nombre_categoria,
    hl.horas,e.nombre_entidad,esp.nombres_especialista
    from curso c INNER JOIN instructor i on c.idinstructor=i.idinstructor INNER JOIN categoria ca on c.idcategoria=ca.idcategoria inner join entidad e on c.identidad = e.identidad INNER JOIN especialista esp  on c.idespecialista= esp.idespecialista INNER JOIN hora_lectiva hl on c.idhora_lectiva=hl.idhora_lectiva 
    where nombre_curso 
    like '%$busqueda%'
    ORDER BY idcurso DESC LIMIT $inicio,$registros";

    $consulta_total="SELECT count(*)
    from curso c INNER JOIN instructor i on c.idinstructor=i.idinstructor INNER JOIN categoria ca on c.idcategoria=ca.idcategoria inner join entidad e on c.identidad = e.identidad INNER JOIN especialista esp  on c.idespecialista= esp.idespecialista INNER JOIN hora_lectiva hl on c.idhora_lectiva=hl.idhora_lectiva  
    where
    nombre_curso like '%$busqueda%'";
}else{
    $consulta_datos="SELECT c.codigo,c.nombre_curso,c.fecha_inicio,c.fecha_fin,c.estado,c.diseno,concat(i.nombre_instructor,' ',i.apellido_instructor) as instructor,ca.nombre_categoria,
    hl.horas,e.nombre_entidad,esp.nombres_especialista
    from curso c INNER JOIN instructor i on c.idinstructor=i.idinstructor INNER JOIN categoria ca on c.idcategoria=ca.idcategoria inner join entidad e on c.identidad = e.identidad INNER JOIN especialista esp  on c.idespecialista= esp.idespecialista INNER JOIN hora_lectiva hl on c.idhora_lectiva=hl.idhora_lectiva
    ORDER BY idcurso DESC LIMIT $inicio,$registros";

    $consulta_total="SELECT count(idcurso)
    from curso c INNER JOIN instructor i on c.idinstructor=i.idinstructor INNER JOIN categoria ca on c.idcategoria=ca.idcategoria inner join entidad e on c.identidad = e.identidad INNER JOIN especialista esp  on c.idespecialista= esp.idespecialista INNER JOIN hora_lectiva hl on c.idhora_lectiva=hl.idhora_lectiva";
}

$start = new Conexion();
$conn = $start->Conexionbd();

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
                <th>Codigo</th>
                <th>Nombre del curso</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Estado</th>
                <th>Diseño</th>
                <th>Instructor</th>
                <th>Categoria</th>
                <th>Entidad</th>
                <th>Especialista</th>
                <th>Hora Lectiva</th>
                <th class="has-text-centered" colspan="2">Opciones</th>
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
        <td>'.$rows['codigo'].'</td>
        <td>'.$rows['nombre_curso'].'</td>
        <td>'.$rows['fecha_inicio'].'</td>
        <td>'.$rows['fecha_fin'].'</td>
        <td>'.$rows['estado'].'</td>
        <td>'.$rows['diseno'].'</td>
        <td>'.$rows['instructor'].'</td>
        <td>'.$rows['nombre_categoria'].'</td>
        <td>'.$rows['nombre_entidad'].'</td>
        <td>'.$rows['nombres_especialista'].'</td>
        <td>'.$rows['horas'].'</td>
        <td>
        <a href="" class="button is-success is-rounded is-small">Actualizar</a>
        </td>
        <td>
            <a onclick="mialertaeliminar(event);" href="" class="button is-danger is-rounded is-small" >Eliminar</a>
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
    <p class="has-text-right">Mostrando los cursos <strong>"'.$pag_inicio.'"</strong> al <strong>"'.$pag_final.'"</strong> de un <strong>total de '.$total.'</strong></p>
    ';
}

$conn=null;


echo $tabla;

if($total>=1 && $pagina<=$npaginas){
    echo paginador_tablas($pagina, $npaginas,$url,7);
}



?>