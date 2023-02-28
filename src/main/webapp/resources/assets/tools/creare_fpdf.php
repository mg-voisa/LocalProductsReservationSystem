<?php
ini_set("precision", 3);

define('FPDF_FONTPATH','fpdf_lib/font/');
require('fpdf_lib/fpdf.php');
include('../functii.php');
include('../dbconn.php');

function centrare($init, $final, $length){ //prima pozitie, capatul campului, lungimea textului
	$total = $final - $init;
	$mijloc = $total / 2;
	$mijloc = $mijloc - ($length/5.9);
	return 3.5*$mijloc;
}

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
}
if(isset($_GET['tip']) && $_GET['tip'] == 'scutire'){
		$marime = array("100", "150");
		$pdf = new PDF('L', 'mm', $marime);
		$pdf->SetFont('Arial','',20);
		$pdf->AddPage();
		$pdf->SetY(6);
		$pdf->SetLineWidth("0.4");
		$pdf->SetAutoPageBreak(false);
		
		//structura adeverintei
		
		$judet = 'Judetul .............................................. ';
		$loc = '<br>Localitatea ........................................ ';
		$unitate = 'Unitatea sanitara ..............................<br><br>';
		$fisacarnet = 'Nr.fisa/carnet de sanatate ';
		$fisacarnet2 = '..................................................';
		$titlu = '<b><i>ADEVERINTA MEDICALA</i></b>';
		$nume = '<br><br>Se adevereste ca .............................................................................................. ';
		$sexul = 'sexul M / F';
		$anul = 'Nascut .................................. ';
		$luna = 'luna .................................................. ';
		$ziua = 'ziua ............................ ';
		$jud = 'Cu domiciliul in: jud. ...... ';
		$localitatea = 'localitatea .............................. ';
		$str = 'str. ............................ ';
		$nr = 'nr. .............';
		$ocupatia = 'Avand ocupatia de: ........................................................';
		$loc_prestare = ' la .................................................';
		$diagnostic = '<br><br>Este suferind de: ..................................................................................................................';
		$tratament = '<br>Se recomanda: ....................................................................................................................';
		$motiv = '<br><br>S-a eliberat pentru a-i servi la: .............................................................................................';
		$data = '<br>20 .......... luna ........................... ziua ..............';
		
		$pdf->SetLeftMargin(11);		
		$pdf->SetFontSize(9);
		$pdf->WriteHTML($judet);
		
		$pdf->SetLeftMargin(90);
		$pdf->WriteHTML($fisacarnet);
		
		$pdf->SetLeftMargin(11);
		$pdf->WriteHTML($loc);
		
		$pdf->SetLeftMargin(90);
		$pdf->WriteHTML($fisacarnet2);
		
		$pdf->SetLeftMargin(11);
		$pdf->WriteHTML($unitate);
		
		$pdf->SetFont('Arial', '', 15);
		$pdf->SetLeftMargin(40);
		$pdf->WriteHTML($titlu);
		
		$pdf->SetY(23);
		$pdf->SetFontSize(9);
		$pdf->SetLeftMargin(11);
		$pdf->WriteHTML($nume);
		
		$pdf->WriteHTML($sexul);
		$pdf->WriteHTML($anul);
		$pdf->WriteHTML($luna);
		$pdf->WriteHTML($ziua);
		
		$pdf->WriteHTML($jud);
		$pdf->WriteHTML($localitatea);
		$pdf->WriteHTML($str);
		$pdf->WriteHTML($nr);
		
		$pdf->WriteHTML($ocupatia);
		$pdf->WriteHTML($loc_prestare);
		
		$pdf->Line(12, 54, 136.5, 54);
		
		
		$pdf->WriteHTML($diagnostic);
		$pdf->WriteHTML($tratament);
		
		$pdf->Line(12, 69, 136.5, 69);
		
		$pdf->WriteHTML($motiv);
		
		$pdf->Line(12, 79, 136.5, 79);
		
		$pdf->WriteHTML('<br><br>Data eliberarii: ');
		
		$pdf->SetX(92);
		$pdf->WriteHTML('Semnatura si parafa medicului: ');
		$pdf->WriteHTML($data);
		$pdf->SetX(100);
		$pdf->WriteHTML('L.S. .................................');
		
		$pdf->Rect("10", "5", 130, 90, 'D');
		
		//completarea adeverintei
		if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(verifica($conn, 'fisa', 'id', $id) == 1){
	$sql ="SELECT * FROM fisa WHERE id ='".$id."'";
	$result = $conn->query($sql);
	$date = '';
foreach($result as $row)
    {
		$date .=  $row['localitate'] . "\n";
		$date .=  $row['strada'] . "\n";
		$date .=  $row['nr'] . "\n";
    }
	$sql ="SELECT * FROM pacienti WHERE id ='".$id."'";
	$result = $conn->query($sql);
	foreach($result as $row)
    {
		$date .=  $row['nume'] . "\n";
		$date .=  $row['prenume'] . "\n";
		$date .=  $row['datan'] . "\n";
		$date .=  $row['CNP'];
    }
	
	}
	$date = explode("\n",$date);
}
else{
	$date = array('', '', '', '', '', ' - - ', '', '', '', '', '', '');
}

		$pdf->SetFont('Arial','',8);
		$pdf->SetTextColor(51, 51, 255);
		$length = 0;
		
		$pdf->SetY(34.5); //primu rand
		
		$nume = $date[3].' '.$date[4];
		$pdf->SetLeftMargin(37 + centrare(37, 64, $pdf->GetStringWidth($nume))); //centrare
		$pdf->Cell(0,0,$nume); // nume
		
		$pdf->SetY(39.5); //al doilea rand
		
		
		$data = explode("-",$date[5]);
		$anul_n = $data[0];
		$luna = $data[1];
		$ziua = $data[2];
		$pdf->SetX(22 + 12); 
		$pdf->Cell(0,0,$anul_n); // an
		$pdf->SetX(60 + 20); 
		$pdf->Cell(0,0,$luna); // luna
		$pdf->SetX(112 + 10); 
		$pdf->Cell(0,0,$ziua); // zi
		
		$pdf->SetY(44.5); //al treilea rand
		
		$judet = $_GET['judet'];
		$localitate = $date[0];
		$nr = $date[2];
		$strada = $date[1];
		$pdf->SetX(40); 
		$pdf->Cell(0,0,$judet); // judet
		$pdf->SetX(62 + centrare(62, 70.5, $pdf->GetStringWidth($localitate)) ); 
		$pdf->Cell(0,0,$localitate); // localitate
		$pdf->SetX(94.5 + centrare(94.5, 102.5, $pdf->GetStringWidth($strada))); 
		$pdf->Cell(0,0,$strada); // strada
		$pdf->SetX(124.5 + centrare(124.5, 128, $pdf->GetStringWidth($nr))); 
		$pdf->Cell(0,0,$nr); // nr

		$pdf->SetY(49.5); //al patrulea rand
		
		$ocupatie = $_GET['ocupatie'];
		$loc_prestare = $_GET['loc_prestare'];
		$pdf->SetX(39.5 + centrare(39.5, 56, $pdf->GetStringWidth($ocupatie))); 
		$pdf->Cell(0,0,$ocupatie); // ocupatie
		$pdf->SetX(93 + centrare(93, 107, $pdf->GetStringWidth($loc_prestare))); 
		$pdf->Cell(0,0,$loc_prestare); // locul prestarii
		
		$pdf->SetY(59.5); //al cincilea rand
		
		$diagnostic = $_GET['diagnostic'];
		$pdf->SetX(36 + centrare(36, 68, $pdf->GetStringWidth($diagnostic))); 
		$pdf->Cell(0,0,$diagnostic); // diagnostic
		
		$pdf->SetY(64.8); //al saselea rand
		
		$tratament = $_GET['tratament'];
		$pdf->SetX(34 + centrare(34, 66, $pdf->GetStringWidth($tratament))); 
		$pdf->Cell(0,0, $tratament); // tratament
		
		$pdf->SetY(74.5); //al saptelea rand
		
		
		//$pdf->GetStringWidth($motiv);
		
		$motiv = $_GET['motiv']; // capat 81.5;
		$pdf->SetX(54.5 + centrare(54.5, 81.5, $pdf->GetStringWidth($motiv))); 
		$pdf->Cell(0,0, $motiv); // motiv
		
		$pdf->SetY(89.5); //al optulea rand
		
		if(isset($_GET['datac'])){
			$datac = $_GET['datac'];
			$datac = explode('-', $datac);
			$an = $datac[0]; // capat 11;
			$an = $an[2].$an[3];
			$luna = $datac[1];
			$zi = $datac[2];
		}
		else{
			$an = '';
			$luna = '';
			$zi = '';
		}
		$pdf->SetX(15.5 + centrare(15.5, 18.5, $pdf->GetStringWidth($an))); 
		$pdf->Cell(0,0, $an); // an 
		$pdf->SetX(43); 
		$pdf->Cell(0,0, $luna); // luna 
		$pdf->SetX(68); 
		$pdf->Cell(0,0, $zi); // zi

		$pdf->Output();
		$CNP = $date[6];
		$campuri = 'CNP, diagnostic, tratament, motiv, data_elib';
		$valori ="'".$CNP."', '".$diagnostic."', '".$tratament."', '".$motiv."', '".$_GET['datac']."'";
		inserare($conn, 'adeverinte', $campuri, $valori);
		//tipar valori $valori ="'".$exemplu."', '".$exemplu."', '".$exemplu."'";
}
?>