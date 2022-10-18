{include file='templates/header.tpl'}



<div class="container">
<div class="libro">
<input type="hidden" name="ID_Genero" value="{$generos->ID_Genero}">
    <div class="title">
        <h3 class="mb-4">Tipo de Genero: <span>{$generos->Genero}</span></h3>
    </div>
    <div class="autor">
        <h4>Edad: +<span>{$generos->Edad}</span></h4>
    </div>
    {if isset($smarty.session.USER_ID)}
    <a href='editGEN/{$generos->ID_genero}' type='button' class='btn btn-primary ml-auto'>Editar</a>
{{/if}}
    </div>

{include file='templates/footer.tpl'}