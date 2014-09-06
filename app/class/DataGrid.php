<?php
class DataGrid
{
    public $nome;
    public $titulo;
    public $campos;
    public $objeto;
    public $visualizar= false;
    public $editar = false;
    public $excluir = false;
    public $caminho;
    public $id;
    
    function __construct($nome,$titulo,$campos,$objeto,$caminho,$id)
    {
        $this->nome = $nome;
        $this->titulo = explode(",",$titulo);
        $this->campos = explode(",",$campos);
        $this->objeto = $objeto;
        $this->caminho = $caminho;
        $this->id= $id;
    }
    
    function SetVisualizar()
    {
        $this->visualizar = true;
    }
    
    function SetEditar()
    {
        $this->editar = true;
    }
    
    function SetExcluir()
    {
        $this->excluir = true;
    }
        
    
    function CriarGrid()
    {
        ?>               
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="<?php echo URL::to($this->caminho.'/create') ?>"><i class="fa fa-flash"></i>&nbsp;Criar <?php echo utf8_encode($this->nome); ?></a>
<div style="clear: both;"></div>       
<section class="panel">
<header class="panel-heading">
        Lista de <?php echo utf8_encode($this->nome); ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
        
        <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
            <tr>
            <?php
            foreach($this->titulo as $dados)
            {
                ?>
                <th><?php echo $dados ?></th>
                <?php
            }
            if($this->visualizar or $this->editar or $this->excluir)            
            {
            ?>
                <th>A&ccedil;&otilde;es</th>
             <?php
            }
            ?>                
            </tr>
            </thead>
        <tbody>    
        <?php
        $cont=0;
        foreach($this->objeto as $key=>$value)
        {
            ?>
            <tr>
                <?php                
                foreach($this->campos as $c)
                {
                    if($c=="ativo"){
                     ?>
                        <td><?php echo utf8_encode((($value->$c==1)?'Sim':'Não')); ?></td>
                    <?php   
                    }else{
                     ?>
                        <td><?php echo $value->$c ?></td>
                    <?php   
                    }
                }        
                
                if($this->visualizar or $this->editar or $this->excluir)
                {
                ?>
                <td align="center">
                    <?php
                    if($this->visualizar){
                    ?>                                                                               
                    <a class="btn btn-small btn-success" href="<?php  echo URL::to($this->caminho."/".$this->objeto[$cont][$this->id]) ?>">Visualizar</a>
                    <?php
                    }
                    if($this->editar){
                    ?>
                    <a class="btn btn-small btn-info" href="<?php echo URL::to($this->caminho."/".$this->objeto[$cont][$this->id] . '/edit') ?>">Editar</a>
                    <?php 
                    }
                    if($this->excluir){
                    ?>    
                    <a href="#myModal" data-value="<?php echo $this->objeto[$cont][$this->id] ?>" data-toggle="modal" class="btn btn-danger deletar">Excluir</a>                    
                    <?php
                    }
                    ?>
                </td>
                <?php
                }
                ?>
            </tr>
        <?php   
        $cont++;
        }
        ?>
        </tbody>    
            <tfoot>
                <tr>
                    <?php
                    foreach($this->titulo as $dados)
                    {
                        ?>
                        <th><?php echo $dados ?></th>
                        <?php
                    }

                    if($this->visualizar or $this->editar or $this->excluir)            
                    {
                    ?>
                        <th>A&ccedil;&otilde;es</th>
                     <?php
                    }
                    ?>                
                </tr>                                                           
            </tfoot>
        </table>  
        </div>
      </div>     
</section>                        
<script type="text/javascript">        
$(function(){
   $(".deletar").click(function(event){
       event.preventDefault();
       var id = $(this).attr("data-value");
       var url = $(".form-excluir").attr("action");       
       $(".form-excluir").attr("action", url+"/"+id);       
   }); 
});
</script>
<?php echo Form::open(array('url' => $this->caminho, 'class' => 'pull-right form-excluir')) ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title">Exlcus&atilde;o de Registro</h4>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este Registro ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                
                    <?php echo Form::hidden('_method', 'DELETE') ?>
                    <?php echo Form::submit('Excluir', array('class' => 'btn btn-warning')) ?>
            </div>
        </div>
    </div>
</div>
<?php echo Form::close() ?>
            <?php
    }
    
}  
?>
