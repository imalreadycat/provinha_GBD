<?php
require_once 'modelo/clienteModelo.php';

function adicionar(){
    if(ehPost()){
        $rg = $_POST['rg'];
        $nome = $_POST['nome'];
        
        $msg = adc($rg, $nome);
        echo $msg;
        
    }else{
        exibir("cliente/adicionar");
    }
}

function listar(){
    $dados = array();
    $dados['clientes'] = liste();
    exibir("cliente/listar", $dados);
}

function deletar($id){
    delete($id);
    redirecionar("cliente/listar");
}

function editar($id){
    if(ehPost()){
        $rg = $_POST['rg'];
        $nome = $_POST['nome'];
        
        atualizar($id, $rg, $nome);
        
        redirecionar("cliente/listar");
    }else{
        $dados['cliente'] = liste_esse($id);
        exibir("cliente/editar", $dados);
    }
}


