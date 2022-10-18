
   <h1> Seccion Generos: </h1>
   
   <form action="mostrargeneros" method="POST">
    <label>Buscar por genero: <input type="text" name="busqueda" required></label>      
    
    <button type="submit" class="btn btn-success">Buscar</button>
  </form>'
  {include file="formu2.tpl"} 
  <ul class="list-group">
    {foreach from=$generos item=$genero}
           <li class='list-group-item d-flex justify-content-between align-items-center'>
                <span>
                <b>Genero:</b><a href="generos/{$genero->ID_genero}"> {$genero->Genero}</a> 
                <b>  Edad: </b> +{$genero->Edad}
                </span> 
                {if isset($smarty.session.USER_ID)}
               <div class="ml-auto">
                  <a href='deleteGEN/{$genero->ID_genero}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                <a href='editGEN/{$genero->ID_genero}' type='button' class='btn btn-primary ml-auto'>Editar</a>
              {{/if}}
              </div>
            </li>
    {/foreach}
    </ul>
