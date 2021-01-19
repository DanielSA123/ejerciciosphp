<?php


$provincias = [
    "01" => "Álava",
    "02" => "Albacete",
    "03" => "Alicante",
    "04" => "Almería",
    "05" => "Ávila",
    "06" => "Badajoz",
    "07" => "Illes Balears",
    "08" => "Barcelona",
    "09" => "Burgos",
    "10" => "Cáceres",
    "11" => "Cádiz",
    "12" => "Castellón",
    "13" => "Ciudad Real",
    "14" => "Córdoba",
    "15" => "A Coruña",
    "16" => "Cuenca",
    "17" => "Girona",
    "18" => "Granada",
    "19" => "Guadalajara",
    "20" => "Gipuzkoa",
    "21" => "Huelva",
    "22" => "Huesca",
    "23" => "Jaén",
    "24" => "León",
    "25" => "Lleida",
    "26" => "La Rioja",
    "27" => "Lugo",
    "28" => "Madrid",
    "29" => "Málaga",
    "30" => "Murcia",
    "31" => "Navarra",
    "32" => "Ourense",
    "33" => "Asturias",
    "34" => "Palencia",
    "35" => "Las Palmas",
    "36" => "Pontevedra",
    "37" => "Salamanca",
    "38" => "Santa Cruz de Tenerife",
    "39" => "Cantabria",
    "40" => "Segovia",
    "41" => "Sevilla",
    "42" => "Soria",
    "43" => "Tarragona",
    "44" => "Teruel",
    "45" => "Toledo",
    "46" => "Valencia",
    "47" => "Valladolid",
    "48" => "Bizkaia",
    "49" => "Zamora",
    "50" => "Zaragoza",
    "51" => "Ceuta",
    "52" => "Melilla",
];

$agenda =  [
    'Madrid' => [
        ['Nombre' => 'Jose', 'Edad' => 32, 'Tlfno' => '919999999'],
        ['Nombre' => 'Luis', 'Edad' => 28, 'Tlfno' => '918888888'],
        ['Nombre' => 'Miguel', 'Edad' => 28, 'Tlfno' => '917777777'],
    ],
    'Barcelona' => [
        0 => ['Nombre' => 'Pepe', 'Edad' => 23, 'Tlfno' => '939999999'],
        ['Nombre' => 'Angel', 'Edad' => 28, 'Tlfno' => '938888888'],
    ],
    'Toledo' => [
        ['Nombre' => 'Arancha', 'Edad' => 28, 'Tlfno' => '948888888'],
        ['Nombre' => 'Maria Luisa', 'Edad' => 33, 'Tlfno' => '948723456'],
    ],
];

$creaProvincia = "CREATE TABLE provincia
(codProvincia NCHAR(2) NOT NULL,
nombre NVARCHAR(22) NOT NULL,
CONSTRAINT PkProvincia
    PRIMARY KEY (codProvincia),);";

$pueblaProvincia = "INSERT INTO provincia (codProvincia, nombre)
                    VALUES (:cod, :nombre)";

$creaAgenda = "CREATE TABLE agenda(
    idAgenda INT IDENTITY NOT NULL,
    nombre NVARCHAR(50) NOT NULL,
    edad TINYINT NOT NULL,
    telefono NCHAR(9) NOT NULL,
    codProvincia NCHAR(2) NOT NULL,
    CONSTRAINT pKagenda
        PRIMARY KEY (idAgenda),
    CONSTRAINT FkProvinciAgenda
        FOREIGN KEY (codProvincia)
        REFERENCES provincia (codProvincia),
)";

$pueblaAgenda = "INSERT INTO  agenda(nombre, edad, telefono, codProvincia)
                SELECT :nombre, :edad, :telefono, p.codProvincia
                FROM  provincia p
                WHERE :provincia = p.nombre
                ";

$select = "SELECT a.Nombre as Amigo, Edad, Telefono, p.Nombre
FROM  agenda a
INNER JOIN provincia p on p.codProvincia = a.codProvincia";

$dfn = "sqlsrv:server=(local);Database=Agenda";
$con = null;
$stm = null;
try {
    $con = new PDO($dfn);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $con->exec($creaProvincia);
    // $con->exec($creaAgenda);
    // $con->beginTransaction();
    // $stm = $con->prepare($pueblaProvincia);
    // $stm->bindParam(":cod", $cod);
    // $stm->bindParam(":nombre", $nombre);
    // foreach ($provincias as $cod => $nombre) {
    //     $stm->execute();
    // }
    // $stm = $con->prepare($pueblaAgenda);
    // $stm->bindParam(":nombre", $amigo);
    // $stm->bindParam(":edad", $edad);
    // $stm->bindParam(":telefono", $telefono);
    // $stm->bindParam(":provincia", $provincia);
    // foreach ($agenda as $key => $value) {
    //     $provincia = $key;
    //     if (is_array($value)) {
    //         foreach ($value as $clave => $valor) {
    //             $amigo = $valor["Nombre"];
    //             $edad = $valor["Edad"];
    //             $telefono = $valor["Tlfno"];
    //             $stm->execute();
    //         }
    //     }
    // }
    // $con->commit();
    $stm = $con->prepare($select);
    $stm->execute();
    if ($amigos = $stm->fetch(PDO::FETCH_ASSOC)) :

    endif;

    var_dump($provs);
} catch (PDOException $ex) {
    die(print_r($ex->getMessage()));
    $con->rollBack();
} finally {
    $stm = null;
    $con = null;
}
