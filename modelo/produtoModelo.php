<?php

function adc($descr, $quant){
    $comando= "call sp_cadastra_produto('$descr', $quant)";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar o produto'. mysqli_error($cnx)); }
return 'Produto cadastrado com sucesso!';
}

function liste(){
    $comando= "call sp_listar_produtos";
    $result = mysqli_query(conn(), $comando);
    $produtos = array();
    while($linha = mysqli_fetch_assoc($result)){
        $produtos[] = $linha;
    }
    return $produtos;
}

function delete($id){
    $comando= "call sp_deleta_produto_por_id($id)";
    $conexao= conn();
    $resultado= mysqli_query($conexao, $comando);
   
     if($resultado==true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

function liste_esse($id){
    $comando= "call sp_listar_produto_por_id($id)";
    $result = mysqli_query(conn(), $comando);
    $produtos = mysqli_fetch_assoc($result);
    
    return $produtos;
}

function atualizar($id, $descr, $quant){
    $comando= "call sp_atualizar_dados_do_produto($id, '$descr', $quant)";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao atualizar os dados do produto!'. mysqli_error($cnx)); }
    return 'Dados atualizados com sucesso!';
}

