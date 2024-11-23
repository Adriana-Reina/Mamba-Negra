<?php
require("conexion_inicio_sesion.php");
session_start(); 

$numero_usuario = $_SESSION['Num_usr'];
$hora=$_POST['hora'];
$fecha=$_POST['fecha'];

if (!$cn->connect_errno) {

    $fecha = date('Y-m-d', strtotime($fecha));

    $query = "INSERT INTO Agendamiento_Cita (FECHA, HORA, NUM_USUARIO)
          VALUES ('$fecha', '$hora', '$numero_usuario')";
    if ($cn->query($query) === TRUE) {
        echo "<script>
                alert('Registro de cita exitoso.');
                window.location.href = '../interfaces/registrar_cita.html';
              </script>";
    } else {
        echo "Error en la consulta: " . $cn->error;
    }

    $cn->close();
}

