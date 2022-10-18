{include file='templates/header.tpl'}
<h2 id="asd"class="display-4" style="margin: 0px;" > El resultado de tu busqueda es: </h2>

<ul class="list-group" style="background-color:#FF7A33; text-align: center;">
       
{foreach from=$resultados item=$resultado}
    
<li> <b>Pelicula:  </b>{$resultado->Titulo} - <b> Fecha de Lanzamiento: </b>{$resultado->Fecha_de_estreno} <b> - Genero : </b>  {$resultado->Genero } - <b>  Edad: </b> +{$resultado->Edad}</li>
{/foreach}
</ul>
{include file='templates/footer.tpl'}