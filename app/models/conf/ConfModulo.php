<?php
class ConfModulo extends \Eloquent
{
    protected $table = "tb_conf_modulo";
    protected $primaryKey = "id_modulo";    
 
    public function ConfSistema()
    {
        return $this->belongsTo("ConfSistema","id_sistema");
    }
}
?>
