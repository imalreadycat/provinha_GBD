<?php

function adicionarCategoria($Nome){
    $comando= "INSERT INTO categoria(Nome) Values ('$Nome')";
    $resultado= mysqli_query($cnx=conn(), $comando);
    if (!$resultado){die ('Erro ao cadastrar a categoria'. mysqli_error($cnx)); }
return 'Categoria cadastrada com sucesso!';

}

function seleciona_todas_as_categorias(){
    $sql = "select * from categoria";
    $result = mysqli_query(conn(), $sql);
    $categorias = array();
    while($linha = mysqli_fetch_assoc($result)){
        $categorias[] = $linha;
    }
    return $categorias;
}

function MostrarCategoriaPorCodigo($cod){
    $sql = "select * from categoria where cod_categoria = '$cod'";
    $result = mysqli_query(conn(), $sql);
    $categorias = mysqli_fetch_assoc($result);
    
    return $categorias;
}

function deletarCategoria($cod) {
     $comando= "DELETE FROM categoria WHERE cod_categoria=$cod";
     $conexao= conn();
     $resultado= mysqli_query($conexao, $comando);
   
     if($resultado==true){
       echo "Deu certo!";
   }else {
       echo "Deu errado";
   }
}

