<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 27/05/17
 * Time: 18:02
 */
require 'resources/fpdf/fpdf.php';
class RelatorioTecnico extends FPDF
{
    private $id_relatorio;

    /**
     * @return mixed
     */
    public function getIdRelatorio()
    {
        return $this->id_relatorio;
    }

    /**
     * @param mixed $id_relatorio
     */
    public function setIdRelatorio($id_relatorio)
    {
        $this->id_relatorio = $id_relatorio;
    }

//Page header
    function Header()
    {
        //Logo
        $this->Image('public/insignia/insignia.png', 92, 19, 23, 'PNG');
        $this->SetFont('Arial', '', 10);
        //Move to the right
        $this->SetTextColor(0,0,130);
        $this->Ln(27);
        $this->Cell(80);
        $this->Cell(30, 1, utf8_decode('REPÚBLICA DE ANGOLA'), 0, 0, 'C');
        $this->Ln(4);
        $this->Cell(80);
        $this->Cell(30, 1, utf8_decode('GOVERNO PROVINCIAL DE LUANDA'), 0, 0, 'C');
        $this->Ln(4);
        $this->Cell(80);
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 1, utf8_decode('Administração Municipal de Cacuaco'), 0, 0, 'C');
        $this->Ln(4);
        $this->Cell(80);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(30, 1, utf8_decode('DIRECÇÃO MUNICIPAL DE GESTÃO URBANÍSTICA URBANISMO E CADASTRO'), 0, 0, 'C');
        $this->Ln(4);
        $this->Cell(80);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(30, 1, utf8_decode('REPARTIÇÃO MUNICIPAL DE URBANISMO DE CADASTRO'), 0, 0, 'C');
        //Line break
        $meses=array("01"=>"Janeiro","02"=>"Fevereiro","03"=>"Março","04"=>"Abril","05"=>"Maio","06"=>"Junho","07"=>"Julho","08"=>"Agosto","09"=>"Setembro","10"=>"Outubro","11"=>"Novembro","12"=>"Dezembro");
        $data=explode("-",date('d-m-Y'));
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',10);
        $this->Ln(16);
        $this->Cell(154);
        $this->Cell(30,1,utf8_decode('DATA'),0,0,'L');
        $this->Ln(0);
        $this->Cell(25);
        $this->Cell(30,1,utf8_decode('VISTO DO'),0,0,'L');
        //Line break
        $this->Ln(8);
        $this->Cell(144);
        $this->Cell(30,1,utf8_decode($data[0].' de '.$meses[$data[1]].' de '.$data[2]),0,0,'C');

        $y=$this->GetY();
        $this->Line(63,$y-2 ,27 ,$y-2 );
        $this->Cell(164);
        $this->Ln(0);
        $this->Cell(25);
        $this->SetFont('Arial','',10);
        $this->Cell(30,1,utf8_decode('DIRECTOR'),0,0,'L');

    }

    public function corpo()
    {
        //área reservada para consulta no banco de dados
        $db=new Database();
        $att=new Atributo();

        $rx=$db->listarPorId('processo',base64_decode($_GET['id_processo']))->fetchObject();
        //pegando o nome do utente _num_processoGeral
        $rs=$db->listarPorId('requerente',$rx->_id_requerente)->fetchObject();

        $valor=array($rs->_id);
        $campo=array('*');
        $dadosTerreno=$db->buscaExaustiva($campo,'terreno','_id_utente=?',$valor)->fetchObject();

        //pegando  a data de entrada do processo
        $valor=array(base64_decode($_GET['id_processo']));
        $campo=array('_data');
        $dadosProceso=$db->buscaExaustiva($campo,'entradasaida','_id_processo=? ORDER BY _id ASC LIMIT 1',$valor)->fetchObject();

        //pegando  OS dados do relatorio
        $valor=array(base64_decode($_GET['id_processo']));
        $campo=array('*');
        $dadosRelatorio=$db->buscaExaustiva($campo,'relatorio','_id_pocesso=?',$valor)->fetchObject();

        //pegando  OS dados do relatorio
        $valor=array($dadosRelatorio->_id);
        $this->setIdRelatorio($dadosRelatorio->_id);
        $campo=array('*');
        $dadosConfronto=$db->buscaExaustiva($campo,'confronto','_id_relatorio=?',$valor)->fetchObject();

        $nordeste=explode("+",$dadosConfronto->_nordeste);
        $sudeste=explode("+",$dadosConfronto->_sudeste);
        $sudoeste=explode("+",$dadosConfronto->_sudoeste);
        $noroeste=explode("+",$dadosConfronto->_noroeste);

        $this->Ln(10);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('ASSUNTO: '),0,0,'L');
        $this->Ln(0);
        $this->Cell(34.5);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('INFORMAÇÃO TÉCNICA Nº      /R.M.G.U.C./'.date('Y')),0,0,'L');
        $this->Ln(10);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('PARA LEGALIZAÇÃO DA PARCELA DE TERRENO (VISTORIA TÉCNICA)'),0,0,'L');
        $this->Ln(10);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('REQUERENTE: '),0,0,'L');
        $this->Cell(30);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode(strtoupper($rs->_nome)),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('ÁREA DE LOCALIZAÇÃO: '),0,0,'L');
        $this->Cell(30);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode('REQUERENTE: '),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('ÁREA DO LOTEAMENTO: '),0,0,'L');
        $this->Cell(30);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode($dadosTerreno->_area." m2"),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(30,1,utf8_decode('NATUREZA DO EMPREENDIMENTO: '),0,0,'L');
        $this->Cell(30);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode('RESIDÊNCIA: '),0,0,'L');
        $this->Ln(10);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);


        $this->Cell(30,1,utf8_decode('CONFRONTAÇÕES:'),0,0,'L');

        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(20,1,utf8_decode('NORDESTE:'),0,0,'L');
        $this->SetFont('Arial','',9);
        //$this->Cell(15);
        $this->Cell(20,1,utf8_decode($nordeste[0]." ".$nordeste[1]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(30);
        $this->Cell(20,1,utf8_decode($nordeste[2]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($nordeste[3]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1);
        $this->Cell(25,1,utf8_decode($nordeste[4]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(-3);
        $this->Cell(20,1,utf8_decode($nordeste[5]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($nordeste[6]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Ln(7);
        $this->Cell(15);
        $this->Cell(20,1,utf8_decode($nordeste[7]."."),0,0,'L');

        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(20,1,utf8_decode('SUDESTE:'),0,0,'L');
        $this->SetFont('Arial','',9);
        //$this->Cell(15);
        $this->Cell(20,1,utf8_decode($sudeste[0]." ".$sudeste[1]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(30);
        $this->Cell(20,1,utf8_decode($sudeste[2]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($sudeste[3]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1);
        $this->Cell(25,1,utf8_decode($sudeste[4]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(-3);
        $this->Cell(20,1,utf8_decode($sudeste[5]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($sudeste[6]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Ln(7);
        $this->Cell(15);
        $this->Cell(20,1,utf8_decode($sudeste[7]."."),0,0,'L');

        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(20,1,utf8_decode('SUDOESTE:'),0,0,'L');
        $this->SetFont('Arial','',9);
        //$this->Cell(15);
        $this->Cell(20,1,utf8_decode($sudoeste[0]." ".$sudoeste[1]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(30);
        $this->Cell(20,1,utf8_decode($sudoeste[2]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($sudoeste[3]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1);
        $this->Cell(25,1,utf8_decode($sudoeste[4]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(-3);
        $this->Cell(20,1,utf8_decode($sudoeste[5]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($sudoeste[6]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Ln(7);
        $this->Cell(15);
        $this->Cell(20,1,utf8_decode($sudoeste[7]."."),0,0,'L');

        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',9);
        $this->Cell(20,1,utf8_decode('NOROESTE:'),0,0,'L');
        $this->SetFont('Arial','',9);
        //$this->Cell(15);
        $this->Cell(20,1,utf8_decode($noroeste[0]." ".$noroeste[1]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(30);
        $this->Cell(20,1,utf8_decode($noroeste[2]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($noroeste[3]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1);
        $this->Cell(25,1,utf8_decode($noroeste[4]),0,0,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(-3);
        $this->Cell(20,1,utf8_decode($noroeste[5]),0,0,'L');
        $this->SetFont('Arial','U',9);
        $this->Cell(-15);
        $this->Cell(25,1,utf8_decode($noroeste[6]),0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Ln(7);
        $this->Cell(15);
        $this->Cell(20,1,utf8_decode($noroeste[7]."."),0,0,'L');
        $this->Ln(20);

        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Informação (Recolha de Dados)'),0,0,'L');
        $y=$this->GetY();
        $this->Line(68,$y+2 ,26 ,$y+2 );
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Entrada nº. '.$rx->_num_processoGeral),0,0,'L');

        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Data de entrada do processo: '.$att->retornaData1($dadosProceso->_data)),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Nome Completo: '),0,0,'L');
        $this->Cell(-4);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode(strtoupper($rs->_nome)),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Legalização da parcela de terreno. Afim de obter a Declaração Provisória de Terreno.'),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('No bairro da Vila Verde Kativa/Cacuaco. Que se destina para fins constructivos de uma Residência.'),0,0,'L');
        $this->Ln(7);
        $this->Cell(15);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,1,utf8_decode('Nº de piso. Por definir.'),0,0,'L');


    }
    //Page footer
    function Footer()
    {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Page number
//        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf=new RelatorioTecnico('P','mm','A4');
$dao=new File_RelatorioDao();

$pdf->AliasNbPages();
$pdf->AddPage();
$nomFile = 'onyx-'.md5(uniqid(rand(), true)) . '.pdf';
$pdf->corpo();

$entity=new File_Relatorio($pdf->getIdRelatorio(),$nomFile);
$dao->salvar($entity);

$pdf->Output('views/relatorio/ficheiro/'.$nomFile,'F');
$pdf->Output();