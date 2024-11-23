<?php
require("conexion_inicio_sesion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$confirmarContrasena = $_POST['confirmar_contrasena'];

if (!$cn->connect_errno) {
    session_start();

    $result = $cn->query("SELECT MAX(NUM_USR) AS max_id FROM USUARIO_MAMBA");
    $row = $result->fetch_assoc();
    $id = $row['max_id'] + 1;

    $fechaNacimiento = date('Y-m-d', strtotime($fechaNacimiento));
    $telefono = intval($telefono);

    $query = "INSERT INTO USUARIO_MAMBA (NUM_USR, NOMBRE, APELLIDO, FECHA_NACIMIENTO, DIRECCION, TELEFONO, CORREO_ELECTRONICO, CONTRASEÑA)
              VALUES ('$id', '$nombre', '$apellido', '$fechaNacimiento', '$direccion', '$telefono', '$correo', '$contrasena')";

    if ($cn->query($query) === TRUE) {
        echo "<script>
                alert('Registro exitoso. Redirigiendo a la página de inicio de sesión...');
                window.location.href = '../inicio-sesion.html';
              </script>";
    } else {
        echo "Error en la consulta: " . $cn->error;
    }

    $cn->close();
}

