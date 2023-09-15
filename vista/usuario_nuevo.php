<div class="container pb-6 pt-6 notification is-primary" style="background: #81BEF7;">
	<div class="mb-6 mt-6 ">
	<h1 class="title center_mio">Agregar Nuevo Usuario</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<div class="columns">
			<div class="column">
				<div class="control">
						<label>usuario (*)</label>
						<input class="input" type="text" name="usuario_dni">
				</div>
			</div>
			<div class="column">
			</div>
		</div>
		<div class="columns">
			<div class="column">
			  	<div class="control">
				  	<label>Contraseña (*)</label>
					<input class="input" type="password" name="usuario_celular">
			  	</div>
			  	<div class="column">
				</div>
			</div>
		  	<div class="column">
		    	<div class="control">
					<label>Repetir Contraseña (*)</label>
				  	<input class="input" type="password" name="usuario_cargo">
				</div>
		  	</div>
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=usuario_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>