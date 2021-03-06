<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	function enviarCorreo($documentoCadena, $boleta)
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
		$mail->CharSet = 'UTF-8';

		/* Emisor */
		$mail->Username = "escom.proyecto.tw@gmail.com";
		$mail->Password = "tecnologiasweb";
		$mail->Subject = "Comprobante de registro";
		$mail->setFrom("escom.proyecto.tw@gmail.com", "Escuela Superior de Computación");

		/* Recuperar datos del alumno */
		$registro = recuperarDatos($boleta);

		/*Mensaje en HTML*/
		$mail->isHTML(true);
		$shtml = file_get_contents('../mensaje.html');

		/* Reemplazando los valores por los del alumno */
		$shtml = str_replace("%nombre%", $registro['nombre'], $shtml);
		$shtml = str_replace("%ap%", $registro['ap'], $shtml);
		$shtml = str_replace("%am%", $registro['am'], $shtml);
		$shtml = str_replace("%grupo%", $registro['grupo'], $shtml);
		$shtml = str_replace("%dia%", $registro['dia'], $shtml);
		$shtml = str_replace("%mes%", $registro['mes'], $shtml);
		$shtml = str_replace("%anio%", $registro['anio'], $shtml);
		$shtml = str_replace("%salon%", $registro['salon'], $shtml);
		$shtml = str_replace("%hora%", $registro['hora'], $shtml);

		/* Agregando el mensaje en HTML al body del correo */
		$mail -> Body = $shtml;

		/* Adjuntar archivo pdf*/
		$mail->addStringAttachment($documentoCadena, "ComprobanteDeRegistro.pdf");

		/* Remitente */
		$mail->addAddress($registro['correo']);

		return($mail -> send());
	}
?>