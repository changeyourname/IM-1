@extends('layouts.main')    
@section('content')
@if(Session::has('message'))                                                          
<div class="alert alert-info fade in">                                                
    <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <div class="alert-info">{{Session::get('message')}}</div>
</div>
@endif
<?php
    $Grid = new DataGrid("Modulo","NOME,SISTEMA,ICONE,ATIVO","nome,id_adm_sistema,icone,ativo",$modulo,"modulo","id_adm_modulo");
    $Grid->SetVisualizar();
    $Grid->SetEditar();
    $Grid->SetExcluir();
    $Grid->CriarGrid();
?>
@stop

