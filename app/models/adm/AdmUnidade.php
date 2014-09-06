<?php
class AdmUnidade extends \Eloquent
{
    protected $table = "tb_adm_unidade";
    protected $primaryKey = "id_adm_unidade";    
    
    public function AdmSecretaria()
    {
        return $this->belongsTo("AdmSecretaria","id_adm_secretaria");
    }
}
?>
