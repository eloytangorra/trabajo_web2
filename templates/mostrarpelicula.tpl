{include file='templates/header.tpl'}



<div class="container">
<div class="libro">
<input type="hidden" value="{$pelicula->Pelicula_ID}">
    <div class="title">
        <h3 class="mb-4">Nombre: <span>{$pelicula->Titulo}</span></h3>
    </div>
    <div class="autor">
        <h4>Fecha: <span>{$pelicula->Fecha_de_estreno}</span></h4>
    </div>
    <div class="genero">
      <h4>Genero: <span>{$pelicula->Genero}</span></h4>
    </div>
    <div class="genero">
    <h4>Duracion: <span>{$pelicula->Duracion}min</span></h4>
  </div>
  
  

   
  {if isset($smarty.session.USER_ID)}
    <a href='edit/{$pelicula->Pelicula_ID}' type='button' class='btn btn-primary ml-auto'>Editar</a>
  {{/if}}
    </div>
{include file='templates/footer.tpl'}