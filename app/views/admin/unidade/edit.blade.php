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
    $Formulario->CriarForm("Unidade",$unidadeAdm);
    $Formulario->CriarInputText("Nome","nome");
    $roles = DB::table('tb_tipo_adm_unidade')->where('ativo','=','1')->lists('nome','id_tipo_adm_unidade');
    $Formulario->CriarSelect("Tipo de Unidade","id_tipo_unidade",$roles);
    $Endereco = new Endereco();
    $Endereco->CriarEndereco();
    $Formulario->CriarInputCheckbox("Ativo","ativo");
    $Formulario->FinalizarForm("Salvar");
?>                                             
@stop