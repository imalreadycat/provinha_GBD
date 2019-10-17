<?php

require_once("modelo/clienteModelo.php");
require_once("modelo/vendaModelo.php");

function adicionar(){
    if(ehPost()){
        $idCliente = $_POST['idCliente'];
        $dataVenda = $_POST['dataVenda'];
        
        $msg = adici($idCliente, $dataVenda);
        echo $msg;
        
    }else{
        $dados['clientes'] = liste();
        exibir("venda/adicionar", $dados);
    }
}

function listar(){
    $dados = array();
    $dados['vendas'] = listarVendas();
    exibir("venda/listar", $dados);
}

function deletar($id){
    deletarVenda($id);
    redirecionar("venda/listar");
}

function editar($id){
    if(ehPost()){
       $idCliente = $_POST['idCliente'];
        $dataVenda = $_POST['dataVenda'];
        
        
        atualiza($id,$idCliente, $dataVenda);
        
        redirecionar("venda/listar");
    }else{
        $dados['venda'] = liste_essa($id);
        $dados['clientes'] = liste();
        exibir("venda/editar", $dados);
    }
}

 