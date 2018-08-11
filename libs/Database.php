<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 13/05/16
 * Time: 11:10
 */
class Database
{
    private static $conn;

    public function __construct(){
        $this->conn()->exec('SET CHARACTER SET utf8');
    }
    public function conn()
    {
        if (is_null(self::$conn)) {
            try {
                self::$conn = new PDO(DB_TYPE .':host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASS);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }
        return self::$conn;
    }

    public function retornaFields($dados=array())
    {
        $limites=array("[","]");
        $k=json_encode($dados);
        $campos=str_replace($limites,"",$k);
        $campos=str_replace("\"",'',$campos);
        return '('.$campos.')';
    }
    public function retornaFieldSel($dados=array())
    {
        $limites=array("[","]");
        $k=json_encode($dados);
        $campos=str_replace($limites,"",$k);
        $campos=str_replace("\"",'',$campos);
        return ''.$campos.'';
    }

    public function returnPlaceholder($dados=array())
    {
        $tam=explode(",",self::retornaFields($dados));
        $k="(";
        for ($i=0;$i<count($tam);$i++)
        {
            if ($i==count($tam)-1)
                $k=$k."?)";
            else
                $k=$k."?,";
        }
        return $k;

    }

//    public function insert($tabela,$campos=array(),$k=array())
//    {
//        $stmt=self::conn()->prepare("INSERT INTO ".$tabela." ".self::retornaFields($campos)." VALUES " .self::returnPlaceholder($campos));
//        if($stmt->execute($k))
//            return true;
//        else
//            return false;
//
//    }
    public function insert($k=array())
    {
        try {
            $stmt = self::conn()->prepare("INSERT INTO " . $k[0] . " " . self::retornaFields($k[1]) . " VALUES " . self::returnPlaceholder($k[2]));
            if ($stmt->execute($k[2]))
                return true;
        }catch (PDOException $e)
        {
            return $e->getMessage();
        }

    }

    public function insertFilha()
    {
        
    }

    public function listarTodos($tabela,$optios=null)
    {
        try {
            $stmt = self::conn()->prepare("SELECT * FROM ".$tabela." ".$optios);
            if ($stmt->execute())
                return $stmt;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function listarDistritos($tabela,$optios)
    {
        try {
            $stmt = self::conn()->prepare("SELECT * FROM ".$tabela."  where _id_municipio=".$optios);
            if ($stmt->execute())
                return $stmt;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function ultimoElemento($tabela)
    {
        try{
            $stmt = self::conn()->prepare("SELECT _id FROM ".$tabela." ORDER BY _id DESC LIMIT 1");
            if ($stmt->execute())
                return $stmt->fetch();
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function listarPorId($tabela,$id)
    {
        try {
            $stmt = self::conn()->prepare("SELECT * FROM " . $tabela . " WHERE _id=?");
            if ($stmt->execute(array($id)))
                return $stmt;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function listarPorNome($tabela,$nome)
    {
        try {
            $stmt = self::conn()->prepare("SELECT * FROM " . $tabela . " WHERE _nome=?");
            if ($stmt->execute(array($nome)))
                return $stmt;
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function buscaExaustiva($campo=array(),$tabela,$condicao,$valor=array(),$options=null)
    {

        try {
            $stmt = self::conn()->prepare("SELECT ".self::retornaFieldSel($campo)." FROM ".$tabela." WHERE ".$condicao." ".$options);
            if($stmt->execute($valor))
                return $stmt;
            else
                return false;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function docFalta($valor)
    {
        try{
            $sql="select d._id,d._nome from documento d where d._id not in(select _id_documento from documento_processo where _id_processo=?)";
            $stm=self::conn()->prepare($sql);
            if($stm->execute($valor))
                return $stm;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function docFalta1($valor)
    {
        try{
            $sql="select d._id,d._nome from documento d where d._id not in (5,6,7) and d._id not in(select _id_documento from documento_processo where _id_processo=?)";
            $stm=self::conn()->prepare($sql);
            if($stm->execute($valor))
                return $stm;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function docDado($valor)
    {
        try{
            $sql="select d._id,d._nome from documento d where d._id in(select _id_documento from documento_processo where _id_processo=?)";
            $stm=self::conn()->prepare($sql);
            if($stm->execute($valor))
                return $stm;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function editar($tabela,$campos=array(),$cond,$valores=array())
    {
        try {
            $stmt = self::conn()->prepare("UPDATE ".$tabela." SET ".self::retornaFieldSel($campos)." WHERE ".self::retornaFieldSel($cond));
            if($stmt->execute($valores))
                return true;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function apagar($tabela,$id)
    {
        try {
            $stmt = self::conn()->prepare("DELETE FROM ".$tabela." WHERE _id=?");
            if($stmt->execute(array($id)))
                return true;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
      //  unset($this);
    }
}