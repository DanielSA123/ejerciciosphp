<?php
if (!session_id()) {
    session_start();
}

if (isset($_POST["add"])) {
    $_SESSION["nPizzas"] += 1;
    if ($_SESSION["nPizzas"] > 4) {
        $_SESSION["nPizzas"] = 4;
    }
} elseif (isset($_POST["less"])) {
    $_SESSION["nPizzas"] -= 1;
    if ($_SESSION["nPizzas"] < 1) {
        $_SESSION["nPizzas"] = 1;
    }
} elseif (isset($_POST["cuantasPizzas"])) {
    $_SESSION["nPizzas"] = $_POST["cuantasPizzas"];
} else {
    $_SESSION["nPizzas"] = 1;
}
?>
<div class="wrapper">
    <form id="pizzaForm" method="post" action="<?=htmlspecialchars("index.php")?>">
        <fieldset>
            <legend>Rellene sus datos personales</legend>
            <p>Nombre: <input type="text" name="nombre" placeholder=" Nombre..."
                    value="<?=isset($_POST["nombre"]) ? $_POST["nombre"] : ''?>"
                    title="Mínimo 3 carácteres y máximo 20." autofocus> *</p>
            <p>Dirección: <input type="text" name="direccion" placeholder=" Dirección..."
                    value="<?=isset($_POST["direccion"]) ? $_POST["direccion"] : ''?>"> *</p>
            <p>Teléfono: <input type="tel" name="telefono" placeholder=" Teléfono..."
                    value="<?=isset($_POST["telefono"]) ? $_POST["telefono"] : ''?>" title="Debe empezar por 6|7|9."> *
            </p>
            <p>E-mail: <input type="email" name="email" placeholder=" E-mail..."
                    value="<?=isset($_POST["email"]) ? $_POST["email"] : ''?>" title="Debe ser un e-mail válido."> *
            </p>
            <p>Los campos marcados con * son obligatorios.</p>
        </fieldset>
        <button type="submit" id="add" name="add">Añadir pizza</button>
        <button type="submit" id="less" name="less">Quitar pizza</button>
        <br>
        <fieldset>
            <legend>Rellene los datos sobre las pizzas</legend>
            <?php
for ($i = 1; $i <= $_SESSION["nPizzas"]; $i++):
?>
            <fieldset class="<?="pizza$i"?>">
                <legend><?="Pizza $i"?></legend>
                <p>Tipo:
                    <select name="<?="pizza$i"?>[tipo]">
                        <?=isset($_POST["pizza" . $i]["tipo"]) ? '<option value="' . $_POST["pizza" . $i]["tipo"] . '" selected>' . $_POST["pizza" . $i]["tipo"] . '</option>' : '';?>
                        <option value="Barbacoa">Barbacoa</option>
                        <option value="Margarita">Margarita</option>
                        <option value="4 Estaciones">4 Estaciones</option>
                        <option value="4 Quesos">4 Quesos</option>
                        <option value="Carbonara">Carbonara</option>
                        <option value="Mediterranea">Mediterranea</option>
                        <option value="Romana">Romana</option>
                    </select>
                </p>
                <p>Tamaño:
                    <select name="<?="pizza$i"?>[tamanio]">
                        <?=isset($_POST["pizza" . $i]["tamanio"]) ? '<option value="' . $_POST["pizza" . $i]["tamanio"] . '" selected>' . $_POST["pizza" . $i]["tamanio"] . '</option>' : '';?>
                        <option value="Normal">Normal</option>
                        <option value="Grande">Grande</option>
                        <option value="Familiar">Familiar</option>
                    </select>
                </p>
                <p>Masa:
                    <input name="<?="pizza$i"?>[masa]" type="radio" value="normal"
                        <?=(isset($_POST["pizza" . $i]["masa"]) && $_POST["pizza" . $i]["masa"] == "normal") ? "checked" : "";?>>Normal</input>
                    <input name="<?="pizza$i"?>[masa]" type="radio" value="fina"
                        <?=(isset($_POST["pizza" . $i]["masa"]) && $_POST["pizza" . $i]["masa"] == "fina") ? "checked" : "";?>>Fina</input>
                </p>
                <p>Extras: <br>
                    <input name="<?="pizza$i"?>[queso]" type="checkbox" value="queso"
                        <?=(isset($_POST["pizza" . $i]["queso"])) ? "checked" : "";?>>Queso</input>
                    <input name="<?="pizza$i"?>[pimiento]" type="checkbox" value="pimiento"
                        <?=(isset($_POST["pizza" . $i]["pimiento"])) ? "checked" : "";?>>Pimiento</input>
                    <input name="<?="pizza$i"?>[cebolla]" type="checkbox" value="cebolla"
                        <?=(isset($_POST["pizza" . $i]["cebolla"])) ? "checked" : "";?>>Cebolla</input>
                    <input name="<?="pizza$i"?>[jamon]" type="checkbox" value="jamon"
                        <?=(isset($_POST["pizza" . $i]["jamon"])) ? "checked" : "";?>>Jamon</input>
                    <input name="<?="pizza$i"?>[pollo]" type="checkbox" value="pollo"
                        <?=(isset($_POST["pizza" . $i]["pollo"])) ? "checked" : "";?>>Pollo</input>
                </p>
                <p>Unidades:
                    <input type="number" name="<?="pizza$i"?>[cantidad]" min="1"
                        value=<?=isset($_POST["pizza" . $i]["cantidad"]) ? $_POST["pizza" . $i]["cantidad"] : 1;?>></input>

                </p>
            </fieldset>
            <br>
            <?php
endfor;
?>
        </fieldset>
        <input type="hidden" name="cuantasPizzas" value=<?=$_SESSION["nPizzas"]?>>
        <button type="submit" id="ok" name="ok">Continuar</button>
    </form>
</div>