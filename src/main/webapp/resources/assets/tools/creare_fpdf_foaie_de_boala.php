<?php
require('fpdf_lib/fpdf.php');
include('../functii.php');
include('../dbconn.php');
class PDF_Rotate extends FPDF
{
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
}

class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}
function SirDeDreptunghiuri($x, $y, $w, $h, $nr_dreptunghiuri, $efect_perturbatorX, $efect_perturbatorY){
	for($i=0;$i<$nr_dreptunghiuri;$i++){
	$this->Rect($x+$i*$efect_perturbatorX, $y+$i*$efect_perturbatorY, $w, $h);
}
}
}

$fm=2.7;
$Sx=1.0;$Sy=1.0;//*$Sx si *$Sy
$Tx=-5.0;$Ty=4;//+$Tx si +$Ty
$pdf = new PDF('P','pt','A4');
$pdf->AddPage();
$pdf->Image('cnas-icon.jpg',8*$fm,19*$fm, 60*$fm, 26*$fm);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(73.7*$fm*$Sx+$Tx, 10.7*$fm*$Sy+$Ty);
$pdf->Cell(0,0,'FORMULAR CU REGIM SPECIAL');
$pdf->SetFont('Arial','B',11);
//-----------------------------------------------
$pdf->SetXY(33*$fm*$Sx+$Tx, 16*$fm*$Sy+$Ty);
$pdf->Cell(0, 0,'VIZA PLATITORULUI');
$pdf->SetFont('Arial','',9);
$pdf->SetFont('');
$pdf->SetXY(35*$fm*$Sx+$Tx, 21*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data/Semnatura/Stampila');
$pdf->SetXY(35*$fm*$Sx+$Tx, 36*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Motivul refuzului de plata');
//-----------------------------------------------
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(76*$fm*$Sx+$Tx, 16*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'LUAT IN EVIDENTA');
$pdf->SetFont('Arial','',10);
$pdf->SetFont('');
$pdf->SetXY(80*$fm*$Sx+$Tx, 22*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Medic de familie');
$pdf->SetFont('Arial','',9);
$pdf->SetXY(75*$fm+$Tx, 38.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data/Semnatura/Stampila');
//-----------------------------------------------
$pdf->SetFont('Arial','',9);
$pdf->SetXY(115*$fm*$Sx+$Tx, 15*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Urgenta medico-');
$pdf->SetXY(115*$fm*$Sx+$Tx, 18*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'chirurgicala');
$pdf->SetXY(115*$fm*$Sx+$Tx, 28*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Boli infectocontagioase');
$pdf->SetXY(115*$fm*$Sx+$Tx, 31.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'din grupa A');
$pdf->SetXY(115*$fm*$Sx+$Tx, 37.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data/Semnatura/Stampila');
//-----------------------------------------------
$pdf->SetXY(157.2*$fm*$Sx+$Tx, 15*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Initial');
$pdf->SetXY(157.2*$fm*$Sx+$Tx, 25.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'In continuare');
$pdf->SetXY(157.2*$fm*$Sx+$Tx, 34*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Seria certificatului initial');
//-----------------------------------------------
$pdf->SetFont('Arial','BI',13);
$pdf->SetXY(32*$fm*$Sx+$Tx, 45*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'CERTIFICAT DE CONCEDIU MEDICAL');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(120*$fm*$Sx+$Tx, 45*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Seria');
$pdf->SetXY(148.2*$fm*$Sx+$Tx, 45*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nr.');
$pdf->SetFont('Arial','',10);
$pdf->SetXY(12*$fm*$Sx+$Tx, 56*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Valabil pentru luna');
$pdf->SetXY(78.8*$fm*$Sx+$Tx, 56*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'anul 20');
$pdf->SetXY(105*$fm*$Sx+$Tx, 56*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'pt. Codul indemnizatiei (1-15)');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(66*$fm*$Sx+$Tx, 59.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '(in litere)');
$pdf->SetXY(174.5*$fm*$Sx+$Tx, 59.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '(in litere)');
//------------------------------------------------
$pdf->SetFont('Arial','',10);
$pdf->SetXY(12.5*$fm*$Sx+$Tx, 65.1*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Asigurat in evidenta in CAS....................................................');
$pdf->SetXY(12.7*$fm*$Sx+$Tx, 70.2*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Numele si prenumele ');
$pdf->SetXY(12.7*$fm*$Sx+$Tx, 78.2*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod numeric personal:');
$pdf->SetXY(15*$fm*$Sx+$Tx, 85*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Domiciliu, resedinta:');
$pdf->SetXY(64.8*$fm*$Sx+$Tx, 85*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Localitatea');
$pdf->SetXY(12*$fm*$Sx+$Tx, 90.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Strada');
$pdf->SetXY(132*$fm*$Sx+$Tx, 90.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nr.');
$pdf->SetXY(161.5*$fm*$Sx+$Tx, 90.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Bl.');
$pdf->SetXY(14*$fm*$Sx+$Tx, 98.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Scara');
$pdf->SetXY(48*$fm*$Sx+$Tx, 98.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Etaj');
$pdf->SetXY(67.5*$fm*$Sx+$Tx, 98.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Apart.');
$pdf->SetXY(102*$fm*$Sx+$Tx, 98.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Judet/Sector');
$pdf->SetXY(11.9*$fm*$Sx+$Tx, 106.5*$fm*$Sy+$Ty);
//------------------------------------------------
$pdf->Cell(0, 0, 'Nr. INREG');
$pdf->SetXY(11.9*$fm*$Sx+$Tx, 110*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '(RC/FO)');
$pdf->SetXY(14*$fm*$Sx+$Tx, 115.1*$fm*$Sy+$Ty);
//------------------------------------------------
$pdf->SetFont('Arial','',8);
$pdf->Cell(0, 0, 'Ambulator/internat in spital');
$pdf->SetXY(14*$fm*$Sx+$Tx, 118.9*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'sectia.........................................');
//------------------------------------------------
$pdf->SetXY(14*$fm*$Sx+$Tx, 124*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Concediu medical la externare');
$pdf->SetXY(59.9*$fm*$Sx+$Tx, 108*$fm*$Sy+$Ty);
//------------------------------------------------
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 0, 'Data acordarii');
$pdf->SetXY(64.9*$fm*$Sx+$Tx, 111.2*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'zi/luna/an');

//------------------------------------------------
$pdf->SetXY(88.9*$fm*$Sx+$Tx, 107*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nr.');
$pdf->SetXY(88.9*$fm*$Sx+$Tx, 110.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'zile');
//------------------------------------------------
$pdf->SetXY(106.5*$fm*$Sx+$Tx, 106*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'De la');
$pdf->SetXY(104.8*$fm*$Sx+$Tx, 110*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'zi/luna/an');
//------------------------------------------------
$pdf->SetXY(135*$fm*$Sx+$Tx, 106.1*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Pana la');
$pdf->SetXY(133*$fm*$Sx+$Tx, 109.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'zi/luna/an');
$pdf->SetFont('Arial','',8);
//------------------------------------------------
$pdf->SetXY(166*$fm*$Sx+$Tx, 106*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod ');
$pdf->SetXY(163*$fm*$Sx+$Tx, 108.9*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'diagnostic');
//------------------------------------------------
$pdf->SetFont('Arial','',6);
//------------------------------------------------
$pdf->RotatedText(185*$fm*$Sx+$Tx, 107*$fm*$Sy+$Ty, 'Acut', -90);
//$pdf->Cell(0, 0, 'Acut');
//------------------------------------------------
$pdf->RotatedText(190*$fm*$Sx+$Tx, 105*$fm*$Sy+$Ty, 'Subacut', -90);
//$pdf->Cell(0, 0, 'Subacut');
//------------------------------------------------
$pdf->RotatedText(195*$fm*$Sx+$Tx, 105*$fm*$Sy+$Ty, 'Cronic', -90);
//$pdf->Cell(0, 0, 'Cronic');
//------------------------------------------------
$pdf->SetFont('Arial','',10);
$conf_date=array("Z", "Z", "L", "L", "A", "A");//Z Z  L L  A A
//setare primul text reprezentativ despre date
for($i=0;$i<count($conf_date);$i++){
	$pdf->SetXY(58*$fm*$Sx+$i*4.8*$fm*$Sx+$Tx, 126.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}
//al doilea text
for($i=0;$i<count($conf_date);$i++){
	$pdf->SetXY(98*$fm*$Sx+$i*4.8*$fm*$Sx+$Tx, 126.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}
//al treilea text
for($i=0;$i<count($conf_date);$i++){
	$pdf->SetXY(128*$fm*$Sx+$i*4.8*$fm*$Sx+$Tx, 126.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}

$pdf->SetXY(13.7*$fm*$Sx+$Tx, 131.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Unitate sanitara emitenta:');
$pdf->SetXY(100*$fm*$Sx+$Tx, 131.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nr conventie');
for($i=0;$i<50; $i++){//linie de puncte
	$pdf->SetXY(123*$fm*$Sx+$i*$fm*$Sx+$Tx, 131.7*$fm*$Sy+$Ty);
	$pdf->Cell(-0.5, 0, '.');
}
//$pdf->SetXY(33*$fm, 131.7*$fm);
$pdf->Cell(0, 0, 'cu C.A.S.');
for($i=0;$i<20;$i++){
	$pdf->SetXY(33*$fm*$Sx+$i*$fm+$Tx, 16*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, '.');
}

$pdf->SetXY(13.7*$fm*$Sx+$Tx, 139*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Stampila Unitatii');
$pdf->SetXY(84*$fm*$Sx+$Tx, 139*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Medic/Semnatura/Parafa');
$pdf->SetXY(141*$fm*$Sx+$Tx, 139*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Medic Sef Sectie/Semnatura/Parafa');
$pdf->SetXY(22*$fm*$Sx+$Tx, 152*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'CUI(cod unic de inregistrare)');
$pdf->SetXY(94*$fm*$Sx+$Tx, 152*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod parafa');
$pdf->SetXY(155*$fm*$Sx+$Tx, 152*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod parafa');
//------------------------------------------------
$pdf->SetXY(12*$fm*$Sx+$Tx, 166*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'PLATITOR:');
$pdf->SetXY(64*$fm*$Sx+$Tx, 166*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Sediul:');
$pdf->SetXY(123.5*$fm*$Sx+$Tx, 166*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'C.U.I.:');
//------------------------------------------------
//setare unei alte dimensiune la scris
$pdf->SetFont('Arial','',8);
$pdf->SetXY(11*$fm*$Sx+$Tx, 172*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Numar angajati:');
$pdf->SetXY(11.5*$fm*$Sx+$Tx, 185*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Tip asigurat:');
$pdf->SetXY(31.5*$fm*$Sx+$Tx, 185*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Salariat: ');
$pdf->SetXY(61.5*$fm*$Sx+$Tx, 185*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Functionar public:');
$pdf->SetXY(100*$fm*$Sx+$Tx, 182.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Autoritatea electiva, executiva, legislativa,');
$pdf->SetXY(100*$fm*$Sx+$Tx, 186*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'judecatoreasca; Membru cooperativ');
$pdf->SetXY(175.5*$fm*$Sx+$Tx, 185*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Somer');
$pdf->SetXY(15.5*$fm*$Sx+$Tx, 192*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Asigurat cu declaratie de asigurare pentru concedii si indemnizatii');
$pdf->SetXY(122*$fm*$Sx+$Tx, 190*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Asigurat cu contract de asigurare pentru');
$pdf->SetXY(122*$fm*$Sx+$Tx, 194*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'acidente de munca si boli profesionale');
$pdf->SetXY(15*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Procent plata:');
$pdf->SetXY(35*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '75%');
$pdf->SetXY(57*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '80%');
$pdf->SetXY(82*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '85%');
$pdf->SetXY(106.7*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, '100%');
$pdf->SetXY(126*$fm*$Sx+$Tx, 199*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Prevenire');
$pdf->SetXY(15*$fm*$Sx+$Tx, 204*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Baza de calcul al indemnizatiei');
$pdf->SetXY(15*$fm*$Sx+$Tx, 207.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'de asigurari sociale de sanatate');
$pdf->SetXY(68*$fm*$Sx+$Tx, 204*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Zile baza');
$pdf->SetXY(68*$fm*$Sx+$Tx, 207.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'de calcul');
$pdf->SetXY(93.5*$fm*$Sx+$Tx, 204*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Media zilnica a bazei de calcul a ');
$pdf->SetXY(87.5*$fm*$Sx+$Tx, 207.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'indemnizatiei de asigurari sociale de sanatate');
$pdf->SetXY(152.5*$fm*$Sx+$Tx, 204*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cuantumul indemnizatiei de');
$pdf->SetXY(152.5*$fm*$Sx+$Tx, 207.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'asigurari sociale de sanatate');
$pdf->SetXY(10*$fm*$Sx+$Tx, 218.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Indemnizatia suportata de catre angajator');
$pdf->SetXY(73*$fm*$Sx+$Tx, 218*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Indemnizatie suportata din bugetul FNUASS');
$pdf->SetXY(79.5*$fm*$Sx+$Tx, 220.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'pentru concedii si indemnizatii');
$pdf->SetXY(139.5*$fm*$Sx+$Tx, 218*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Indemnizatie suportata din fondul de asigurare');
$pdf->SetXY(139.5*$fm*$Sx+$Tx, 220.7*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'pentru accidente de munca si boli profesionale');
$pdf->SetXY(13.3*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Zile');
$pdf->SetXY(40*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Lei');
$pdf->SetXY(76*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Zile');
$pdf->SetXY(101*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Lei');
$pdf->SetXY(144.2*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Zile');
$pdf->SetXY(174*$fm*$Sx+$Tx, 224*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Lei');
//------------------------------------------------
$pdf->SetXY(21.9*$fm*$Sx+$Tx, 235.9*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Avizul medicului expert');
$pdf->SetXY(12*$fm*$Sx+$Tx, 240*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nr');
$pdf->SetXY(12*$fm*$Sx+$Tx, 246*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data:');
$pdf->SetFont('Arial','',9);
for($i=0;$i<count($conf_date);$i++){//text reprez pt grila cu data calendaristica
	$pdf->SetXY(23*$fm*$Sx+$i*4.5*$fm*$Sx+$Tx, 250.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}
$pdf->SetFont('Arial','',8);
$pdf->SetXY(19*$fm*$Sx+$Tx, 254*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Nume si prenume medic');
$pdf->SetXY(17.8*$fm*$Sx+$Tx, 256.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'expert al asigurarilor medicale');
$pdf->SetXY(11.5*$fm*$Sx+$Tx,263*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod');
$pdf->SetXY(11.5*$fm*$Sx+$Tx, 266.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Parafa');
//------------------------------------------------
$pdf->SetXY(67*$fm*$Sx+$Tx, 238*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Aviz Casa Teritoriala de Pensii');
$pdf->SetXY(63.5*$fm*$Sx+$Tx, 245.8*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data:');
$pdf->SetFont('Arial','',9);
for($i=0;$i<count($conf_date);$i++){//text reprez pt grila cu data calendaristica
	$pdf->SetXY(74*$fm*$Sx+$i*4.5*$fm*$Sx+$Tx, 250.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}
$pdf->SetFont('Arial','',8);
$pdf->SetXY(69.5*$fm*$Sx+$Tx, 256.8*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Semnatura si stampila');
//------------------------------------------------
$pdf->SetXY(122*$fm*$Sx+$Tx, 235.9*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Aviz Directia de');
$pdf->SetXY(120.3*$fm*$Sx+$Tx, 238.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Sanatate Publica');
$pdf->SetXY(117.5*$fm*$Sx+$Tx, 241.5*$fm*$Sy+$Ty);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 0, '(pentru boala profesionala)');
$pdf->SetFont('Arial','',9);
for($i=0;$i<count($conf_date);$i++){//text reprez pt grila cu data calendaristica
	$pdf->SetXY(117*$fm*$Sx+$i*4.5*$fm*$Sx+$Tx, 250.5*$fm*$Sy+$Ty);
	$pdf->Cell(0, 0, $conf_date[$i]);
}
$pdf->SetFont('Arial','',8);
$pdf->SetXY(117*$fm*$Sx+$Tx, 256.8*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Semnatura si stampila');
//------------------------------------------------
$pdf->SetXY(159*$fm*$Sx+$Tx, 235.9*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Aviz concediu de risc maternal');
$pdf->SetXY(157.6*$fm*$Sx+$Tx, 238*$fm*$Sy+$Ty);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 0, 'Medic medicina muncii/Semnatura/Parafa');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(158.8*$fm*$Sx+$Tx, 263*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Cod');
$pdf->SetXY(158.8*$fm*$Sx+$Tx, 266.5*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Parafa');
//------------------------------------------------
$pdf->SetFont('Arial','',8);
$pdf->SetXY(56*$fm*$Sx+$Tx, 273.3*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Semnatura de primire asigurat');
$pdf->SetXY(135*$fm*$Sx+$Tx, 273.3*$fm*$Sy+$Ty);
$pdf->Cell(0, 0, 'Data primirii');
//------------------------------------------------
$SwR=0.993; $ShR=1.0;//*$SwR si *ShR
$TxR=0.0; $TyR=0.0;//+TxR si +TyR
$pdf->Rect(32*$fm+$TxR, 14*$fm+$TyR, 41*$fm, 29*$fm);
$pdf->Rect(74.5*$fm+$TxR, 14*$fm+$TyR, 38.5*$fm, 29*$fm);
$pdf->Rect(114.5*$fm+$TxR, 14*$fm+$TyR, 38*$fm, 29*$fm);
$pdf->Rect(155*$fm+$TxR, 14*$fm+$TyR, 39*$fm, 29*$fm);

$pdf->Rect(8*$fm+$TxR, 64*$fm+$TyR, 195*$fm*$SwR, 97*$fm*$ShR);
$pdf->Rect(8*$fm+$TxR, 163*$fm+$TyR, 195*$fm*$SwR, 70.5*$fm*$ShR);
$w=188*$fm*1.05/4;
$pdf->Rect(8*$fm+$TxR, 236*$fm+$TyR, $w, 34*$fm*$ShR);
$pdf->Rect(56*$fm+4*$fm+$TxR, 236*$fm+$TyR, $w, 34*$fm*$ShR);
$pdf->Rect(103.5*$fm+4*$fm+4.5*$fm+$TxR, 236*$fm+$TyR, $w-8*$fm, 34*$fm*$ShR);
$pdf->Rect(145*$fm+4*$fm+7*$fm+$TxR, 236*$fm+$TyR, $w, 34*$fm*$ShR);
//---------------------------------------------------------------------------
$pdf->Line(78*$fm, 30*$fm, 109*$fm, 30*$fm);
$pdf->SirDeDreptunghiuri(137*$fm, 18.5*$fm, 4.7*$fm, 4.7*$fm, 3, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(142*$fm, 31*$fm, 4.7*$fm, 4.7*$fm, 2, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(187*$fm, 15*$fm, 4.7*$fm, 4.7*$fm, 1, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(187*$fm, 25*$fm, 4.7*$fm, 4.7*$fm, 1, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(155*$fm, 38.2*$fm, 4.845*$fm, 4.7*$fm, 8, 4.845*$fm, 0);
$pdf->SirDeDreptunghiuri(49*$fm, 55*$fm, 4.845*$fm, 4.7*$fm, 2, 4.845*$fm, 0);
$pdf->Line(62*$fm, 59*$fm, 77.5*$fm, 59*$fm);
$pdf->SirDeDreptunghiuri(91*$fm, 55*$fm, 4.845*$fm, 4.7*$fm, 2, 4.845*$fm, 0);
$pdf->SirDeDreptunghiuri(154*$fm, 55*$fm, 4.845*$fm, 4.7*$fm, 2, 4.845*$fm, 0);
$pdf->Line(168*$fm, 59*$fm, 192*$fm, 59*$fm);
$pdf->SirDeDreptunghiuri(62*$fm, 69.2*$fm, 4.7*$fm, 4.7*$fm, 29, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(62*$fm, 76.2*$fm, 4.7*$fm, 4.7*$fm, 13, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(90*$fm, 83.2*$fm, 4.7*$fm, 4.7*$fm, 23, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(31.5*$fm, 90.2*$fm, 4.7*$fm, 4.7*$fm, 21, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(140*$fm, 90.2*$fm, 4.7*$fm, 4.7*$fm, 3, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(170*$fm, 90.2*$fm, 4.7*$fm, 4.7*$fm, 5, 4.7*$fm, 0);
$pdf->SirDeDreptunghiuri(25*$fm, 97.5*$fm, 4.845*$fm, 4.7*$fm, 4, 4.845*$fm, 0);
$pdf->SirDeDreptunghiuri(55.5*$fm, 97.5*$fm, 4.845*$fm, 4.7*$fm, 2, 4.845*$fm, 0);
$pdf->SirDeDreptunghiuri(78*$fm, 97.5*$fm, 4.845*$fm, 4.7*$fm, 4, 4.845*$fm, 0);
$pdf->Line(124*$fm, 101*$fm, 168*$fm, 101*$fm);
$pdf->SirDeDreptunghiuri(29.5*$fm, 106*$fm, 4.845*$fm, 4.7*$fm, 5, 4.845*$fm, 0);
$pdf->Rect(11*$fm, 105*$fm, 44*$fm, 9*$fm);
$pdf->Rect(11*$fm, 115*$fm, 44*$fm, 7*$fm);
$pdf->Rect(11*$fm, 123*$fm, 44*$fm, 5*$fm);
$pdf->Rect(56*$fm, 106*$fm, 29*$fm, 19*$fm);
$pdf->Rect(86*$fm, 106*$fm, 10*$fm, 19*$fm);
$pdf->Rect(97*$fm, 106*$fm, 29*$fm, 19*$fm);
$pdf->Rect(127*$fm, 106*$fm, 29*$fm, 19*$fm);
$pdf->Rect(157*$fm, 106*$fm, 24*$fm, 19*$fm);
$pdf->Rect(182*$fm, 106*$fm, 15*$fm, 19*$fm);
$pdf->SirDeDreptunghiuri(56*$fm, 115*$fm, 4.8*$fm, 4.8*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(56*$fm, 119.8*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(86*$fm, 115*$fm, 4.87*$fm, 4.8*$fm, 2, 4.87*$fm, 0);
$pdf->SirDeDreptunghiuri(86*$fm, 119.8*$fm, 4.87*$fm, 5*$fm, 2, 4.87*$fm, 0);
$pdf->SirDeDreptunghiuri(97*$fm, 115*$fm, 5*$fm, 4.8*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(97*$fm, 119.8*$fm, 5*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(127*$fm, 115*$fm, 4.8*$fm, 4.8*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(127*$fm, 119.8*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(157*$fm, 115*$fm, 4.8*$fm, 4.8*$fm, 5, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(157*$fm, 119.8*$fm, 4.8*$fm, 5*$fm, 5, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(182*$fm, 106*$fm, 5*$fm, 9*$fm, 3, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(182*$fm, 115*$fm, 5*$fm, 5*$fm, 3, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(182*$fm, 119.8*$fm, 5*$fm, 5*$fm, 3, 5*$fm, 0);
$pdf->Line(13*$fm, 148*$fm, 43*$fm, 148*$fm);
$pdf->Rect(145*$fm, 142*$fm, 50*$fm, 9*$fm);
$pdf->Rect(80*$fm, 142*$fm, 50*$fm, 9*$fm);
$pdf->SirDeDreptunghiuri(12*$fm, 155*$fm, 5*$fm, 5*$fm, 13, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(88*$fm, 155*$fm, 5*$fm, 5*$fm, 6, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(150*$fm, 155*$fm, 5*$fm, 5*$fm, 6, 5*$fm, 0);
$pdf->Line(30*$fm, 169*$fm, 62*$fm, 169*$fm);
$pdf->Line(75*$fm, 169*$fm, 122*$fm, 169*$fm);
$pdf->SirDeDreptunghiuri(134*$fm, 164*$fm, 5*$fm, 5*$fm, 13, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(10.5*$fm, 176*$fm, 5*$fm, 5*$fm, 6, 5*$fm, 0);
$pdf->Rect(10.5*$fm, 184*$fm, 17*$fm, 5*$fm);
$pdf->Rect(44.5*$fm, 184*$fm, 5*$fm, 5*$fm);
$pdf->Rect(85*$fm, 184*$fm, 5*$fm, 5*$fm);
$pdf->Rect(158*$fm, 184*$fm, 5*$fm, 5*$fm);
$pdf->Rect(186*$fm, 184*$fm, 5*$fm, 5*$fm);
$pdf->Rect(110*$fm, 192*$fm, 5*$fm, 5*$fm);
$pdf->Rect(177*$fm, 192*$fm, 5*$fm, 5*$fm);
$pdf->Rect(42*$fm, 198*$fm, 5*$fm, 5*$fm);
$pdf->Rect(64*$fm, 198*$fm, 5*$fm, 5*$fm);
$pdf->Rect(89*$fm, 198*$fm, 5*$fm, 5*$fm);
$pdf->Rect(115*$fm, 198*$fm, 5*$fm, 5*$fm);
$pdf->Rect(139*$fm, 198*$fm, 5*$fm, 5*$fm);
$pdf->SirDeDreptunghiuri(9.5*$fm, 212*$fm, 5*$fm, 5*$fm, 10, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(66*$fm, 212*$fm, 5*$fm, 5*$fm, 3, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(88*$fm, 212*$fm, 5*$fm, 5*$fm, 6, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(122*$fm, 212*$fm, 5*$fm, 5*$fm, 4, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(150*$fm, 212*$fm, 5*$fm, 5*$fm, 8, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(9.5*$fm, 227.5*$fm, 5*$fm, 5*$fm, 2, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(24.5*$fm, 227.5*$fm, 5*$fm, 5*$fm, 8, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(72*$fm, 227.5*$fm, 5*$fm, 5*$fm, 2, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(85.5*$fm, 227.5*$fm, 5*$fm, 5*$fm, 8, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(140*$fm, 227.5*$fm, 5*$fm, 5*$fm, 2, 5*$fm, 0);
$pdf->SirDeDreptunghiuri(153.5*$fm, 227.5*$fm, 5*$fm, 5*$fm, 8, 5*$fm, 0);
//---------------------------------------------------------------------------
$pdf->SirDeDreptunghiuri(21*$fm, 239*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->SirDeDreptunghiuri(21*$fm, 245*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->Line(11*$fm, 263*$fm, 51*$fm, 263*$fm);
$pdf->SirDeDreptunghiuri(21*$fm, 264*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
//--------------------------------------------------------------------------
$pdf->SirDeDreptunghiuri(72*$fm, 245*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->Line(63*$fm, 269*$fm, 105*$fm, 269*$fm);
//---------------------------------------------------------------------------
$pdf->SirDeDreptunghiuri(115*$fm, 245*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
$pdf->Line(114*$fm, 269*$fm, 151*$fm, 269*$fm);
//---------------------------------------------------------------------------
$pdf->Rect(158*$fm, 241.5*$fm, 40*$fm, 10*$fm);
$pdf->SirDeDreptunghiuri(169*$fm, 264*$fm, 4.8*$fm, 5*$fm, 6, 4.8*$fm, 0);
//---------------------------------------------------------------------------
$pdf->Output();
?>