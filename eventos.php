<?php require "config.php";
require("classes/calendar.class.php");

$eventos = new calendario();
$eventos -> listado($db_connect);