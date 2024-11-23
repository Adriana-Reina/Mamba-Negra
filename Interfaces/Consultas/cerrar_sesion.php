<?php
session_start();
session_destroy();
echo "<script>
    alert('¡Vuelve pronto!');
    window.location.href = '../inicio-sesion.html';
</script>";
