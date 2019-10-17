<?php

function cadastrar($codvenda, $codProduto,$quantidade){
    $comando= "call sp_cadastrar_itemvenda($codvenda, $codProduto,$quantidade)";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar item venda'. mysqli_error($cnx)); }
return 'Item Venda cadastrado com sucesso!';
}

function listarItens(){
    $comando= "call sp_listar_itemvendas";
    $result = mysqli_query(conn(), $comando);
    $itens = array();
    while($linha = mysqli_fetch_assoc($result)){
        $itens[] = $linha;
    }
    return $itens;
}

function delete_este($id, $cod){
    $comando= "sp_apagar_itemvenda($id,$cod)";
    $conexao= conn();
    $resultado= mysqli_query($conexao, $comando);
   
     if($resultado==true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

function listaritemporid($id){
    $comando= "call sp_pegar_itemvenda_por_id($id)";
    echo $comando;
    $result = mysqli_query(conn(), $comando);
    $itens = mysqli_fetch_assoc($result);
    
    return $itens;
}

