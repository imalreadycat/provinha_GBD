<?php

function adici($idCliente, $dataVenda){
    $comando= "call sp_cadastrar_venda($idCliente, '$dataVenda')";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar venda'. mysqli_error($cnx)); }
return 'Venda cadastrado com sucesso!';
}

function listarVendas(){
    $comando= "call sp_listar_vendas";
    $result = mysqli_query(conn(), $comando);
    $vendas = array();
    while($linha = mysqli_fetch_assoc($result)){
        $vendas[] = $linha;
    }
    return $vendas;
}

function deletarVenda($id){
    $comando= "call sp_deleta_venda_por_id($id)";
    $conexao= conn();
    $resultado= mysqli_query($conexao, $comando);
   
     if($resultado==true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

function liste_essa($id){
    $comando= "call sp_listar_venda_por_id($id)";
    $result = mysqli_query(conn(), $comando);
    $vendas = mysqli_fetch_assoc($result);
    
    return $vendas;
}

function atualiza($codvenda,$idCliente, $dataVenda){
    $comando= "call sp_atualizar_dados_da_venda($codvenda,$idCliente, '$dataVenda')";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao atualizar os dados da Venda'. mysqli_error($cnx)); }
    return 'Dados atualizados com sucesso!';
}