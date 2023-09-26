<div class="container pb-6 pt-6 notification is-primary" style="background: #6F9AB0;">
	<div class="mb-6 mt-6 ">
		<h1 class="title center_mio">Agregar Nuevo Curso</h1>
		<hr class="division1">
	</div>

	<div class="form-rest mb-6 mt-6 "></div>
	<form action="./php/curso_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
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
              <label>ESTADO (*)</label>
              <input class="input" type="text" name="estado">
          </div>
      </div>
		</div>
    <div class="columns">
      <div class="column">
          <div class="control">
              <label>FECHA DE INICIO (*)</label>
              <input class="input" type="date" name="inicio">
          </div>
      </div>
			<div class="column">
          <div class="control">
              <label>FECHA DE FIN (*)</label>
              <input class="input" type="date" name="fin">
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
            <label>NOMBRE DEL DIRECTOR (*)</label>
            <input class="input" type="text" name="nombre_director">
          </div>
        </div>
        <div class="column">
          <div class="control">
            <label>FIRMA DIRECTOR (*)</label>
            <input class="input" type="file" name="firma_director">
          </div>
        </div>
    </div>
    <div class="columns">
      <div class="column">
        <div class="control">
          <label>NOMBRE DEL ESPECIALISTA (*)</label>
          <input class="input" type="text" name="nombre_especialista">
        </div>
      </div>
      <div class="column">
        <div class="control">
          <label>FIRMA ESPECIALISTA (*)</label>
          <input class="input" type="file" name="firma_especialista">
        </div>
      </div>
    </div>
    <div class="columns">
      <div class="column">
        <div class="control">
          <label>NOMBRE DEL INSTRUCTOR (*)</label>
          <input class="input" type="text" name="nombre_instructor">
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