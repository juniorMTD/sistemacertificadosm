
<div class="container">
    <div>
        <br>
        <h1 class="title">EMPLEADOS</h1>
        <h2 class="subtitle">Lista de empleados</h2>
        <hr class="division">
        <div class="buttons">
            <a class="button is-info" href="./index.php?mostrar=empleados_nuevo">
                <span>AGREGAR EMPLEADOS</span>
            </a>
        </div>
    </div>
    <br>
    <div>

        <div class="container pb-6 pt-6 ">
                <div class="columns">
                    <div class="column">
                        <form action="" method="POST" autocomplete="off">
                            <input type="hidden" name="modulo_buscador" value="personal">
                            <div class="field is-grouped">
                                <P class="control is-expanded">
                                    <input class="input is-rounded" type="text" name="txt_buscador" 
                                    placeholder="¿Puedes realizar la busqueda por DNI, Apellidos o Usuario?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,30}" maxlength="30">
                                </P>
                                <p class="control">
                                    <button class="button is-info" type="submit">Buscar</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off">
                            <input type="hidden" name="modulo_buscador" value="personal">
                            <input type="hidden" name="eliminar_buscador" value="personal">
                            <p style="color:#000">Estas buscando <strong>"<?php echo $_SESSION['busque
                            <button type="submit" class="button is-danger is-rounded"> Eliminar Busqueda</button>da_personal'] ?>"</strong></p>
                            <br>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
