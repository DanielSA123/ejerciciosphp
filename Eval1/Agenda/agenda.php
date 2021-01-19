<?php
session_start();
if(isset($_GET['accion']))
  $accion =$_GET['accion'];
else
  $accion='mostrar';


if (!isset($_SESSION['agenda'])) {
  $_SESSION['agenda']=    
                ['Madrid'=>[['Nombre'=>'Jose','Edad'=>32,'Tlfno'=>'919999999'],
                            ['Nombre'=>'Luis','Edad'=>28,'Tlfno'=>'918888888'],
                           ],
                'Barcelona'=>[0=>['Nombre'=>'Pepe','Edad'=>23,'Tlfno'=>'939999999'],
                           ],
                'Toledo'=>[],
        ];
}
  $agenda = $_SESSION['agenda'];
  if(isset($_GET['ciudad'])){
    unset($agenda[$_GET['ciudad']][$_GET['elemento']]);
    $_SESSION['agenda']=$agenda;
    $accion='mostrar';
  }
  
//var_dump($agenda);
if(isset($_POST['ok'])){
  $ciudad=$_POST['ciudad'];
  $datos=$_POST['datos'];
  //var_dump($datos);
  include 'amigo.inc';
  try {
    $objeto = new Amigo($ciudad, $datos);
    $agenda[$ciudad][]=$datos;
    $agenda[$objeto->getCiudad()][]=[$objeto->getNombre(),$objeto->getEdad(),$objeto->getTlfno()];
    $_SESSION['agenda']= $agenda;
  } catch (AmigoException $ex) {
    $errores = $ex->getErrores();
    //var_dump($errores);
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>
  <style>
    .error{
      color:red;
    }
    table{
      margin: auto;
    }
    th{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 1.2rem;
    }
    table, th, td{
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <header>
    <h1>Agenda telefónica de los amigos</h1>
    <nav>
      <a href="?accion=modificar">Agregar un amigo</a> | <a href="?accion=mostrar">Ver los amigos</a> | 
      <a href="?accion=eliminar">Quitar un amigo</a>
    </nav>
  </header>
  <?php if($accion=='mostrar'): ?>
    <table>
      <caption>Listado telefónico de amigos</caption>
      <?php foreach($agenda as $key=>$value): ?>
        <tr>
          <th colspan="3"><?=$key?></th>
        </tr>
        <?php if(isset($value[0])):
           $cabecera = array_keys($value[0]); ?>
          <tr>
            <?php foreach($cabecera as $val): ?>
              <th><?=$val?></th>
            <?php endforeach; ?>
          </tr>
        <?php foreach($value as $clave=>$valor):?>
         <tr>
         <?php foreach($valor as $va):?>
            <td><?=$va?></td>
        <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
         <?php endif; ?>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" 
      <?=$accion=='modificar'?'':'hidden'?>>
      <fieldset>
        <legend>Agregar un amigo a la agenda</legend>
        <label>Ciudad: 
          <select name="ciudad" >
            <?php if(!empty($ciudad)): ?>
              <option value="<?=$ciudad?>" selected><?=$ciudad?></option>
            <?php else: ?>
              <option value="">Selecciona una ciudad</option>
            <?php endif; ?>
            <?php foreach($agenda as $key=>$value):?>
              <option value="<?=$key?>"><?=$key?></option>
            <?php endforeach; ?>
          </select>
        </label><br>
        <label>Nombre: 
          <input type="text" name="datos[nombre]" value="<?=!empty($datos['nombre'])?$datos['nombre']:''?>">
        </label><?= (isset($errores['nombre']))?"<span class='error'> * {$errores['nombre']}</span>":''?>
        <br>
        <label>Edad: 
          <input type="text" name="datos[edad]" value="<?=!empty($datos['edad'])?$datos['edad']:''?>">
        </label><?= (isset($errores['edad']))?"<span class='error'> * {$errores['edad']}</span>":''?>
        <br>
        <label>Teléfono: 
          <input type="text" name="datos[tlfno]" value="<?=!empty($datos['tlfno'])?$datos['tlfno']:''?>">
        </label><?= (isset($errores['tlfno']))?"<span class='error'> * {$errores['tlfno']}</span>":''?>
        <br>
        <input type="submit" name="ok" value="Guardar">
      </fieldset>
    </form>
    <form action="" <?=$accion=='eliminar'?'':'hidden'?>>
      <fieldset>
        <legend>Eliminar amigo de la agenda</legend>
        <table>
      <caption>Listado telefónico de amigos</caption>
      <?php foreach($agenda as $key=>$value): ?>
        <tr>
          <th colspan="3"><?=$key?></th>
        </tr>
        <?php if(isset($value[0])):
           $cabecera = array_keys($value[0]); ?>
          <tr>
            <?php foreach($cabecera as $val): ?>
              <th><?=$val?></th>
            <?php endforeach; ?>

          </tr>
        <?php foreach($value as $clave=>$valor):?>
         <tr>
         <?php foreach($valor as $cla=> $va):?>
            <td><?=$va?></td>
        <?php endforeach; ?>
        <td><a href="?ciudad=<?=$key?>&elemento=<?=$clave?>">Borrar <?=$key.' ' .$clave?></a></td>
        </tr>
        <?php endforeach; ?>
         <?php endif; ?>
      <?php endforeach; ?>
    </table>
     </fieldset>
    </form>
  <?php endif; ?>
</body>
</html>