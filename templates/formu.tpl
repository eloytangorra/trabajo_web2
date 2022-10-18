<!-- formulario de alta de tarea -->
<h1 class="border">Agregar Pelicula</h1>
<form action="add" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Título</label>
                <input name="Titulo" type="text" class="form-control" required>
            </div>
        </div>
   <div class="col-3">
            <div class="form-group">
                <label>genero</label>
                <select name="ID_genero" class="form-control">
                {foreach from=$genero item=$gen}
                   <option value={$gen->ID_genero}> {$gen->Genero} </option>
                {/foreach}
                
            
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Duracion</label>
        <input name="Duracion" class="form-control" rows="3" required></input>
    </div>
    <div class="form-group">
        <label>Fecha</label>
        <input name="Fecha_de_estreno" class="form-control" rows="3" required></input>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Agregar</button>
</form>

