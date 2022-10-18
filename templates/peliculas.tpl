{include file="header.tpl"}

{include file="formu.tpl"}

<ul class="list-group">
    {foreach from=$pelis item=$peli}
               <li class='list-group-item d-flex justify-content-between align-items-center'>
               <span>


               <b>Pelicula:</b><a href="pelicula/{$peli->Pelicula_ID}">{$peli->Titulo}/</a>
               <b>Genero:</b> {$peli->ID_genero}-{$peli->Genero}/
               <b>Fecha de Lanzamiento:</b> {$peli->Fecha_de_estreno}/  
               <b>Duracion:</b> {$peli->Duracion}/     
               </span> 
               {if isset($smarty.session.USER_ID)}
                <div class="ml-auto">
                <a href='edit/{$peli->Pelicula_ID}' type='button' class='btn btn-primary ml-auto'>editar</a>
               <a href='delete/{$peli->Pelicula_ID}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                </li>
                </div>
            {{/if}}
        {/foreach}
       </ul>







{include file="footer.tpl"}