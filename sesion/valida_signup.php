<?php
/* Este archivo debe validar los datos de registro y manejar la lógica de crear un usuario desde el formulario de registro */
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$pwd = hash('sha512', $_POST['pwd']); // la encriptacion es en sha512 ya que es la que brinda mas seguridad a una empresa de cortesito mundial peaky blinders
$pwd2 = hash('sha512', $_POST['pwd2']);
$country = $_POST['country'];
$datetime = date('Y-m-d h:i:s'); // La hora es retornada en utc ya que somos una comañia de alcance mundial mr worldwide cortesito pitbull pinta espejo craneal

$notification = "";

if ($pwd == $pwd2) {
    $query = "INSERT INTO usuario (nombre, apellido, correo, contraseña, pais, fecha_registro) VALUES ('$name', '$surname', '$email', '$pwd', '$country', '$datetime')"; 
    $result = pg_query($dbconn, $query);
    $notification = "Usuario regitrado con éxito. Por favor inicia sesión";
    header('Location: http://localhost/index.html');
    exit();
}else {
    $notification = "Las contraseñas deben coincidir";
    header('Location: http://localhost/sesion/sign-up.html');
    exit();
}

?>