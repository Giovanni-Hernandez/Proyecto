<?php


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	include("fpdf183/fpdf.php"); 
		
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('helvetica','B',20);
	$pdf->Cell(40,20,'Hola grupo 2CM14! (Mayo 2021)');
	$doc = $pdf->Output('', 'S');
	
	function enviarCorreo($documentoCadena)
	{
		require 'phpmailer/PHPMailer.php';
		require 'phpmailer/SMTP.php';
		require 'phpmailer/Exception.php';

		/* Configuracion */
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
		$mail->Port = "587";

		/* Emisor */
		$mail->Username = "escom.proyecto.tw@gmail.com";
		$mail->Password = "equipo2proyecto";
		$mail->Subject = "Comprobante de registro";
		$mail->setFrom("escom.proyecto.tw@gmail.com");

		/*Mensaje en HTML*/
		$mail->isHTML(true);
		$shtml = file_get_contents('../mensaje.html');
		$mail -> Body = $shtml;

		/* Adjuntar archivo pdf*/
		$mail->addStringAttachment($documentoCadena, "ComprobanteDeRregistro.pdf");

		/* Remitente */
		$mail->addAddress("escom.proyecto.tw@gmail.com");

		if ( $mail->send() ) {
			echo "Correo enviando";
		} else {
			echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
		}

		$mail->smtpClose();
	}

	enviarCorreo($doc);
?>