<?php



$to = 'mail@pantallasprofesionales.com';



$subject = 'Email de Pantallas Profesionales';



$message = '

<html>

<head>

  <title>Email de Pantallas Profesionales</title>

</head>

<body>

  <p>

  Nombre: '.$_POST["nomape"].'

  </p>

  <p>

  Telefono: '.$_POST["tel"].'

  </p>

  <p>

  Email: '.$_POST["email"].'

  </p>

  <p>

  Mensaje: '.$_POST["consulta"].'

  </p>

</body>

</html>

';



$headers[] = 'MIME-Version: 1.0';

$headers[] = 'Content-type: text/html; charset=iso-8859-1';



$headers[] = 'To: Info <mail@pantallasprofesionales.com>';



$headers[] = 'From: Contacto Pantallas Profesionales <info@pantallasprofesionales.com>';



mail($to, $subject, $message, implode("\r\n", $headers));



echo "Gracias por su mensaje.<br />A la brevedad nos pondremos en contacto.";



?>
