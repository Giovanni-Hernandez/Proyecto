<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/escudoESCOM.png', 15, 12 ,33);
    $this->Image('../img/ipn.png',160, 12, 29, 31);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
 
    $this->SetXY(65,15);   // Movernos a la derecha
    $this->Cell(80,10,utf8_decode('Instituto Politécnico Nacional'),0,1,'C');   // Título

    $this->Cell(45);
    $this->Cell(100,10,utf8_decode('Escuela Superior de Cómputo'),0,0,'C');#Recibe el ancho,alto,texto,si lleva borde, si tiene salto de linea, alineación(left L, center C, right R)
    // Salto de línea
    $this->Ln(20);
}
function cabeceraHorizontal($cabecera)
{
    $this->SetXY(15, 115);
    $this->SetFont('Arial','B',14);
    $this->SetFillColor(8, 42, 254);//Fondo verde de celda
    $this->SetTextColor(240, 255, 240); //Letra color blanco
    foreach($cabecera as $fila)
    {

    $this->CellFitSpace(90, 7, utf8_decode($fila),1, 0 , 'C', true);

    }
}

function datosHorizontal($datos)
{
    $this->SetXY(15,122);
    $this->SetFont('Arial','',10);
    $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
    $this->SetTextColor(3, 3, 3); //Color del texto: Negro
    $bandera = false; //Para alternar el relleno
    foreach($datos as $fila)
    {
        //Usaremos CellFitSpace en lugar de Cell
        $this->SetX(15);
        $this->CellFitSpace(90,8, utf8_decode($fila['info']),1, 0 , 'L', $bandera );
        $this->CellFitSpace(90,8, utf8_decode($fila['campo']),1, 0 , 'L', $bandera );
        $this->Ln();//Salto de línea para generar otra fila
        $bandera = !$bandera;//Alterna el valor de la bandera
    }
}

function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
{
    $this->cabeceraHorizontal($cabeceraHorizontal);
    $this->datosHorizontal($datosHorizontal);
}

//***** Aquí comienza código para ajustar texto *************
//***********************************************************
function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
{
    //Get string width
    $str_width=$this->GetStringWidth($txt);

    //Calculate ratio to fit cell
    if($w==0)
        $w = $this->w-$this->rMargin-$this->x;
    $ratio = ($w-$this->cMargin*2)/$str_width;

    $fit = ($ratio < 1 || ($ratio > 1 && $force));
    if ($fit)
    {
        if ($scale)
        {
            //Calculate horizontal scaling
            $horiz_scale=$ratio*100.0;
            //Set horizontal scaling
            $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
        }
        else
        {
            //Calculate character spacing in points
            $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
            //Set character spacing
            $this->_out(sprintf('BT %.2F Tc ET',$char_space));
        }
        //Override user alignment (since text will fill up cell)
        $align='';
    }

    //Pass on to Cell method
    $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

    //Reset character spacing/horizontal scaling
    if ($fit)
        $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
}

function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
    $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
}

//Patch to also work with CJK double-byte text
function MBGetStringLength($s)
{
    if($this->CurrentFont['type']=='Type0')
    {
        $len = 0;
        $nbbytes = strlen($s);
        for ($i = 0; $i < $nbbytes; $i++)
        {
            if (ord($s[$i])<128)
                $len++;
            else
            {
                $len++;
                $i++;
            }
        }
        return $len;
    }
    else
        return strlen($s);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,3,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


?>