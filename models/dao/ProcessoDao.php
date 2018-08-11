<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:03
 */
class ProcessoDao extends Model
{
    public function __construct() {
        parent::__construct();
    }


    public function registar(Processo $processo)
    {
        if($this->insert($processo->parametro()))//persistindo os dados no banco de dados
            return $this->ultimoElemento($processo->pegarClasse())->_id;
        else
            return 0;
    }

    public function listar($id_processo)
    {
        $campos=array('*');
        $valor=array($id_processo);
        return $this->buscaExaustiva($campos,'processo','_id=?',$valor)->fetchObject();
    }

    public function listarEntrada($id_user)
    {
        $campo=array('distinct r._nome, r._id as codReq, p._assunto, p._num_processoGeral, es._data,p._id, p._id_prioridade');
        $tabela='requerente r, processo p, documento_processo dp, entradasaida es';

        $condicao='p._id_requerente=r._id and dp._id_documento in(1,3) and p._id=dp._id_processo and p._id=es._id_processo and es._descDest=\'entrada\' and es._idDest=?';
        $valor=array($id_user);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchAll();
    }
    public function listarEntradaAdmin($id_user)
    {
        $campo=array('distinct p._id, r._nome, p._assunto, p._num_processoGeral, pcr._data, pcr._destino');
        $tabela='requerente r, processo p, entradasaida es, parecer pcr';
        $condicao='p._id_requerente=r._id and p._id=es._id_processo and es._descDest=\'entrada\' and es._idDest=? and pcr._id_processo=p._id';
        $valor=array($id_user);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor,"group by p._id")->fetchAll();
    }

    public function listarEntradaTEC($id_user,$fase,$id_prc)
    {
        $campo=array('distinct p._id, r._nome, p._assunto, p._num_processoGeral, pcr._data, pcr._destino');
        $tabela='requerente r, processo p, entradasaida es, parecer pcr,fase fs';
        $condicao='p._id_requerente=r._id and p._id=es._id_processo and es._descDest=\'entrada\' and es._idDest=? and pcr._id_processo=p._id and fs._id=pcr._id_fase and fs._fase=? and p._id=?';
        $valor=array($id_user,$fase,$id_prc);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor,"group by p._id");
    }

    public function numEntradaAdmin($id_user)
    {
        $campo=array('distinct p._id, r._nome, p._assunto, p._num_processoGeral, pcr._data, pcr._destino');
        $tabela='requerente r, processo p, entradasaida es, parecer pcr';
        $condicao='p._id_requerente=r._id and p._id=es._id_processo and es._descDest=\'entrada\' and es._idDest=? and pcr._id_processo=p._id';
        $valor=array($id_user);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor,"group by p._id")->rowCount();
    }
    public function numEntradaSec($id_user)
    {
        $campo=array('distinct r._nome, p._assunto, p._num_processoGeral, es._data,p._id');
        $tabela='requerente r, processo p, documento_processo dp, entradasaida es';
        $condicao='p._id_requerente=r._id and dp._id_documento in(1,3) and p._id=dp._id_processo and p._id=es._id_processo and es._descDest=\'entrada\' and es._idDest=?';
        $valor=array($id_user);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor)->rowCount();
    }
    public function listarSaida($id_user)
    {
        $campo=array('distinct r._nome, p._assunto, p._num_processoGeral, es._data,p._id');
        $tabela='requerente r, processo p, documento_processo dp, entradasaida es';
        $condicao='p._id_requerente=r._id and dp._id_documento in(1,3) and p._id=dp._id_processo and p._id=es._id_processo and es._descOrg=\'saida\' and es._idOrg=?';
        $valor=array($id_user);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchAll();
    }

    public function dadosTerreno($id_utente)
    {
        $campo=array('*');
        $tabela='terreno t';
        $condicao='t._id_utente';
        $valor=array($id_utente);
        return $this->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchObject();
    }
    public function buscarDestino($idLogado,$id_processo,$fase)
    {
        $campos=array('_destino');
        $cond='_id_utilizador=? and _id_processo=? and _id_fase=?';
        $vl=array($idLogado,$id_processo,$fase);
        $k= $this->buscaExaustiva($campos,'parecer',$cond,$vl)->fetchObject();

        $k= $this->listarPorId('utilizador',$k->_destino)->fetchObject();
        $k= $this->listarPorId('grupo',$k->_id_grupo)->fetchObject();
        return $this->listarPorId('departamento',$k->_id_departamento)->fetchObject();


    }

    public function buscarNome($idLogado,$id_processo,$fase)
    {
        $campos=array('_destino');
        $cond='_id_utilizador=? and _id_processo=? and _id_fase=?';
        $vl=array($idLogado,$id_processo,$fase);
        $k= $this->buscaExaustiva($campos,'parecer',$cond,$vl)->fetchObject();
        return $this->listarPorId('utilizador',$k->_destino)->fetchObject();
    }

    public function editarPrioridade($tabela,$campos,$cond,$valores)
    {
        try {
            $stmt = self::conn()->prepare("UPDATE ".$tabela." SET ".$campos.'='.$valores." WHERE ".$cond);
            if($stmt->execute())
                return true;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function prioridade($id_prioridade){
    switch ($id_prioridade) {
         case '1':
             return 'default';
             break;
         case '2':
             return 'success';
             break;
         case '3':
             return 'warning';
             break;
         case '4':
             return 'danger';
             break;
         default:
             return 'default';
             break;
     } 
  }
}