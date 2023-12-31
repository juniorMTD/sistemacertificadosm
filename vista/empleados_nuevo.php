<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
		<h1 class="title center_mio">Agregar Nuevo Empleado</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/empleados_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">

		<h6><strong>Datos Personales</strong></h6>
		<br>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>NOMBRES (*)</label>
					<input class="input" type="text" name="nombre">
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
					<label>CELULAR (*)</label>
					<input class="input" type="number" name="celular">
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>CORREO (*)</label>
					<input class="input" type="text" name="correo">
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
		<h6><strong> Credenciales de acceso</strong></h6>
		<br>

		
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>usuario (*)</label>
					<input class="input" type="text" name="usuario">
				</div>
			</div>
			<div class="column">
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Contraseña (*)</label>
					<input class="input" type="password" name="contrasena">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Repetir Contraseña (*)</label>
					<input class="input" type="password" name="contrasena_duplicado">
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Rol (*)</label>
					<select name="rol" id="" class="input">
								<?php								 
								require_once "./php/consultas.php";
						
								foreach($datosrol as $rows){
								?>
								<option value="<?php echo $rows['idrol'] ?>"><?php echo $rows['nombre_rol'] ?></option>
								<?php
								}
								?>
							</select>

				</div>
			</div>
			<div class="column">
			</div>
		</div>

		<br>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=empleados_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>