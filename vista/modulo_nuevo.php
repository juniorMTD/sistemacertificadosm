<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
	<h1 class="title center_mio">Agregar Nuevo Modulo</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/modulo_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
			<div class="column">
	<div class="control">
    <label>NOMBRE DEL MODULO (*)</label>
					<input class="input" type="text" name="nombre_modulo">
		</div>
			</div>
			<div class="column">
		<div>
				
		</div>
			</div>
			<div class="column">

			</div>
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=modulo_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>