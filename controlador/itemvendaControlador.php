<?php
require_once 'modelo/itemvendaModelo.php';
require_once 'modelo/vendaModelo.php';
require_once 'modelo/produtoModelo.php';

function adicionar(){
    if(ehPost()){
        $codvenda = $_POST['codvenda'];
        $codProduto = $_POST['codProduto'];
        $quantidade = $_POST['quantidade'];
        
        
        $msg = cadastrar($codvenda, $codProduto,$quantidade);
        echo $msg;
        
    }else{
        $dados['vendas'] = listarVendas();
        $dados['produtos'] = liste();
        exibir("itemvenda/adicionar", $dados);
    }
}

function listar(){
    $dados = array();
    $dados['vendas'] = listarItens();
    exibir("venda/listar", $dados);
}

