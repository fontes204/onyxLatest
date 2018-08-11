<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 12/01/17
 * Time: 15:40
 */
class DocumentoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Documento $documento)
    {
        if($this->consultarNome($documento->getNome())==0) {
            if ($this->insert($documento->parametro()))
                return 1;
            else
                return 0;
        }else{
            return 3;
        }
    }

    public function consultarNome($nome)
    {
        $param=array($nome);
        $field=array('*');
        return $this->buscaExaustiva($field,'documento','_nome=?',$param)->rowCount();
    }

    public function rastreio($id)
    {
        $param=array($id);
        $field=array('*');
        return $this->buscaExaustiva($field,'documento_processo','_id_documento=?',$param)->rowCount();
    }

    public function actualizar($daddos=array())
    {
        $stm=self::conn()->prepare("update documento set _nome=?, _descricao=? where _id=?");
        if($stm->execute($daddos))
            return true;
        else
            return false;
    }
}