<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
	<h1 class="title center_mio">Agregar Nuevo Empleado</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<h6><strong>Datos Personales</strong></h6>
		<br>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>NOMBRES (*)</label>
					<input class="input" type="text" name="usuario_dni">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>APELLIDOS (*)</label>
					<input class="input" type="text" name="usuario_celular">
				</div>
			</div>
		  	<div class="column">
				<div class="control">
					<label>CELULAR (*)</label>
					<input class="input" type="number" name="usuario_cargo">
				</div>
		  	</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>CORREO (*)</label>
				  	<input class="input" type="text" name="usuario_especialidad">
				</div>
			</div>
			<div class="column">

			</div>
		</div>
		<br>
		<h6><strong>Otros datos</strong></h6>
		<br>
		
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>CARGO (*)</label>
					<input class="input" type="text" name="usuario_usuario">
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>ROL (*)</label>
					<input class="input" type="password" name="usuario_clave_1">
				</div>
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