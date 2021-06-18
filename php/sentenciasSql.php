<?php

    function existeAlumno($boleta)
    {
        /* Conexion a la base de datos */
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $queryAlumno = "SELECT * FROM registroalumnos WHERE NoBoleta = '{$boleta}'";
        $alumno = mysqli_query($db, $queryAlumno);

        /* Verificando la existencia */
        if(mysqli_num_rows($alumno) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function recuperarDatos($boleta)
    {
        /* Conexion a la base de datos*/
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		/* Configurando el lenguaje de salida a español */
		$queryLan = "SET lc_time_names = 'es_ES'";
        $lan = mysqli_query($db, $queryLan);

        /* Recuperando datos alumno */
        $queryAlumno = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, DAY(FechaNacimiento) as dia, MONTHNAME(FechaNacimiento) as mes, YEAR(FechaNacimiento) as anio, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom, idGrupo FROM registroalumnos WHERE NoBoleta = '{$boleta}'";
        $alumno = mysqli_query($db, $queryAlumno);
        $datosAlumno = mysqli_fetch_array(($alumno));

        /* Recuperando los datos del grupo, horario y salon */
        $queryGrupo = "SELECT Nombre, DAY(horario) as dia, MONTHNAME(horario) as mes, YEAR(horario) as anio, date_format(horario,'%h:%i %p') as hora, salon FROM grupo WHERE idGrupo = '{$datosAlumno['idGrupo']}'";
        $grupo = mysqli_query($db, $queryGrupo);
        $datosGrupo = mysqli_fetch_array(($grupo));

        return array(	'boleta' => $datosAlumno['NoBoleta'],
                        'nombre' => $datosAlumno['Nombre'],
						'ap' => $datosAlumno['ApellidoPaterno'],
						'am'=> $datosAlumno['ApellidoMaterno'],
                        'fechaNacDia' => $datosAlumno['dia'],
                        'fechaNacMes' => $datosAlumno['mes'],
                        'fechaNacAnio' => $datosAlumno['anio'],
                        'genero' => $datosAlumno['Genero'],
                        'curp' => $datosAlumno['CURP'],
                        'calle_num' => $datosAlumno['CalleYNumero'],
                        'colonia' => $datosAlumno['Colonia'],
                        'codPostal' => $datosAlumno['CodigoPostal'],
                        'tel' => $datosAlumno['TelefonoOCelular'],
						'correo' => $datosAlumno['Correo'],
                        'escuela' => $datosAlumno['EscuelaProcedencia'],
                        'entidad' => $datosAlumno['EntidadFederativa'],
                        'escuelaNom' => $datosAlumno['NombreEscuela'],
                        'prom' => $datosAlumno['Promedio'],
                        'opcion' => $datosAlumno['OpcionEscom'],
						'grupo' => $datosGrupo['Nombre'], 
						'dia' => $datosGrupo['dia'],
						'mes' => $datosGrupo['mes'],
						'anio' => $datosGrupo['anio'],
						'hora' => $datosGrupo['hora'],
						'salon' => $datosGrupo['salon']
					);
    }

?>