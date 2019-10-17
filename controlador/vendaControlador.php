<?php

require_once("modelo/clienteModelo.php");
require_once("modelo/vendaModelo.php");

function adicionar(){
    if(ehPost()){
        $idCliente = $_POST['idCliente'];
        $nome = $_POST['nome'];
        
        $msg = adici($idCliente, $nome);
        echo $msg;
        
    }else{
        $dados['clientes'] = liste();
        exibir("venda/adicionar", $dados);
    }
}

