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
    $Formulario->CriarForm("Usu&aacute;rio",$usuario);
    $Formulario->CriarInputFile("Foto","img","/imagens/usuarios/");    
    $Formulario->CriarInputText("Nome","nome");
    $Formulario->CriarInputText("Data Nascimento","dt_nascimento","data");
    $Formulario->CriarInputText("Telefone","telefone","telefone");
    $Formulario->CriarInputText("Celular","celular","celular");
    $Formulario->CriarInputText("E-mail","email");
    $Formulario->CriarInputText("Login","login");
    $Formulario->CriarInputSenha("Senha","password");
    $sexo = array("M"=>"Masculino","F"=>"Feminino");
    $Formulario->CriarSelect("Sexo","sexo",$sexo);    
    $sistema = DB::table('tb_adm_sistema')->where("ativo","=","1")->orderBy('posicao','asc')->get();                     
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
                    $modulo = DB::table('tb_adm_modulo')->where("id_adm_sistema","=",$sis->id_adm_sistema)->orderBy('posicao','asc')->get();                 
                    foreach($modulo as $mod)
                    {                     
                    
                    $visualizar = 0;
                    $inserir    = 0;
                    $editar     = 0;
                    $excluir    = 0;       
                    
                    $permissao = DB::table('tb_adm_permissao')
                        ->where("id_adm_modulo","=",$mod->id_adm_modulo)
                        ->where("id_adm_usuario","=",$usuario->id_adm_usuario)
                        ->get();                                              
                        foreach($permissao as $per)
                        {
                            $visualizar = $per->visualizar;
                            $inserir    = $per->inserir;
                            $editar     = $per->editar;
                            $excluir    = $per->excluir;
                        }
                        ?>
                        <tr>
                            <td align="center"><?php echo $mod->nome ?></td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">                                        
                                        <input name="mod[<?php echo $mod->id_adm_modulo ?>][visualizar]" type="checkbox" value="1" <?php echo (($visualizar)?'checked':'') ?>>
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_adm_modulo ?>][inserir]" type="checkbox" value="1" <?php echo (($inserir)?'checked':'') ?>>
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_adm_modulo ?>][editar]" type="checkbox" value="1" <?php echo (($editar)?'checked':'') ?>>
                                    </div>
                                </div>
                                
                                
                            </td>
                            <td align="center">
                                <div class="flat-green single-row">
                                    <div class="radio ">
                                        <input name="mod[<?php echo $mod->id_adm_modulo ?>][excluir]" type="checkbox" value="1" <?php echo (($excluir)?'checked':'') ?>>
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