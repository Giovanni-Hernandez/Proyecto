<?php

	include("Config.php");

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
		$mail->Password = "equipo2proyecto";
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

		if ( $mail->send() ) {
			echo "Correo enviando";
		} else {
			echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
		}

		$mail->smtpClose();
	}

	function recuperarDatos($boleta)
	{
		/* Conexion a la base de datos*/
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		/* Recuperando datos alumno */
		$queryAlumno = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno, idGrupo, Correo  FROM registroalumnos WHERE NoBoleta = '{$boleta}'";
        $alumno = mysqli_query($db, $queryAlumno);
        $datosAlumno = mysqli_fetch_array(($alumno));

		/* Recuperando horario alumno */

		/* Configurando el lenguaje de salida a español */
		$queryLan = "SET lc_time_names = 'es_ES'";
        $lan = mysqli_query($db, $queryLan);

		$queryGrupo = "SELECT Nombre, DAY(horario) as dia, MONTHNAME(horario) as mes, YEAR(horario) as anio, date_format(horario,'%H:%i') as hora, salon FROM grupo WHERE idGrupo = '{$datosAlumno['idGrupo']}'";
        $grupo = mysqli_query($db, $queryGrupo);
        $datosGrupo = mysqli_fetch_array(($grupo));

		return array(	'nombre' => $datosAlumno['Nombre'],
						'ap' => $datosAlumno['ApellidoPaterno'],
						'am'=> $datosAlumno['ApellidoMaterno'], 
						'correo' => $datosAlumno['Correo'],
						'grupo' => $datosGrupo['Nombre'], 
						'dia' => $datosGrupo['dia'],
						'mes' => $datosGrupo['mes'],
						'anio' => $datosGrupo['anio'],
						'hora' => $datosGrupo['hora'],
						'salon' => $datosGrupo['salon']
					);
	}
?>