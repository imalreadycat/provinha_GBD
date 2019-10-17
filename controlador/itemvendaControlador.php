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
    $dados['itens'] = listarItens();
    exibir("itemvenda/listar", $dados);
}

function deletar($id, $cod){
    delete_este($id,$cod);
    redirecionar("itemvenda/listar");
}

function editar($id){
    if(ehPost()){
        $codvenda = $_POST['codvenda'];
        $codProduto = $_POST['codProduto'];
        $quantidade = $_POST['quantidade'];
        
        
        modificar($codvenda, $codProduto,$quantidade);
        
        redirecionar("itemvenda/listar");
        
    }else{
        $dados['item'] = listaritemporid($id);
        $dados['vendas'] = listarVendas();
        $dados['produtos'] = liste();
        exibir("itemvenda/editar", $dados);
    }
}

