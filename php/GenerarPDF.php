<?php
include("Config.php");
session_start();
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($db -> connect_error){//Si hay error al conectar a la abse de datos
    die("Coneccion fallida: ".$db->connect_error);
 }
 else
 {
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
          $boleta1 = mysqli_real_escape_string($db,$_POST['txtnumero']);
          $boleta =  strtoupper($boleta1);
          $sql = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom FROM registroalumnos WHERE NoBoleta = '{$boleta}'";  
          $alumno = mysqli_query($db, $sql);
          $datos = mysqli_fetch_array(($alumno));
          $bandera = mysqli_num_rows($alumno);//Almacenamos el valor de filas encontradas
          if($bandera != 1)
          {
              echo "<script>
                  alert('Lo sentimos, no hemos podido encontrar ningún dato con el numero de boleta {$boleta}. Intentelo de nuevo');
                  window.location= '/../Proyecto WEB/recuperar.html'
                  </script>";
          }
  }
 }

    include_once('PDF.php');
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
    $pdf->Cell(40,10,"2021-08-02 9:00",0,1,'L');
    $pdf->SetX(20);
    $pdf->Cell(20,10,"Grupo:",0,0,'L');
    $pdf->Cell(40,10,"1EX1",0,1,'L');
    $pdf->SetX(20);
    $pdf->Cell(20,10,utf8_decode("Salón:"),0,0,'L');
    $pdf->Cell(40,10,"1104",0,1,'L');

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
        array('info' => 'Número de Boleta', 'campo' => $datos['NoBoleta']),
        array('info' => 'Nombre', 'campo' => $datos['Nombre']),
        array('info' => 'Apellido Paterno', 'campo' => $datos['ApellidoPaterno']),
        array('info' => 'Apellido Materno', 'campo' => $datos['ApellidoMaterno']),
        array('info' => 'Fecha Nacimiento', 'campo' => $datos['FechaNacimiento']),
        array('info' => 'Género', 'campo' => $datos['Genero']),
        array('info' => 'CURP', 'campo' =>  $datos['CURP']),
        array('info' => 'Calle y Número', 'campo' =>  $datos['CalleYNumero']),
        array('info' => 'Colonia', 'campo' =>  $datos['Colonia']),
        array('info' => 'Código Postal', 'campo' =>  $datos['CodigoPostal']),
        array('info' => 'Teléfono o Celular', 'campo' =>  $datos['TelefonoOCelular']),
        array('info' => 'Correo', 'campo' =>  $datos['Correo']),
        array('info' => 'Escuela Procedencia', 'campo' =>  $datos['EscuelaProcedencia']),
        array('info' => 'Entidad Federativa', 'campo' =>  $datos['EntidadFederativa']),
        array('info' => 'Promedio', 'campo' =>  $datos['Promedio']),
        array('info' => 'Opción ESCOM', 'campo' =>  $datos['OpcionEscom']),

        );
   
    $pdf->tablaHorizontal($miCabecera, $misDatos);
   
    $pdf->Output();//Salida al navegador

?>