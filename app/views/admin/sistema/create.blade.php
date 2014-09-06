@extends('layouts.main')    
<?php
    $Formulario = new Formulario();
?>
@section('content')
<!-- if there are creation errors, they will show here -->

@if(HTML::ul($errors->all()))
<div class="alert alert-danger fade in">
    <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
{{ HTML::ul($errors->all()) }}
</div>
@endif
<?php
    $Formulario->CriarForm("Sistema");
    $Formulario->CriarInputText("Nome","nome");
    $Formulario->CriarInputText("URL","url");    
    $Formulario->CriarInputText("Icone","icone");    
    $Formulario->CriarInputCheckbox("Ativo","ativo");
    ?>
    <div class="form-group"> 
    
    </div>
    <?php
    $Formulario->FinalizarForm("Salvar");
?>
@stop
