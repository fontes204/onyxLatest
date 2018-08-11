<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 19/06/17
 * Time: 10:27
 */
class Control_CredDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Control_Cred $cred)
    {
        if($this->insert($cred->parametro()))
            return 1;
        else
            return 0;
    }

    public function rastreio($id)
    {
        $param=array($id,0);
        $campos=array('*');
        return $this->buscaExaustiva($campos,'control_cred','_id_utilizador=? and _estado=?',$param)->rowCount();
    }

    public function actualizar($daddos=array())
    {
        $stm=self::conn()->prepare("update control_cred set _estado=? where _id_utilizador=?");
        if($stm->execute($daddos))
            return 1;
        else
            return 0;
    }
}