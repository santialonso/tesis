<?php

// chequeo de datos obligarios
if(empty($_POST["email"])):
    header("Location:index.php?seccion=registro&estado=error&error=email");
    die();
elseif(empty($_POST["password"])):
    header("Location:index.php?seccion=registro&estado=error&error=password");
    die();
endif;

$email = $_POST["email"];
$password = $_POST["password"];
$nombre = $_POST["nombre"];

// Creamos un usuario si no lo ingresó
$emailLimpio = explode("@",$email)[0];

//$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $emailLimpio;


// Chequeo si la carpeta está creada
if(is_dir("usuarios/$email")):
    header("Location:index.php?seccion=registro&estado=error&error=usuarioExiste");
    die();
endif;

// Chequeo si el usuario existe
if(file_exists("usuarios/$email/usuario.txt") && file_get_contents("usuarios/$email/usuario.txt") == $usuario):
    header("Location:index.php?seccion=registro&estado=error&error=usuarioExiste");
    die();
endif;

// Si el usuario no existe creo la carpeta
mkdir("usuarios/$email");

// Creo el archivo usuario.txt
file_put_contents("usuarios/$email/usuario.txt",$usuario);

// Creo el archivo nombre.txt
file_put_contents("usuarios/$email/nombre.txt",$nombre);

// Creo el archivo apellido.txt
file_put_contents("usuarios/$email/apellido.txt",$apellido);

// Creo el archivo perfil.txt
file_put_contents("usuarios/$email/perfil.txt","usuario");

// Creo el archivo password.txt
file_put_contents("usuarios/$email/password.txt",password_hash($password,PASSWORD_DEFAULT));

header("Location:iniciosesion.php?seccion=iniciar");
