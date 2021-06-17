<?php
    include_once('PDF.php');

    function generarPdf($boleta, $filtro)
    {
        $datos = recuperarDatos($boleta);

        $pdf = new PDF();
        $pdf->AliasNBPages(); # Alias para el pie de pagina
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',15); #Tipo, estilo, tamaño
    
        //Margen decorativo iniciando en 0, 0
        $pdf->Image('../img/fondo.png', 0, 0, 210, 295, 'PNG');
        $pdf->SetDrawColor(8, 42, 254);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(20, 50, 185, 50); // 20mm from each Edge
        $pdf->Line(20, 100, 185, 100);
        $pdf->SetLineWidth(0);
        $pdf->SetFont('Arial','',11);
        $pdf->SetXY(20,55);
        $pdf->MultiCell(165,5,utf8_decode("¡Bienvenido! A continuación podrás observar el horario, grupo y salón en el que te toca hacer tu examen. Al igual que tus Datos Generales."),0,'L',0);
    
        $pdf->SetXY(20,68);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(20,10,"Horario:",0,0,'L');
        $pdf->Cell(40,10, $datos['dia'].' de '.$datos['mes'].' del '.$datos['anio'].' a las '.$datos['hora'].' horas',0,1,'L');
        $pdf->SetX(20);
        $pdf->Cell(20,10,"Grupo:",0,0,'L');
        $pdf->Cell(40,10, $datos['grupo'], 0, 1,'L');
        $pdf->SetX(20);
        $pdf->Cell(20,10,utf8_decode("Salón:"),0,0,'L');
        $pdf->Cell(40,10, $datos['salon'], 0,1,'L');
    
        $pdf->SetXY(55,105);
        $pdf->SetTextColor(8, 42, 254);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(100,10,'Datos Generales',0,0,'C');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->setFillColor(250, 102, 102);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(50,260);
        $pdf->Cell(120,10,utf8_decode('Recuerda imprimir esta hoja pues será solicitada'),0,0,'C',1);
    
        $miCabecera = array('Información', 'Campo');
        $misDatos = array(
            array('info' => 'Número de Boleta', 'campo' => $datos['boleta']),
            array('info' => 'Nombre', 'campo' => $datos['nombre']),
            array('info' => 'Apellido Paterno', 'campo' => $datos['ap']),
            array('info' => 'Apellido Materno', 'campo' => $datos['am']),
            array('info' => 'Fecha Nacimiento', 'campo' => $datos['fechaNacDia'].' de '.$datos['fechaNacMes'].' del '.$datos['fechaNacAnio']),
            array('info' => 'Género', 'campo' => $datos['genero']),
            array('info' => 'CURP', 'campo' =>  $datos['curp']),
            array('info' => 'Calle y Número', 'campo' =>  $datos['calle_num']),
            array('info' => 'Colonia', 'campo' =>  $datos['colonia']),
            array('info' => 'Código Postal', 'campo' =>  $datos['codPostal']),
            array('info' => 'Teléfono o Celular', 'campo' =>  $datos['tel']),
            array('info' => 'Correo', 'campo' =>  $datos['correo']),
            array('info' => 'Escuela Procedencia', 'campo' => $datos['escuela']),
            array('info' => 'Entidad Federativa', 'campo' =>  $datos['entidad']),
            array('info' => 'Promedio', 'campo' =>  $datos['prom']),
            array('info' => 'Opción ESCOM', 'campo' =>  $datos['opcion']),
    
            );
       
        $pdf -> tablaHorizontal($miCabecera, $misDatos);
       
        if($filtro == 'S')
        {
            return $pdf -> Output('', 'S');
        }
        else if ($filtro == 'D')
        {
            $pdf -> Output("ComprobanteDeRegistro.pdf", 'D');
        }
    }
?>