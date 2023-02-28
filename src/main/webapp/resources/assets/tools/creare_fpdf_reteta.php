<?php
ini_set("precision", 3);

define('FPDF_FONTPATH','fpdf_lib/font/');
require('fpdf_lib/fpdf.php');
include('../functii.php');
include('../dbconn.php');

class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}
function BasicHeader($header){
	$this->Ln();
	$this->Cell(1,1,'',0); //margine top
	$this->Ln();
	$this->SetX(4);
	$col = $header[0];
    $this->Cell(7,6,$col,1,0,'C');
	$col = $header[1];
    $this->Cell(133,6,$col,1,0,'C');
	$this->Ln();
}
function BasicTable($header, $data)
{
 /* functia de tabel */
 
 /* cap de tabel */
    $col = $header[0];
    $this->Cell(7,12,$col,1);
	$col = $header[1];
    $this->Cell(13,12,$col,1);
	$col = $header[2];
    $this->Cell(10,12,$col,1);
	$col = $header[3];
    $this->Cell(52,12,$col,1,'0','C');
	$col = $header[4];
    $this->Cell(7,12,$col,1);
	$col = $header[5];
    $this->Cell(13,12,$col,1,0);
	$col = $header[6];
    $this->Cell(15,12,$col,1,0);
	$col = $header[7];
    $this->Cell(15,12,$col,1);
	$col = $header[8];
    $this->Cell(8,12,$col,1);
	$this->Ln();
	$this->SetX(4);
    
		$col = $data[0];
		$this->Cell(7,12,$col,1,'0','C');
		$col = $data[1];
   		$this->Cell(13,12,$col,1,'0','C');
		$col = $data[2];
    	$this->Cell(10,12,$col,1,'0','C');
		$col = $data[3];
    	$this->Cell(52,12,$col,1,'0','C');
		$col = $data[4];
    	$this->Cell(7,12,$col,1,'0','C');
		$col = $data[5];
    	$this->Cell(13,12,$col,1,'0','C');
		$col = $data[6];
    	$this->Cell(15,12,$col,1,'0','C');
		$col = $data[7];
    	$this->Cell(15,12,$col,1,'0','C');
		$col = $data[8];
    	$this->Cell(8,12,$col,1,'0','C');
		
    
}
function addRowtoTable($data){
	$this->Ln();
	$this->SetX(4);
		$col = $data[0];
		$this->Cell(7,12,$col,1,'0','C');
		$col = $data[1];
   		$this->Cell(13,12,$col,1,'0','C');
		$col = $data[2];
    	$this->Cell(10,12,$col,1,'0','C');
		$col = $data[3];
    	$this->Cell(52,12,$col,1,'0','C');
		$col = $data[4];
    	$this->Cell(7,12,$col,1,'0','C');
		$col = $data[5];
    	$this->Cell(13,12,$col,1,'0','C');
		$col = $data[6];
    	$this->Cell(15,12,$col,1,'0','C');
		$col = $data[7];
    	$this->Cell(15,12,$col,1,'0','C');
		$col = $data[8];
    	$this->Cell(8,12,$col,1,'0','C');
}
}
if(isset($_GET['tip']) && $_GET['tip'] == 'reteta'){
		$CNP = $_GET['CNP'];
		$cabinet = $_GET['unitate'];
		$adresa_cabinet = $_GET['adresa_u'];
		$CUI = '20786221';
		$contract_conventie = $_GET['contract'].' / '.$_GET['conventie'];
		$telefon_fax = $_GET['telfax'];
		$email_medic = $_GET['email'];
		
		
		$nume = selectare($conn, 'pacienti', 'nume', 'CNP', $CNP);;
		$prenume = selectare($conn, 'pacienti', 'prenume', 'CNP', $CNP);;
		$CID = selectare($conn, 'pacienti', 'CID', 'CNP', $CNP);;
		$datan = selectare($conn, 'pacienti', 'datan', 'CNP', $CNP);;
		$sex = selectare($conn, 'pacienti', 'sex', 'CNP', $CNP);;
		$cetatenia = 'R  O';
		$diagnostic = '3';
		$PNS = '';
		$data_p = $_GET['data_elib'];
		$nume_parafa = 'VANA BAZIL-HORIA / 189475';
		$motiv = 'compensate_'.$CNP.'_'.$data_p;
		$data = '';
		
		$sql ="SELECT * FROM adeverinte WHERE motiv = '".$motiv."'";
		$result = $conn->query($sql);
		foreach($result as $row)
    	{
			$data .=  $row['tratament'] . "\n";
  		}
	
		$marime = array("148", "210");
		$pdf = new PDF('P', 'mm', 'A5');
		$pdf->SetRightMargin(0);
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(false);
		$pdf->SetFont('Arial','B',9);
		$pdf->SetX(4);
		$pdf->WriteHTML('I. Componenta prescriere<br>');
		$pdf->SetX(4);
		
		$pdf->SetFont('Arial','',9);
		$pdf->WriteHTML('Serie  <b>NMMEAD</b>');
		$pdf->SetX(40);
		$pdf->WriteHTML('Numar  <b>38024</b><br>');
		$pdf->SetFontSize(8);
		$pdf->SetX(4);
		$pdf->WriteHTML('<b>1.</b>  Unitate medicala<br>');
		$pdf->SetFontSize(9);
		$pdf->SetX(8);
		$pdf->WriteHTML("$cabinet<br><br>");
		
		$pdf->SetX(8);
		$pdf->SetFontSize(8);
		$pdf->WriteHTML('Adresa  ');
		$pdf->WriteHTML("$adresa_cabinet");

		
		$pdf->SetY(39);
		$pdf->SetX(8);
		$pdf->WriteHTML("CUI   $CUI");
		
		$pdf->SetY(43);
		$pdf->SetX(8);
		$pdf->WriteHTML('CAS - Contract / Conventie');
		$pdf->SetX(55);
		$pdf->WriteHTML("CAS  -  $contract_conventie");
		
		$pdf->SetY(47);
		$pdf->SetX(8);
		$pdf->WriteHTML('Telefon / Fax medic prescriptor(cu prefixul de tara)    ');
		$pdf->WriteHTML("$telefon_fax");
		
		$pdf->SetY(51);
		$pdf->SetX(8);
		$pdf->WriteHTML('Email medic prescriptor:  ');
		$pdf->WriteHTML("$email_medic");
		
		$pdf->Rect(100,20,3,3);
		$pdf->SetY(19.2);
		$pdf->SetX(103);
		$pdf->WriteHTML("MF");
		
		$pdf->Rect(100,27,3,3);
		$pdf->SetY(26.2);
		$pdf->SetX(103);
		$pdf->WriteHTML("AMBULATORIU");
		
		$pdf->Rect(100,34,3,3);
		$pdf->SetY(33.2);
		$pdf->SetX(103);
		$pdf->WriteHTML("SPITAL");
		
		$pdf->Rect(100,41,3,3);
		$pdf->SetY(40.2);
		$pdf->SetX(103);
		$pdf->WriteHTML("ALTELE .....");
		
		$pdf->Rect(100,48,3,3);
		$pdf->SetY(47.2);
		$pdf->SetX(103);
		$pdf->WriteHTML("MF-MM");
		
		$pdf->Line(4, 57, 144, 57);
		
		$pdf->SetY(57);
		$pdf->SetX(4);
		$pdf->WriteHTML('<b>2.</b> Asigurat');
		$pdf->SetX(74);
		$pdf->WriteHTML('FQ/RC   ');
		$pdf->WriteHTML('4190');
		
		$pdf->SetY(62);
		$pdf->SetX(8);
		$pdf->WriteHTML('Nume');
		$pdf->SetX(23);
		$pdf->WriteHTML($nume);
		
		$pdf->SetY(67);
		$pdf->SetX(8);
		$pdf->WriteHTML('Prenume');
		$pdf->SetX(23);
		$pdf->WriteHTML($prenume);
		
		$pdf->SetY(72);
		$pdf->SetX(8);
		$pdf->WriteHTML('CID/CNP<br>');
		$pdf->SetX(8);
		$pdf->WriteHTML('CE<br>');
		$pdf->SetX(8);
		$pdf->WriteHTML('PASS');
		
		$pdf->SetY(77);
		$pdf->SetX(19);
		for($i = 0;$i < 20; $i++){
			$x = 15 + 4.1*$i;
			$pdf->Rect($x, 77, 4, 5);
			$pdf->SetX(15+4.1*$i);
			$pdf->WriteHTML($CID[$i]);
		}
		
		$pdf->SetY(87);
		$pdf->SetX(8);
		$pdf->WriteHTML('Data nasterii      ');
		$pdf->WriteHTML($datan);
		
		$pdf->SetY(92);
		$pdf->SetX(8);
		$pdf->WriteHTML('Sexul                 ');
		
		$pdf->WriteHTML('M           ');
		$pdf->Rect(34, 92, 4, 5);
		$pdf->WriteHTML('F');
		$pdf->Rect(45, 92, 4, 5);
		
		$pdf->SetX(62);
		$pdf->WriteHTML('Cetatenia    ');
		$pdf->WriteHTML($cetatenia);
		$pdf->Rect(77, 92, 4, 5);
		$pdf->Rect(80.9, 92, 4, 5);
		
		
		/* casute lateral 2*/
		
		$pdf->SetFontSize(6);
		$pdf->Rect(100,57.5,3,3);
		$pdf->SetY(56.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Salariat");
		
		$pdf->Rect(100,62,3,3);
		$pdf->SetY(61);
		$pdf->SetX(103);
		$pdf->WriteHTML("Co-asigurat");
		

		$pdf->Rect(100,66.5,3,3);
		$pdf->SetY(65.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Liber profesionist");
		

		$pdf->Rect(100,71.0,3,3);
		$pdf->SetY(70.0);
		$pdf->SetX(103);
		$pdf->WriteHTML("Copil (<18 ani)");
		

		$pdf->Rect(100,75.5,3,3);
		$pdf->SetY(74.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Elev / Ucenic / Student");
		$pdf->SetY(76.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("(18 - 25 ani)");

		$pdf->Rect(100,80.5,3,3);
		$pdf->SetY(79.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Gravida");
		
		$pdf->Rect(100,85.5,3,3);
		$pdf->SetY(84.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Pensionar");
		
		$pdf->Rect(100,90.5,3,3);
		$pdf->SetY(89.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("Veteran");
		
		$pdf->Rect(100,95.5,3,3);
		$pdf->SetY(94.5);
		$pdf->SetX(103);
		$pdf->WriteHTML("0 - 900 lei / luna");
		
		/*coloana 2*/
		
		$pdf->Rect(126,57.5,3,3);
		$pdf->SetY(56.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Revolutionar");
		
		$pdf->Rect(126,62,3,3);
		$pdf->SetY(61);
		$pdf->SetX(129);
		$pdf->WriteHTML("Handicap");
		

		$pdf->Rect(126,66.5,3,3);
		$pdf->SetY(65.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("PNS");
		

		$pdf->Rect(126,71.0,3,3);
		$pdf->SetY(70.0);
		$pdf->SetX(129);
		$pdf->WriteHTML("Ajutor social");
		

		$pdf->Rect(126,75.5,3,3);
		$pdf->SetY(74.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Somaj");

		$pdf->Rect(126,80.5,3,3);
		$pdf->SetY(78.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Personal");
		$pdf->SetY(80.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Contractual");
		
		$pdf->Rect(126,85.5,3,3);
		$pdf->SetY(83.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Card");
		$pdf->SetY(85.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("European(CE)");
		
		$pdf->Rect(126,90.5,3,3);
		$pdf->SetY(88.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Acorduri");
		$pdf->SetY(90.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("internationale");
		
		$pdf->Rect(126,95.5,3,3);
		$pdf->SetY(94.5);
		$pdf->SetX(129);
		$pdf->WriteHTML("Alte categorii");

		/* capat */
		$pdf->SetFontSize(8);
		$pdf->Line(4, 99, 144, 99);
		
		$pdf->SetY(99);
		$pdf->SetX('4');
		$pdf->WriteHTML('<b>3.</b>');
		$pdf->SetX(8);
		$pdf->WriteHTML('Diagnostic / Cod Diag.    ');
		$pdf->WriteHTML("$diagnostic<br>");
		
		$pdf->SetX(8);
		$pdf->WriteHTML('PNS                                 ');
		$pdf->WriteHTML("$PNS");
		
		$pdf->Line(4, 109, 144, 109);
		
		$pdf->SetY(109);
		$pdf->SetX(4);
		$pdf->WriteHTML('<b>4.</b>');
		$pdf->SetX(8);
		$pdf->WriteHTML('Data prescriere  ');
		
		$pdf->WriteHTML("$data_p<br>");
		$data = explode("\n",$data);
		$n = count($data);
		
		$header = array('Poz.', "Cod diag", 'Tip dg.', 'Denumire comuna / Concentratie', 'D.S.', 'Cantitate','Nr.zile trat.', '%Pret ref.', 'Lista');
		
		$pdf->SetX(4);
		for($i = 0; $i < $n-1; $i++){
			$date = explode("_",$data[$i]);
			$meds = array($i+1, $date[0], $date[1], "$date[2]/$date[3]", $date[4], $date[5], $date[6], $date[7], $date[8]);
			if($i == 0){
				$pdf->BasicTable($header,$meds);
			}else{
				$pdf->addRowtoTable($meds);
			}
		}
		$paragraf5 = array('Poz.', '5. Justificarea medicala prescriere denumire comerciala');
		$pdf->BasicHeader($paragraf5);
		
		$pdf->SetX(8);
		$pdf->Cell(40,4,'Nume si parafa medic prescriptor',0,0);
		$pdf->Cell(70,4,'',0,0);
		$pdf->SetFont('Arial', 'B');
		$pdf->Cell(20,4,'L.S. Unitate',0,0);
		
		$pdf->Ln();
		$pdf->SetX(8);
	
		$pdf->Cell(4,4,$nume_parafa,0,0);
		
		$pdf->Ln();
		$pdf->SetX(8);
		$pdf->SetFont('Arial', '');
		$pdf->Cell(4,4,'Semnatura medic prescriptor  .......................',0,0);

		$pdf->Output();
}
?>