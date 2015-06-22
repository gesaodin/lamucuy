<?php
// Guardar los datos recibidos en variables:
$correoi= "info@hidromaquinarias.com"; 
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$telefono = $_POST['telefono'];
// Definir el correo de destino:
$dest = "insumoslacandelaria@gmail.com"; 
 
// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
$headers = "From: $correoi\r\n";
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Aqui definimos el asunto y armamos el cuerpo del mensaje
$asunto = "Contacto";
$cuerpo = "<strong>Nombre:</strong> ".$nombre."<br>";
$cuerpo .= "<strong>Email:</strong> ".$email."<br>";
$cuerpo .= "<strong>Mensaje:</strong> ".$mensaje;
$cuerpo .= "<strong>telefono:</strong> ".$telefono;
 
// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
if($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
}
?>