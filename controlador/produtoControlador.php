<?php
require_once 'modelo/produtoModelo.php';

function adicionar(){
    if(ehPost()){
        $descr = $_POST['descr'];
        $quant = $_POST['quant'];
        
        $msg = adc($descr, $quant);
        echo $msg;
        
    }else{
        exibir("produto/adicionar");
    }
}

function listar(){
    $dados = array();
    $dados['produtos'] = liste();
    exibir("produto/listar", $dados);
}

function deletar($id){
    delete($id);
    redirecionar("produto/listar");
}

function editar($id){
    if(ehPost()){
        $descr = $_POST['descr'];
        $quant = $_POST['quant'];
        
        atualizar($id, $descr, $quant);
        
        redirecionar("produto/listar");
    }else{
        $dados['produto'] = liste_esse($id);
        exibir("produto/editar", $dados);
    }
}

