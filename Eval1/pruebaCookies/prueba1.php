<?php
$value = "algo";
setcookie("PuebaCookie", $value, time());

echo $_COOKIE["PuebaCookie"];