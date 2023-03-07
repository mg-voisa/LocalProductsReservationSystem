<?php
require('fpdf_lib/fpdf.php');

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
$pdf->Line(8*$fm, 34*$fm, 187*$fm, 34*$fm);
$pdf->Line(8*$fm, 63*$fm, 187*$fm, 63*$fm);
$pdf->Line(154*$fm, 34*$fm, 154*$fm, 63*$fm);//
$pdf->Line(8*$fm, 130*$fm, 187*$fm, 130*$fm);
$pdf->Line(8*$fm, 204*$fm, 187*$fm, 204*$fm);
$pdf->Line(8*$fm, 213*$fm, 187*$fm, 213*$fm);
$pdf->SetXY(14*$fm, 8*$fm);
$pdf->Cell(0, 0, 'Bilet de trimitere pentru servicii medicale/bilet de internare utilizat ');
$pdf->SetXY(46*$fm, 12*$fm);
$pdf->Cell(0, 0, 'in sistemul de asigurari sociale de sanatate');
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(48*$fm, 19*$fm);
$pdf->Cell(0, 0, 'Serie');
$pdf->SetXY(73*$fm, 19*$fm);
$pdf->Cell(0, 0, 'Numar');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(11*$fm, 31*$fm);
$str="1. Catre specialitatea clinica: ";
for($i=0;$i<113;$i++){
	$str=$str.".";
}
$pdf->Cell(0, 0, $str);
//-------------------------------------------
$pdf->SetXY(11*$fm, 37*$fm);
$pdf->Cell(0, 0, '2. Unitate medicala');
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(14*$fm, 42*$fm);
$str="CUI";
for($i=0;$i<84;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 46*$fm);
$str="Sediu(localitate, str., nr.) ";
for($i=0;$i<50;$i++){
	$str.=".";
}
$pdf->Cell(0, 0,$str);
$pdf->SetXY(14*$fm, 51*$fm);
$str="Judetul ";
for($i=0;$i<77;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 55*$fm);
$str="Casa de asigurari ";
for($i=0;$i<61;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 60*$fm);
$str="Nr. contract/Conventie ";
for($i=0;$i<54;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(111*$fm, 40*$fm);
$pdf->Cell(0, 0, 'L.S.');
$pdf->Rect(121*$fm, 36*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(121*$fm, 42*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(121*$fm, 48*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(121*$fm, 54*$fm, 3.5*$fm, 3.5*$fm);
$pdf->SetXY(125*$fm, 38*$fm);
$pdf->Cell(0, 0, 'MF');
$pdf->SetXY(125*$fm, 42*$fm);
$pdf->Cell(0, 0, 'Amb.');
$pdf->SetXY(125*$fm, 45*$fm);
$pdf->Cell(0, 0, 'Spec.');
$pdf->SetXY(125*$fm, 50*$fm);
$pdf->Cell(0, 0, 'Unitate sanitara');
$pdf->SetXY(125*$fm, 53*$fm);
$pdf->Cell(0, 0, 'cu paturi');
$pdf->SetXY(125*$fm, 57*$fm);
$pdf->Cell(0, 0, 'Altele');

//--------------------------------------------------
$pdf->SetXY(155*$fm, 38.5*$fm);
$pdf->Cell(0, 0, 'Nivel de prioritate');
$pdf->Rect(156.5*$fm, 42.5*$fm, 22.5*$fm, 5*$fm);
$pdf->Rect(156.5*$fm, 51.5*$fm, 22.5*$fm, 5*$fm);
$pdf->Rect(179*$fm, 42.5*$fm, 5*$fm, 5*$fm);
$pdf->Rect(179*$fm, 51.5*$fm, 5*$fm, 5*$fm);
$pdf->SetXY(157*$fm, 45*$fm);
$pdf->Cell(0, 0, 'Urgenta');
$pdf->SetXY(157*$fm, 54*$fm);
$pdf->Cell(0, 0, 'Curente');

//--------------------------------------------------
$pdf->SetXY(11*$fm, 66*$fm);
$pdf->Cell(0, 0, '3. Date identificare pacient');
$pdf->SetXY(14*$fm, 71*$fm);
$str="Asigurat la CAS/Neasigurat ";
for($i=0;$i<20;$i++){
	$str.=".";
}
$str.="RC ";
for($i=0;$i<20;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 81*$fm);
$str="Nume ";
for($i=0;$i<80;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 86*$fm);
$str="Prenume ";
for($i=0;$i<75;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$str="Adresa ";
for($i=0;$i<78;$i++){
	$str.=".";
}
$pdf->SetXY(14*$fm, 91*$fm);
$pdf->Cell(0, 0, $str);
$str="";
for($i=0;$i<90;$i++){
	$str.=".";
}
$pdf->SetXY(14*$fm, 96*$fm);
$pdf->Cell(0, 0, $str);

$pdf->SetXY(14*$fm, 105*$fm);
$pdf->Cell(0, 0, 'CNP');
$pdf->SetXY(14*$fm, 108*$fm);
$pdf->Cell(0, 0, 'CE');
$pdf->SetXY(14*$fm, 111*$fm);
$pdf->Cell(0, 0, 'PASS');
$pdf->SirDeDreptunghiuri(27*$fm, 104*$fm, 6*$fm, 6*$fm, 13, 6*$fm, 0);
$pdf->SetXY(14*$fm, 119*$fm);
$str="Cetatenia ";
for($i=0;$i<70;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 125*$fm);
$pdf->Cell(0, 0, 'Beneficiar');
$pdf->SetXY(36*$fm, 125*$fm);
$pdf->Cell(0, 0, 'Pachet de baza');
$pdf->Rect(36*$fm, 122*$fm, 34*$fm, 6*$fm);
$pdf->Rect(64*$fm, 122*$fm, 6*$fm, 6*$fm);
$pdf->SetXY(75*$fm, 125*$fm);
$pdf->Cell(0, 0, 'Pachet facultativ');
$pdf->Rect(75*$fm, 122*$fm, 36*$fm, 6*$fm);
$pdf->Rect(105*$fm, 122*$fm, 6*$fm, 6*$fm);
$pdf->SetXY(117*$fm, 125*$fm);
$pdf->Cell(0, 0, 'Pachet minimal');
$pdf->Rect(117*$fm, 122*$fm, 33*$fm, 6*$fm);
$pdf->Rect(144*$fm, 122*$fm, 6*$fm, 6*$fm);
$pdf->SetXY(117*$fm, 67*$fm);
$pdf->Cell(0, 0, 'Salariat');
$pdf->SetXY(117*$fm, 72*$fm);
$pdf->Cell(0, 0, 'Co-asigurat');
$pdf->SetXY(117*$fm, 77*$fm);
$pdf->Cell(0, 0, 'Liber profesionist');
$pdf->SetXY(117*$fm, 83*$fm);
$pdf->Cell(0, 0, 'Copil (<18 ani)');
$pdf->SetXY(117*$fm, 88*$fm);
$pdf->Cell(0, 0, 'Elev/Ucenic/');
$pdf->SetXY(117*$fm, 92*$fm);
$pdf->Cell(0, 0, 'Student(18-26 ani)');
$pdf->SetXY(117*$fm, 102*$fm);
$pdf->Cell(0, 0, 'Gravida/Lehuza');
$pdf->SetXY(117*$fm, 109*$fm);
$pdf->Cell(0, 0, 'Pensionar');
$pdf->SetXY(117*$fm, 114*$fm);
$pdf->Cell(0, 0, 'Alte categorii');
//---------------------------------
$pdf->Rect(113*$fm, 64*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 69.5*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 74.5*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 81*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 86*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 100*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 107*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(113*$fm, 112*$fm, 3.5*$fm, 3.5*$fm);
//---------------------------------
$pdf->Rect(152*$fm, 64*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 69*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 74*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 79*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 84*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 89*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 95*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 105*$fm, 3.5*$fm, 3.5*$fm);
$pdf->Rect(152*$fm, 115*$fm, 3.5*$fm, 3.5*$fm);
//---------------------------------
$pdf->SetXY(157*$fm, 66*$fm);
$pdf->Cell(0, 0, 'Veteran');
$pdf->SetXY(157*$fm, 71*$fm);
$pdf->Cell(0, 0, 'Revolutionar');
$pdf->SetXY(157*$fm, 76*$fm);
$pdf->Cell(0, 0, 'Handicap');
$pdf->SetXY(157*$fm, 81*$fm);
$pdf->Cell(0, 0, 'PNS ..........');
$pdf->SetXY(157*$fm, 86*$fm);
$pdf->Cell(0, 0, 'Ajutor social');
$pdf->SetXY(157*$fm, 91*$fm);
$pdf->Cell(0, 0, 'Somaj');
$pdf->SetXY(157*$fm, 96*$fm);
$pdf->Cell(0, 0, 'Personal');
$pdf->SetXY(157*$fm, 100*$fm);
$pdf->Cell(0, 0, 'contractual');
$pdf->SetXY(157*$fm, 106*$fm);
$pdf->Cell(0, 0, 'Card european');
$pdf->SetXY(157*$fm, 110*$fm);
$pdf->Cell(0, 0, '(CE)');
$pdf->SetXY(157*$fm, 116*$fm);
$pdf->Cell(0, 0, 'Acorduri');
$pdf->SetXY(157*$fm, 120*$fm);
$pdf->Cell(0, 0, 'internationale');

//----------------------------------------------------------------
$pdf->SetXY(11*$fm, 135*$fm);
$str="4. Diagnostic prezumtiv: ";
for($i=0;$i<130;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 142*$fm);
$pdf->Cell(0, 0, 'Cod diagnostic prezumtiv');
$pdf->SirDeDreptunghiuri(60*$fm, 139*$fm, 6*$fm, 6*$fm, 5, 6*$fm, 0);
$pdf->SetXY(11*$fm, 149.5*$fm);
$str="5. Alte diagnostice cunoscute: ";
for($i=0;$i<121;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 155*$fm);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 163*$fm);
$pdf->Cell(0, 0, 'Cod diagnostic');
$pdf->SirDeDreptunghiuri(60*$fm, 161*$fm, 6*$fm, 6*$fm, 5, 6*$fm, 0);
$pdf->SetXY(94*$fm, 163*$fm);
$pdf->Cell(0, 0, 'Cod diagnostic');
$pdf->SirDeDreptunghiuri(130*$fm, 161*$fm, 6*$fm, 6*$fm, 5, 6*$fm, 0);
$pdf->SetXY(11*$fm, 175*$fm);

$pdf->Cell(0, 0, '6. Motivul trimiterii catre alte specialitati clinice/in vederea internarii:');
$pdf->SetXY(14*$fm, 180*$fm);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 185*$fm);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(11*$fm, 190*$fm);
$pdf->Cell(0, 0, '7. Investigatii si tratamente efectuate:');
$pdf->SetXY(14*$fm, 195*$fm);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 200*$fm);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);

//------------------------------------------------------------------
$pdf->SetXY(11*$fm, 208.8*$fm);
$str="Data trimiterii";
for($i=0;$i<20;$i++){
	$str.=".";
}
$str.=" Semnatura medicului ";
for($i=0;$i<20;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);

$pdf->SetXY(112*$fm, 206.8*$fm);
$pdf->Cell(0, 0, 'Cod');
$pdf->SetXY(112*$fm, 210.8*$fm);
$pdf->Cell(0, 0, 'parafa');
$pdf->SirDeDreptunghiuri(126*$fm, 205.5*$fm, 6*$fm, 6*$fm, 6, 6*$fm, 0);
$pdf->SetXY(168*$fm, 208.8*$fm);
$pdf->Cell(0, 0, 'L.S.');
//------------------------------------------------------------------\
$pdf->SetXY(11*$fm, 216.8*$fm);
$str="8. Se interneaza in unitatea sanitara cu paturi: ";
for($i=0;$i<42;$i++){
	$str.=".";
}
$str.=" sectia: ";
for($i=0;$i<41;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$pdf->SetXY(11*$fm, 224*$fm);
$str="9. Motivul pentru care nu a fost necesara internarea si recomandari la domiciliu: ";
for($i=0;$i<42;$i++){
	$str.=".";
}
$pdf->Cell(0, 0, $str);
$str="";
for($i=0;$i<167;$i++){
	$str.=".";
}
$pdf->SetXY(14*$fm, 229*$fm);
$pdf->Cell(0, 0, $str);
$pdf->SetXY(14*$fm, 234*$fm);
$pdf->Cell(0, 0, $str);
$pdf->SetXY(11*$fm, 239*$fm);
$pdf->Cell(0, 0, '10. Data prezentarii si');
$pdf->SetXY(17*$fm, 244*$fm);
$pdf->Cell(0, 0, 'semnatura pacientului');
$pdf->SetXY(82*$fm, 239*$fm);
$pdf->Cell(0, 0, 'Semnatura medicului care furnizeaza servicii medicale clinice/');
$pdf->SetXY(90*$fm, 244*$fm);
$pdf->Cell(0, 0, 'medicului de garda al sectiei/unitatii sanitare cu paturi');

$str="";
for($i=0;$i<10;$i++){
	$str.=".";
}
$str.="/";
for($i=0;$i<10;$i++){
	$str.=".";
}
$str.="/";
for($i=0;$i<10;$i++){
	$str.=".";
}
$pdf->SetXY(17*$fm, 256*$fm);
$pdf->Cell(0, 0, $str);
$str="";
for($i=0;$i<30;$i++){
	$str.=".";
}
$pdf->SetXY(79*$fm, 256*$fm);
$pdf->Cell(0, 0, $str);
$pdf->SetXY(113*$fm, 251*$fm);
$pdf->Cell(0, 0, 'Cod');
$pdf->SetXY(113*$fm, 255*$fm);
$pdf->Cell(0, 0, 'parafa');
$pdf->SirDeDreptunghiuri(126*$fm, 250*$fm, 6*$fm, 6*$fm, 6, 6*$fm, 0);
$pdf->SetXY(168*$fm, 252*$fm);
$pdf->Cell(0, 0, 'L.S.');
$pdf->Output();
?>