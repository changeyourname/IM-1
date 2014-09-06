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
    $Grid = new DataGrid("Secretaria","NOME,ATIVO","nome,ativo",$secretaria,"secretaria","id_adm_secretaria");
    $Grid->SetVisualizar();
    $Grid->SetEditar();
    $Grid->SetExcluir();
    $Grid->CriarGrid();
    
?>

@stop

