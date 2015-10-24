<?php


@$name          = addslashes($_POST['nombre']);
@$email         = addslashes($_POST['email']);

$contenido = "Has recibido un mail de: $name\n"
  ."su correo es: $email \n"
  ."Su situacion laboral es: $situacionlaboral\n";

@$situacionlaboral         = addslashes($_POST['situacionlaboral']);

if ($situacionlaboral == 'trabajo'){
  @$sectorlaboral         = addslashes($_POST['sectorlaboral']);
  $contenido = $contenido . "Su sector laboral es: $sectorlaboral\n";
}elseif ($situacionlaboral == 'estudio') {
  @$queestudia         = addslashes($_POST['queestudia']);
  $contenido = $contenido . "Estudia: $queestudia\n";
}elseif ($situacionlaboral == 'desempleo') {
  @$nivelestudios         = addslashes($_POST['nivelestudios']);
  $contenido = $contenido . "Su nivel de estudios es: $nivelestudios\n";
} else{
  die("Error: Su mensaje no pudo ser enviado, intente más tarde");
}


@$nivelconocimiento      = addslashes($_POST['nivelconocimiento']);
@$porqueinteresa      = addslashes($_POST['porqueinteresa']);

$contenido = $contenido . "Su conocimiento de SEO es: $nivelconocimiento y le interesa porque " . $porqueinteresa . "\n";

@$pais      = addslashes($_POST['pais']);
@$comoconocio      = addslashes($_POST['comoconocio']);

$contenido = $contenido . "Es de: $pais, y nos conocio gracias a: $comoconocio";

if ($comoconocio   == 'socialmedia') {
  @$tiporedsocial      = addslashes($_POST['tiporedsocial']);
  $contenido = $contenido . " especificamente en:" . $tiporedsocial ;
}

$curso = "Curso seo gratis"; //El Curso
$cabeceras = "From: $email\n" //El remitente

 . "Reply-To: $email\n"; //Dirección de respuesta

$asunto = "Formulario SEOschool - Curso Seo gratis"; //El asunto

$email_to = "ar.ibarrasalas@gmail.com"; //El email
// $email_to = "tucomalex@gmail.com"; //El email




//Envia el mensaje

if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

//Si el mensaje se envía muestra una confirmación

echo '<html>

<head>
<meta charset="UTF-8">
  <meta http-equiv="Refresh"

 content="0;url=http://www.seo.school/">

  <link href="http://www.seo.school/favicon.ico"

 rel="icon" type="image/x-icon">

</head>

<body>

<p style="text-align: center;"></p>

<p style="text-align: center;"><big

 style="font-weight: bold;"><big><big></big></big></big></p>

<p style="text-align: center;"><big

 style="font-weight: bold;"><big><big>Su mensaje

ha sido

enviado correctamente en breve nos pondremos en contacto con Ud.</big></big></big></p>

<div style="text-align: center;">

<p>Sera redireccionado a la

página principal en 1 segundos. En caso contrario puede regresar

haciendo <a href="http://www.seo.school/">click

aquí</a></p>

</div>

</body>

</html>

';

}else{

//Si el mensaje no se envía muestra el mensaje de error

die("Error: Su mensaje no pudo ser enviado, intente más tarde");

}

?>
