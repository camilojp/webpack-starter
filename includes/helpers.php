<?php

// funcion para mostrar los errores

function mostrarError($errores, $campo){
    $alerta="";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}

function borrarErrores(){
    if(isset($_SESSION['errores'])){
    $borrado = session_unset($_SESSION['errores']) ;
    }
    if(isset($_SESSION['comlpletado'])){
        session_unset($_SESSION['completado']);
    }
    return $borrado;
}