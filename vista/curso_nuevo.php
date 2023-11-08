<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
    <div class="mb-6 mt-6 ">
        <h1 class="title center_mio">Agregar Nuevo Curso</h1>
        <hr class="division1">
    </div>
    ""
    <div class="form-rest mb-6 mt-6 "></div>
    <form action="./php/curso_guardar.php" method="POST" class="FormularioAjax" autocomplete="off"
        enctype="multipart/from-data">
        <br>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>CODIGO DEL CURSO (*)</label>
                    <input class="input" type="text" name="curso_codigo">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>NOMBRE DEL CURSO (*)</label>
                    <input class="input" type="text" name="curso_nombre">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>FECHA DE INICIO (*)</label>
                    <input class="input" type="date" name="inicio">

                </div>
            </div>

        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>FECHA DE FIN (*)</label>
                    <input class="input" type="date" name="fin">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>ESTADO (*)</label>
                    <select name="estado" id="" class="input">
                        <option value="presencial">PRESENCIAL</option>
                        <option value="virtual">VIRTUAL</option>
                        <option value="semipresencial">SEMIPRESENCIAL</option>
                    </select>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>HORAS LECTIVAS (*)</label>
                    <input class="input" type="text" name="lectivas">
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>DISEÑO DE CERTIFICADO (*)</label>
                    <input class="input" type="file" name="disenio">
                </div>
            </div>
            <div class="column">
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>NOMBRE ESPECIALISTA (*)</label>
                    <select name="nombres_especialista" id="nombresEspecialista" class="input">
                        <option value="">SELECCIONE</option>
                        <?php
            require_once "./php/consultas.php";
            foreach ($datosespecialista as $rows) {
                ?>
                        <option value="<?php echo $rows['idespecialista'] ?>" cargo="<?php echo $rows['idcargo'] ?>">
                            <?php echo $rows['nombres_especialista'] ?>
                        </option>
                        <?php
            }
            ?>
                    </select>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <table class="table" id="especialistaTable">
                        <tr>
                            <th>Nombres y Apellidos</th>
                            <th>Cargo</th>
                        </tr>
                        <tr>
                            <td id="nombreEspecialista"></td>
                            <td id="cargo"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <script>
            // Seleccionar el elemento de selección y la tabla
            var selectEspecialista = document.getElementById("nombresEspecialista");
            var nombreEspecialista = document.getElementById("nombreEspecialista");
            var cargoEspecialista = document.getElementById("cargo");
            // Manejar el evento de cambio en el elemento de selección
            selectEspecialista.addEventListener("change", function() {
                // Obtener el valor seleccionado
                var selectedValue = selectEspecialista.value;
                // Buscar el nombre y cargo correspondientes a la selección
                var selectedOption = selectEspecialista.options[selectEspecialista.selectedIndex];
                var nombreSeleccionado = selectedOption.text;
                var cargoSeleccionado = selectedOption.getAttribute("cargo");
                
                // Actualizar la fila de la tabla con la información del especialista
                nombreEspecialista.textContent = nombreSeleccionado;
                cargoEspecialista.textContent = cargoSeleccionado;
            });
            </script>
            <div class="column">
                <div class="column">
                    <div class="column">
                        <div class="control">
                            <label>&nbsp;</label>
                            <a href="index.php?mostrar=especialista_nuevo" class="button is-info is-rounded">Agregar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>NOMBRE DEL INSTRUCTOR (*)</label>
                    <select name="nombre_instructor" id="" class="input">
                        <option value="">SELECCIONE</option>
                        <?php
						require_once "./php/consultas.php";

						foreach ($datosinstructor as $rows) {
						?>
                        <option value="<?php echo $rows['idinstructor'] ?>"><?php echo $rows['nombre_instructor'] ?>
                        </option>
                        <?php
						}
						?>
                    </select>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>FIRMA INSTRUCTOR (*)</label>
                    <input class="input" type="file" name="firma_instructor">
                </div>
            </div>
        </div>
        <br>
        <p class="has-text-centered">
            <a href="./index.php?mostrar=curso_form" class="button is-danger is-rounded">Cancelar</a>
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>