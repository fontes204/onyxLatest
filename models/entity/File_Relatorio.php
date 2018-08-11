<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 29/05/17
 * Time: 17:29
 */
class File_Relatorio extends Atributo
{
    protected $_id;
    protected $_id_relatorio;
    protected $_path;

    /**
     * File_Relatorio constructor.
     * @param $_id_relatorio
     * @param $_path
     */
    public function __construct($_id_relatorio, $_path)
    {
        $this->_id_relatorio = $_id_relatorio;
        $this->_path = $_path;
    }


}