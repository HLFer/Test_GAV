<?php

include "database.php";

$db = new database();

$pecaVeiculo = $_POST['nome'];

$db->removePeca($pecaVeiculo);

?>