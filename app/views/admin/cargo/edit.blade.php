@extends('layouts.main')    
<?php
    $Formulario = new Formulario();
?> 
@section('content')
@if(Session::has('message'))
<div class="alert alert-info fade in">
    <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <div class="alert-info">{{Session::get('message')}}</div>
</div>
@endif

@if(HTML::ul($errors->all()))
<div class="alert alert-danger fade in">
    <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
{{ HTML::ul($errors->all()) }}
</div>
@endif

<?php
    $Formulario->CriarForm("Cargo",$cargo);
    $Formulario->CriarInputText("Nome","nome");
    $Formulario->CriarTextArea("Descricao","descricao");                           
    $Formulario->CriarInputCheckbox("Ativo","ativo");
    $Formulario->FinalizarForm("Salvar");
?>                                             
@stop