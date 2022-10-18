{include file='templates/header.tpl'}

<h1>Editar Genero!</h1>

<form class="form-alta" action="editadoGEN" method="post">

<input type="hidden" name="ID_genero" value="{$generos->ID_genero}">

<div class="form-group row margin-15px">
  <label for="autor" class="col-sm-2 col-form-label">Genero:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="Genero" value="{$generos->Genero}">
  </div>
</div>
<div class="form-group row margin-15px">
  <label for="autor" class="col-sm-2 col-form-label">Edad:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="Edad" value="{$generos->Edad}" >
  </div>
</div>
<div class="form-group row margin-15px">
</div>

<div class="col-sm-10  btn-sub-center">
<button type="submit" class="btn btn-primary"  id="submit-create-libro">Editar Genero</button>
</div>
</div>

</div>
</form>

</div>


{include file='templates/footer.tpl'}