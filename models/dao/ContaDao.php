<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 30/12/16
 * Time: 15:53
 */
class ContaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criarConta(Conta $conta)
    {
        if($this->insert($conta->parametro()))
            return 1;
        else
            return 0;
    }

    public function alterar($tabela,$campos,$cond,$valores)
    {
        return $this->editar($tabela,$campos,$cond,$valores);
    }

    public function logon(Conta $conta)
    {
        $router=new Route();
        if (($conta->getTelefone() == USER && $conta->getSenha() == PASS) OR ($conta->getUtilizador() == USER && $conta->getSenha() == PASS)) {
            Session::set('logado',true);
            Session::set('user','SYS ADMIN');
            Session::set('role','sys');
            Session::set('type','sys');
            Session::set('grupo','admin');
            return 1975;//entrando como SYS ADMIN
        } else {
            $condicao = '((_telefone=? AND _senha=?) OR (_utilizador=? AND _senha=?))';
            $valor = array($conta->getTelefone(), $conta->getSenha(), $conta->getUtilizador(), $conta->getSenha());
            $ctrl = $this->buscaExaustiva($conta->pegarAtributos(), $conta->pegarClasse(), $condicao, $valor);
            if ($ctrl->rowCount() == 0) {
                return 0;//caso de utilizador ou senha errada
            } else {
                $k = $ctrl->fetchObject();
                if ($k->_estado == 0) {
                    return -1;//caso em que o utilizador e a senha estao correctos, mas a conta esta desactivada
                } else {//caso feliz
                    $objConta=new Conta();
                    $campos = array('*');
                    $id = array($k->_id_utilizador);
                    $user = $this->buscaExaustiva($campos, 'utilizador', '_id=?', $id)->fetchObject();
                    $id_grupo = array($user->_id_grupo);
                    $grupo = $this->buscaExaustiva($campos, 'grupo', '_id=?', $id_grupo)->fetchObject();
                    Session::set('logado',true);
                    Session::set('administracao',$user->_id_administracao);
                    Session::set('role',$grupo->_sigla);
                    Session::set('type',$grupo->_perfil);
                    Session::set('user', $objConta->usrname($user->_nome));
                    Session::set('id_user', $user->_id);
                    Session::set('grupo',$grupo->_sigla);
                    return utf8_decode(html_entity_decode($grupo->_perfil));
                }
            }

        }
    }

    public function actualizarEstado($dados=array())
    {
        $stmt=self::conn()->prepare("update conta set _estado=? where _id_utilizador=?");
        if($stmt->execute($dados))
            return 1;
        else
            return 0;
    }
    public function verificarSenha(Conta $conta)
    {
        $condicao = '(_utilizador=? AND _senha=?)';
        $valor = array($conta->getUtilizador(), $conta->getSenha());
        return $this->buscaExaustiva($conta->pegarAtributos(), $conta->pegarClasse(), $condicao, $valor)->rowCount();
    }
}
