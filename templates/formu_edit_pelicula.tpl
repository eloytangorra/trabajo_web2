{include file='templates/header.tpl'}

<h1>Editar Pelicula</h1>
<form class="form-alta" action="editadopeli" method="post">
<input type="hidden" name="Pelicula_ID" value="{$pelicula->Pelicula_ID}">

<div class="form-group row margin-15px">
  <label for="autor" class="col-sm-2 col-form-label">Titulo:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="Titulo" value="{$pelicula->Titulo}">
  </div>
</div>
<div class="form-group row margin-15px">
  <label for="id_categoria" class="col-sm-2 col-form-label">Genero:</label>
  <div class="col-sm-10">
    <select class="form-select" name="ID_genero">
    {foreach from=$genero item=$gen}
      <option value={$gen->ID_genero}> {$gen->Genero} </option>
    {/foreach}
    </select>
    </div>
    </div>
    <div class="form-group row margin-15px">
  <label for="autor" class="col-sm-2 col-form-label">Duracion:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="Duracion" value="{$pelicula->Duracion}">
  </div>
</div>

<div class="form-group row margin-15px">
  <label for="autor" class="col-sm-2 col-form-label">Fecha de estreno:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="Fecha_de_estreno" value="{$pelicula->Fecha_de_estreno}" >
  </div>
</div>





<div class="col-sm-10  btn-sub-center">
<button type="submit" class="btn btn-primary"  id="submit-create-libro">Editar Pelicula</button>
</div>
</div>
</div>
</form>

</div>


{include file='templates/footer.tpl'}
