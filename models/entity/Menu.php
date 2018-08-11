<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 10/10/17
 * Time: 14:22
 */



class Menu extends Atributo
{
    protected $_id;
    protected $_descricao;
    protected $_id_utilizador;
    protected $_tempo;

    /**
     * Menu constructor.
     * @param $_descricao
     * @param $_id_utilizador
     * @param $_tempo
     */
    public function __construct($_descricao=null, $_id_utilizador=null, $_tempo=null)
    {
        $this->_descricao = $_descricao;
        $this->_id_utilizador = $_id_utilizador;
        $this->_tempo = $_tempo;
    }


}