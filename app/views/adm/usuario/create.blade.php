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
    $Formulario->CriarForm("Usu&aacute;rio");
    $Formulario->CriarInputFile("Foto","img");    
    $Formulario->CriarInputText("Nome","nome");
    $Formulario->CriarInputText("Data Nascimento","dt_nascimento","data");
    $Formulario->CriarInputText("Telefone","telefone","telefone");
    $Formulario->CriarInputText("Celular","celular","celular");
    $Formulario->CriarInputText("E-mail","email");
    $Formulario->CriarInputText("Login","login");
    $Formulario->CriarInputSenha("Senha","password");
    $sexo = array("M"=>"Masculino","F"=>"Feminino");
    $Formulario->CriarSelect("Sexo","sexo",$sexo);
    $sistema = DB::table('tb_conf_sistema')->where("ativo","=","1")->orderBy('posicao','asc')->get();                     
    foreach($sistema as $sis)
    {
    ?>  
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo $sis->nome ?></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <td>Modulo</td>
                        <td>Visualizar</td>
                        <td>Inserir</td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                    <tbody>
                    <?php
                    $modulo = DB::table('tb_conf_modulo')->where("id_sistema","=",$sis->id_sistema)->orderBy('posicao','asc')->get();                 
                    foreach($modulo as $mod)
                    {                     
                        ?>
                        <tr>
                            <td align="center"><?php echo $mod->nome ?></td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">                                        
                                        <input name="mod[<?php echo $mod->id_modulo ?>][visualizar]" type="checkbox" value="1">
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_modulo ?>][inserir]" type="checkbox" value="1">
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_modulo ?>][editar]" type="checkbox" value="1">
                                    </div>
                                </div>
                                
                                
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_modulo ?>][excluir]" type="checkbox" value="1">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </thead>                                      
            </table>
        </div>
    </div>
    <?php
    }
    
    $Formulario->CriarInputCheckbox("Ativo","ativo");    
    $Formulario->FinalizarForm("Salvar");
?>
@stop
