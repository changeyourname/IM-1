<?php
use Illuminate\Support\Facades\Form as Form;
use Illuminate\Support\Facades\HTML as HTML;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\URL as URL;                      

class Formulario
{
    public $acao;
    public $caminho;
    public $id;
    public $titulo;
    public $objeto;
        
    
    function CriarForm($titulo,$objeto=null)
    {
        $this->titulo = $titulo;
        $url = explode("/",$_SERVER["REQUEST_URI"]);
        $this->acao = $url[count($url)-1];
        $this->objeto = $objeto;
        
        if($this->acao == "create"){
            $this->caminho = $url[count($url)-2];
        }else{
            $this->id = $url[count($url)-2];
            $this->caminho = $url[count($url)-3];
        }
    ?>
    <a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="<?php echo URL::to($this->caminho.'/') ?>"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
        <div style="clear: both;"></div>

        <section class="panel">
            <header class="panel-heading">
               <?php echo (($this->acao=="create")?'Criar ':'Editar ') ?><?php echo $this->titulo ?>
            </header>
            <div class="panel-body">
        <?php
         if($this->acao=="create")
            echo Form::open(array('url' => $this->caminho,'files' => true,'id'=>'form-p'));
         else         
            echo Form::model($this->objeto, array('route' => array($this->caminho.'.update', $this->id), 'method' => 'PUT','files'=>true,'id'=>'form-p'));
    }    
    
    function CriarInputText($nome,$campo,$class="")
    {
        if($this->acao == "create"){
            ?>
            <div class="form-group">
            <?php
            echo Form::label($campo, $nome);
            echo Form::text($campo, Input::old($campo), array('class' => 'form-control '.$class));
            ?>
            </div>
            <?php
        }else{
            ?>
            <div class="form-group">
            <?php
            echo Form::label($campo, $nome);
            echo Form::text($campo, null, array('class' => 'form-control '.$class));
            ?>
            </div>
            <?php
        }
    }
    
    function CriarInputSenha($nome,$campo,$class="")
    {
        if($this->acao == "create"){
            ?>
            <div class="form-group">
            <?php
            echo Form::label($campo, $nome);
            echo Form::password($campo, array('class' => 'form-control '.$class));
            ?>
            </div>
            <?php
        }else{
            ?>
            <div class="form-group">
            <?php
            echo Form::label($campo, $nome);
            echo Form::password($campo, array('class' => 'form-control '.$class));
            ?>
            </div>
            <?php
        }
    }
    
    function CriarInputFile($nome,$campo,$caminho="",$class="")
    {
        if($this->acao == "create"){
            ?>
            
            <div class="form-group last">
                <label><?php echo Form::label($campo, $nome); ?></label>
                <div>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                               <span class="btn btn-default btn-file">
                               <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Selecionar</span>
                               <span class="fileupload-exists"><i class="fa fa-undo"></i> Alterar</span>
                               <?php echo Form::file($campo,array('class' => 'default')); ?>
                               </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remover</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
        }else{
            ?>
            <div class="form-group last">
                <label><?php echo Form::label($campo, $nome); ?></label>
                <div>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <?php if($this->objeto->$campo!=""){?>
                            <img src="<?php echo URL::to("/") .$caminho. $this->objeto->$campo ?>" alt="" />
                            <?php }else{ ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                            <?php } ?>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                               <span class="btn btn-default btn-file">
                               <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Selecionar</span>
                               <span class="fileupload-exists"><i class="fa fa-undo"></i> Alterar</span>
                               <?php echo Form::file($campo,array('class' => 'default')); ?>
                               </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remover</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    
    function CriarInputCheckbox($nome,$campo)
    {
         ?>
         <div class="form-group">
         <?php
            echo Form::label($campo, $nome);
            ?>
            <div class="slide-toggle">                            
                <?php 
                if($this->acao=="create")
                    echo Form::checkbox($campo,"1","",array("class"=>"js-switch")); 
                else
                    echo Form::checkbox($campo,"1",$this->objeto->$campo,array("class"=>"js-switch")); 
                ?>        
            </div>        
         </div>        
        <?php
    }
    
    function CriarSelect($nome,$campo,$arr=null,$marcado="")
    {        
        ?>
         <div class="form-group">
         <?php
            echo Form::label($campo, $nome);
            ?>
            <div class="slide-toggle">                                               
            <?php 
                if($this->acao=="create")
                    echo Form::select($campo,$arr,$marcado,array('class'=>'form-control')); 
                else
                    echo Form::select($campo,$arr,$this->objeto->$campo,array('class'=>'form-control')); 
             ?>
            </div>
         </div>
        <?php
    }    
    
    function CriarTextArea($nome,$campo)
    {
        ?>
            <div class="form-group">
                <?php
                echo Form::label($campo, $nome);
                ?>
                <div>        
                    <?php 
                    if($this->acao=="create")
                        echo Form::textarea($campo,'',array("class"=>"form-control"));
                    else
                        echo Form::textarea($campo,$this->objeto->$campo,array("class"=>"form-control"));
                    ?>
                </div>
            </div>
        <?php
    }
    
    function FinalizarForm($titulo,$class=null,$submit=true)
    {
        if($submit)
            echo  Form::submit($titulo, array('class' => (($class)?$class:'btn btn-primary ')));
        else
            echo "<button type='button' class='btn btn-primary' id='btn-verificar'>".$titulo."</button>";
        
        echo  Form::close();
        ?>
            </div>
    </section>
        <?php
    }
    
}  
?>
