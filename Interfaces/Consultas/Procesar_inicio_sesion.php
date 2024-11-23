<?php
session_start();
$correo_electronico = $_POST['correo_electronico'];
$contraseña = $_POST['contrasena'];

require('conexion_inicio_sesion.php');

if (!$cn->connect_errno) {
    echo ("Conexión exitosa<br>");

    $correo_electronico = $cn->real_escape_string($correo_electronico);

    $resultado = $cn->query("SELECT * FROM USUARIO_MAMBA WHERE CORREO_ELECTRONICO = '$correo_electronico'");
    if ($resultado) {
        echo ("LA CONSULTA ES CORRECTA<br>");
        while ($array = $resultado->fetch_array()) {
            echo ("ENTRAMOS AL WHILE<br>");
            if ($array['CONTRASEÑA'] == $contraseña) {
                $_SESSION['usuario'] = $correo_electronico;  
                $_SESSION['Num_usr'] = $array['NUM_USR'];
                header("Location: ../Interfaces/inicio.html");
                exit; 
            } else {
                echo ("Contraseña incorrecta");
            }
        }
        $cn->close();
    } else {
        echo ("LA CONSULTA ES ERRONEA");
    }
} else {
    echo ("Fallo la Conexión");
}

