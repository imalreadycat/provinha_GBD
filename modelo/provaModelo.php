<?php

function adicionartransacao($descr, $val, $ce, $ae){
    $comando = "insert into transacao values ('$descr', '$val', '$ce', '$ae')";
    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar a transação'. mysqli_error($cnx)); }
    return 'Transação cadastrada com sucesso!';
}


