<?php
require_once 'includes/conexion.php';
//var_dump($_POST);
if(isset($_POST)){
    // recojer los valores del formulario de reguistro
    $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false; 
    $password = isset($_POST['password']) ? $_POST['password'] : false;
}
//Array de errores
$errores = array();

// validar los datos antes de guardar en base de datos

//validar campo nombre
if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_Validado = true;
}else{
    $nombre_Validado = false;
    $errores['nombre'] = "el nombre no es valido";
}
//validar apellidos
if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
    $apellidos_Validado = true;
}else{
    $apellidos_Validado = false;
    $errores['apellidos'] ="los apellidos no son validos";
}
//validar email
if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_Validado = true;
}else{
    $email_Validado = false; 
    $errores['email'] ="el email no es validos";
}
//validar password
if(!empty($password)){
    $password_Validado = true;
}else{
    $password_Validado = false;
    $errores['password'] = "campo password vacio";
}


if(count($errores) == 0){
    //Cifrar contraseña
    $password_Segura = password_hash($password,PASSWORD_BCRYPT, ['cost'=>4]);
    //Insertar Usuarios en la tabla
    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_Segura', CURDATE());";
    $guardar = mysqli_query($db, $sql);
    
    if($guardar){
        $exito = "el registro se ha completado"; 
    }else{
        $fallo = "falla al guardar el usuario";
    }
    
    
}else{
    $_SESSION['errores'] = $errores;
}
if(isset($exitoso)){
    header('location: index.php?exito='.$exito);
}else{
    header('location: index.php?fallo='.$fallo);
}


