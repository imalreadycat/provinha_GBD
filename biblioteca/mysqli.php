<?php

function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "BCKbasedados");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}