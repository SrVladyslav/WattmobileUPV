<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['fname'];
$Lnombre = $_POST['lname'];
$Email = $_POST['email'];
$Telefono = $_POST['phone'];
$Mensaje = $_POST['message'];

if ($Nombre=='' || $Email=='' || $Mensaje=='' || $Lnombre = '' || $Telefono = '' ){ // Si falta un dato en el formulario mandara una alerta al usuario.

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("formulario/class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
    $mail = new PHPMailer();

    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("gcdevlady@gmail.com"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto: $Email"; // Asunto del mensaje.
    $mail->Body     =  "Nombre: $Nombre \n<br />". // Nombre del usuario
    "Apellidos: $Lnombre \n<br />". // Apellido del usuario
    "Telefono: $Telefono \n<br />". // Telefono del usuario
    "Email: $Email \n<br />".    // Email del usuario
    "Mensaje: $Mensaje \n<br />"; // Mensaje del usuario

// Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
    $mail->SMTPAuth = true; 
    $mail->Username = "gcdevlady@gmail.com";  // Correo Electrónico
    $mail->Password = "contraseña"; // Contraseña del correo

    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>