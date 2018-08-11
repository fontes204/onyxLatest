<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 05:14
 */
class Administracao_municipal extends Atributo
{
    protected $_id;
    protected $_id_localizacao;
    protected $_nome;
    protected $_estado;

    /**
     * Administracao_municipal constructor.
     * @param $_id_localizacao
     * @param $_nome
     * @param $_estado
     */
    public function __construct($_id_localizacao=null, $_nome=null, $_estado=null)
    {
        $this->_id_localizacao = $_id_localizacao;
        $this->_nome = $_nome;
        $this->_estado = $_estado;
    }

}