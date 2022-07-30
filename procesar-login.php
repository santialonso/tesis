<?php
session_start();
// chequeo de datos obligarios
if(empty($_POST["email"]) || empty($_POST["password"])):
    header("Location:iniciosesion.php?seccion=iniciar&estado=error&error=campo-obligatorio");
    die();
endif;


$email = $_POST["email"];
$password = $_POST["password"];

// Chequeo si la carpeta está creado
if(!is_dir("usuarios/$email")):
    header("Location:iniciosesion.php?seccion=iniciar&estado=error&error=no-existe");
    die();
endif;

// El usuario existe en nuestro sitio
$passwordUsuario = file_get_contents("usuarios/$email/password.txt");

if(!password_verify($password,$passwordUsuario)):
    header("Location:iniciosesion.php?seccion=iniciar&estado=error&error=dato-erroneo");
    die();
endif;

// Ya el usuario puede ingresar al sistema
$_SESSION["usuario"] = [
    "nombre" => file_get_contents("usuarios/$email/nombre.txt"),
    "email" => $email,
    "usuario" => file_get_contents("usuarios/$email/usuario.txt"),
    "perfil" => file_get_contents("usuarios/$email/perfil.txt")
];

header("Location:index.php");

