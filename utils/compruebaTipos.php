<?php

function esFloatPositivo($valor) {
    return is_numeric($valor) && $valor > 0;
}

function esEntero($valor) {
    return is_numeric($valor) && $valor == (int)$valor;
} 

function estaVacio($valor) {
    return empty(trim($valor));
}







?>