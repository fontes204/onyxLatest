<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/03/17
 * Time: 20:24
 */
class Helper
{
    function gerarNumeroOrdem($numeroOrdem)
    {
        if(strlen($numeroOrdem)==1)
            return "00".$numeroOrdem;
        elseif(strlen($numeroOrdem)==2)
            return "0".$numeroOrdem;
        elseif(strlen($numeroOrdem)==3)
            return $numeroOrdem;
    }

    function gerarNumeroProcesso($_id_processo)
    {
        return $this->gerarNumeroOrdem((string)$_id_processo)."/LT/".date('y');
    }

    function gerarParteNumerica($idTerreno)
    {
        $idTerreno=$idTerreno.""; //concatennar com caracter vazio, passar para string
        $idTerreno.rtrim($idTerreno);// eliminar espaco vazio
        if (strlen($idTerreno) == 1) {//controlar a qtd de caracteres
            return "0000" . $idTerreno; //concatena para ter 5  carecteres representativos do numero do terreno
        } else
            if (strlen($idTerreno) == 2) {
                return "000" . $idTerreno;
            } else
                if (strlen($idTerreno) == 3) {
                    return "00" . $idTerreno;
                } else
                    if (strlen($idTerreno) == 4) {
                        return "0" . $idTerreno;
                    }

        return  "";
    }

    function gerarCodigoTerreno($provincia,$municipio,$comuna,$idTerreno)
    {
        $provincia=strtoupper($provincia);//converte para a maiuscula
        $municipio=strtoupper($municipio);
        $comuna=strtoupper($comuna);
        return substr($provincia,0,1).substr($provincia,strlen($provincia)-1,1). //pega a letra inicial e final da provincia
            substr($municipio,0,1).substr($municipio,strlen($municipio)-1,1).
            substr($comuna,0,1).substr($comuna,strlen($comuna)-1,1).
            self::gerarParteNumerica($idTerreno);
    }

    public function area($a,$b)
    {
        return $a*$b;
    }

    public function tempoEspera($d1,$d2)
    {
        $data1=new DateTime($d1);
        $data2=new DateTime($d2);
        $tempoE=$data1->diff($data2);
        $ret=$tempoE->format('%R%a dia');
        if(self::soNumero($ret)==1)
            return $ret;
        else{
            $ret=$tempoE->format('%R%a dias');
            return $ret;
        }
    }

    public function soNumero($str)
    {
        return preg_replace("/[^0-9]/","",$str);
    }

    public function verificarDominio($email)
    {
        $parte1=explode("@",$email);
        $part2=explode(".",$parte1[1]);
        if((!$this->soNumero($part2[0])) && (!$this->soNumero($part2[1])))
            return 1;
        else
            return 0;
    }
}