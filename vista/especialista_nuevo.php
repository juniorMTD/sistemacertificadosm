<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
    <div class="mb-6 mt-6 ">
        <h1 class="title center_mio">Agregar Nuevo Especialista</h1>
        <hr class="division1">
    </div>

    <div class="form-rest mb-6 mt-6 "></div>
    <form action="./php/especialista_guardar.php" method="POST" class="FormularioAjax" autocomplete="off"
        enctype="multipart/from-data">

        <h6><strong>Datos Personales</strong></h6>
        <br>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>NOMBRE DEL ESPECIALISTA (*)</label>
                    <input class="input" type="text" name="nombres_especialista">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>APELLIDO DEL ESPECIALISTA (*)</label>
                    <input class="input" type="text" name="apellidos">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>FIRMA DIGITAL (*)</label>
                    <input class="input" type="file" name="firma_especialista">
                </div>
            </div>

        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>CARGO (*)</label>
                    <select name="cargo" id="" class="input">
                        <option value="">SELECCIONE</option>
                        <?php
						require_once "./php/consultas.php";

						foreach ($datoscargo as $rows) {
						?>
                        <option value="<?php echo $rows['idcargo'] ?>"><?php echo $rows['nombre_cargo'] ?></option>
                        <?php
						}
						?>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <p class="has-text-centered">
            <a href="./index.php?mostrar=especialista_form" class="button is-danger is-rounded">Cancelar</a>
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>