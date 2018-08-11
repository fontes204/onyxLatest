<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 04:07
 */
require 'resources/fpdf/fpdf.php';
class Recibo extends FPDF
{
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
        $this->Cell(30, 1, utf8_decode('ADMINISTRAÇÃO MUNICIPAL DE CACUACO'), 0, 0, 'C');
        $this->Ln(4);
        $this->Cell(80);
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 1, utf8_decode('SECRETARIA GERAL DA ADMINISTRAÇÃO'), 0, 0, 'C');
        $this->Ln(4);

        //Line break
        $meses=array("01"=>"Janeiro","02"=>"Fevereiro","03"=>"Março","04"=>"Abril","05"=>"Maio","06"=>"Junho","07"=>"Julho","08"=>"Agosto","09"=>"Setembro","10"=>"Outubro","11"=>"Novembro","12"=>"Dezembro");
        $data=explode("-",date('d-m-Y'));
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',10);
        $this->Ln(16);

    }

    public function corpo()
    {
        $this->Ln(10);
        $this->Cell(15);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode('Nº do Processo: 000000'),0,0,'L');
        $this->Ln(6);
        $this->Cell(15);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode('Nome: '),0,0,'L');
        $this->Ln(6);
        $this->Cell(15);
        $this->SetFont('Arial','',9);
        $this->Cell(30,1,utf8_decode('Assunto: '),0,0,'L');
        $this->Ln(10);
    }
    
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

$pdf=new Recibo('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->corpo();
$nomFile = 'onyx-'.md5(uniqid(rand(), true)) . '.pdf';
//$pdf->Output('views/relatorio/ficheiro/'.$nomFile,'F');
$pdf->Output();