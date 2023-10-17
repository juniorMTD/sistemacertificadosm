<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
    <h1 class="title center_mio">Agregar Nuevo Instructor</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/instructor_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/from-data">

		<h6 ><strong>Datos Personales</strong></h6>
		<br>
		<div class="columns">
			<div class="column">
			<div class="control">
    <label>NOMBRES (*)</label>
					<input class="input" type="text" name="nombres">
    </div>
			</div>
			<div class="column">
    <div class="control">
	<label>APELLIDOS (*)</label>
					<input class="input" type="text" name="apellidos">
        </div>
			</div>
			<div class="column">
		<div class="control">
					<label>GRADO INSTRUCCION (*)</label>
					<input class="input" type="text" name="grado_instruccion">
				</div>
			</div>
			
		</div>
		<div class="columns">
			<div class="column">
		<div class="control">
					<label>CELULAR (*)</label>
				<input class="input" type="number" name="celular">
				</div>
		</div>
			<div class="column">
		<div class="control">
					<label>CORREO (*)</label>
				<input class="input" type="email" name="correo">
				</div>
		</div>
		<div class="column">
		<div class="control">
					<label>FIRMA DIGITAL (*)</label>
					<input class="input" type="file" name="firma_digital">
				</div>
		</div>
		</div>
		<div class="column">
			<div class="control">
						<label>GENERO (*)</label>
							<select name="" id="" class="input">
								<?php								 
								require_once "./php/consultas.php";
						
								foreach($datosgenero as $rows){
								?>
								<option value="<?php echo $rows['idgenero'] ?>"><?php echo $rows['nombre_genero'] ?></option>
								<?php
								}
								?>
							</select>
			</div>	
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=instructor_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>