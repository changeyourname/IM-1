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
    $Formulario->CriarForm("Unidade");
    $Formulario->CriarInputText("Nome","nome");
    $roles = DB::table('tb_adm_tipo_unidade')->where('ativo','=','1')->lists('nome','id_adm_tipo_unidade');
    $Formulario->CriarSelect("Tipo de Unidade","id_adm_tipo_unidade",$roles);
    $roles = DB::table('tb_adm_secretaria')->where('ativo','=','1')->lists('nome','id_adm_secretaria');
    $Formulario->CriarSelect("Secretaria Responsavel","id_adm_secretaria",$roles);
    $Endereco = new Endereco();
    $Endereco->CriarEndereco();
    $Formulario->CriarInputCheckbox("Ativo","ativo");
    ?>
    <div class="form-group"> 
    
    </div>
    <?php
    $Formulario->FinalizarForm("Salvar");
?>
@stop
