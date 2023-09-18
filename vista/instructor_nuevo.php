<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
    <h1 class="title center_mio">Agregar Nuevo Instructor</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<h6 ><strong>Datos Personales</strong></h6>
		<br>
		<div class="columns">
			<div class="column">
			  <div class="control">
				  <label>NOMBRES (*)</label>
					<input class="input" type="text" name="instructor_nombres">
			  </div>
			</div>
			<div class="column">
			  <div class="control">
				  <label>APELLIDOS (*)</label>
					<input class="input" type="text" name="instructor_apellidos">
			  </div>
			</div>
			<div class="column">
		    	<div class="control">
					<label>GENERO (*)</label>
				  	<input class="input" type="text" name="instructor_genero">
				</div>
		  	</div>
			
		</div>
		<div class="columns">
			<div class="column">
		    	<div class="control">
					<label>CELULAR (*)</label>
				  	<input class="input" type="number" name="instructor_celular">
				</div>
		  	</div>
			<div class="column">
		    	<div class="control">
					<label>CORREO (*)</label>
				  	<input class="input" type="email" name="instructor_correo">
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>GRADO INSTRUCCION (*)</label>
				  	<input class="input" type="text" name="instructor_grado">
				</div>
		  	</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>FIRMA DIGITAL (*)</label>
				  	<input class="input" type="file" name="instructor_firma">
				</div>
			</div>
			<div class="column">
		  	</div>
		  	<div class="column">
		  	</div>
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=instructor_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>