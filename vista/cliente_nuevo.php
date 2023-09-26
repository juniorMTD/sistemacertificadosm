<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
    <h1 class="title center_mio">Agregar Nuevo Cliente</h1>
		<hr class="division1">
	</div>
	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/personal_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<div class="columns">
            <div class="column">
			<div class="control">
				<label>NOMBRES (*)</label>
					<input class="input" type="text" name="cliente_nombre">
			</div>
			</div>
            <div class="column">
				<div class="control">
					<label> APELLIDO PATERNO(*)</label>
					<input class="input" type="text" name="cliente_apelpaterno">
				</div>
		</div>
			<div class="column">
				<div class="control">
					<label>APELLIDO MATERNO (*)</label>
					<input class="input" type="text" name="cliente_apelmaterno">
				</div>
		</div>
		</div>
		<div class="columns">
        <div class="column">
			<div class="control">
				<label>DNI (*)</label>
					<input class="input" type="number" name="cliente_dni">
			</div>
			</div>
		<div class="column">
		<div class="control">
					<label>GENERO (*)</label>
				<input class="input" type="text" name="cliente_genero">
				</div>
		</div>	
		<div class="column">
		<div class="control">
					<label>CELULAR (*)</label>
				<input class="input" type="number" name="cliente_celular">
				</div>
		</div>
		
		</div>
		<div class="columns">
			<div class="column">
		<div class="control">
					<label>CORREO ELECTRONICO
                        (*)</label>
				<input class="input" type="text" name="cliente_correo">
				</div>
		</div>
			<div class="column">
			</div>
		</div>
		<br>
		<p class="has-text-centered">
			<a href="./index.php?mostrar=cliente_form" class="button is-danger is-rounded">Cancelar</a>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>