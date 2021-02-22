<?php
$cliente=new SoapClient(null, ['location'=>'http://biblioteca.edu/servicioWeb/servicio.php',
                               'uri'=>'urn:Biblioteca.edu/servicioWeb/servicio.php',
                               'trace'=>1]);
try
{ $libro =$cliente->getLibro();
}catch (Exception $ex)
{ echo($cliente->__getLastResponse());
  echo PHP_EOL;
  echo($cliente->__getLastRequest());
}
?>
<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Libro del mes</title>
  </head>
  <body>
    <p>
<?php
if(!empty($libro))
{ foreach ($libro as $key => $value): ?>
    <?= $key . " " . $value ?><br>
  <?php endforeach;
}else {
  echo "No hay ningún libro con ese identificador";
} ?>
  </body>
</html>
