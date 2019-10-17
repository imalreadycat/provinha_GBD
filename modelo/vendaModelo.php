<?php

function adici($idCliente, $nome){
    $comando= "call sp_cadastrar_venda($idCliente, '$nome')";

    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar venda'. mysqli_error($cnx)); }
return 'Venda cadastrado com sucesso!';
}

