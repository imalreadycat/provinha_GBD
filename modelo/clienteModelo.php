<?php

function adc($rg, $nome){
    $comando= "call sp_cadastra_cliente($rg,'$nome')";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar cliente'. mysqli_error($cnx)); }
return 'Cliente cadastrado com sucesso!';
}

function liste(){
    $comando= "call sp_listar_clientes";
    $result = mysqli_query(conn(), $comando);
    $clientes = array();
    while($linha = mysqli_fetch_assoc($result)){
        $clientes[] = $linha;
    }
    return $clientes;
}

function delete($id){
    $comando= "call sp_deleta_cliente_por_id($id)";
    $conexao= conn();
    $resultado= mysqli_query($conexao, $comando);
   
     if($resultado==true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

function liste_esse($id){
    $comando= "call sp_listar_cliente_por_id($id)";
    $result = mysqli_query(conn(), $comando);
    $clientes = mysqli_fetch_assoc($result);
    
    return $clientes;
}

function atualizar($id, $rg, $nome){
    $comando= "call sp_atualizar_dados_do_cliente($id, $rg, '$nome')";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao atualizar os dados do cliente'. mysqli_error($cnx)); }
    return 'Dados atualizados com sucesso!';
}