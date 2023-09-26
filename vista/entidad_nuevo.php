<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
	<h1 class="title center_mio">Agregar Nueva Entidad</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/entidad_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
			<div class="column">
    <div class="control">
				<label>RUC (*)</label>
					<input class="input" type="number" name="ruc">
			</div>
			</div>
			<div class="column">
                    <label>NOMBRE (*)</label>
					<input class="input" type="text" name="nombre">
			</div>
			<div class="column">
                    <label>CELULAR (*)</label>
					<input class="input" type="number" name="celular">
			</div>
		</div>
		<div class="columns">
			<div class="column">
			<div class="control">
				<label>DIRECCIÓN (*)</label>
					<input class="input" type="number" name="direccion">
			</div>
			</div>
			<div class="column">
                    <label>DESCRIPCIÓN (*)</label>
					<input class="input" type="text" name="descripcion">
			</div>
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=entidad_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>