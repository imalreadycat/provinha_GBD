<?php

function cadastrar($codvenda, $codProduto,$quantidade){
    $comando= "call sp_cadastrar_itemvenda($codvenda, $codProduto,$quantidade)";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar item venda'. mysqli_error($cnx)); }
return 'Item Venda cadastrado com sucesso!';
}

