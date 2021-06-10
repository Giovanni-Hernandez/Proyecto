<?php
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";

	$mail->Username = "escom.proyecto.tw@gmail.com";
	$mail->Password = "equipo2proyecto";
	$mail->Subject = "Comprobante de registro";
	$mail->setFrom("escom.proyecto.tw@gmail.com");

	$mail->isHTML(true);
	$shtml = file_get_contents('html/mensaje.html');
    $mail -> Body = $shtml;

	$mail->addAttachment("pruebas.pdf", "ComprobanteDeRregistro.pdf");

	$mail->addAddress("escom.proyecto.tw@gmail.com");

	if ( $mail->send() ) {
		echo "Correo enviando";
	} else {
		echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
	}

	$mail->smtpClose();
    
	/*$shtml = file_get_contents('html/mensaje.html');
	echo $shtml;*/
?>