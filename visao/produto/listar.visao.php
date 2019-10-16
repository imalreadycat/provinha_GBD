<h2> Produtos cadastrados: </h2>
    
    <table>
        <tr>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <?php foreach ($produtos as $produto):?>
        <tr>  
            <td><?=$produto["descricao"]?></td>
            <td><?=$produto["quantidade"]?></td>
            <td><a href="./produto/deletar/<?=$produto["codProduto"]?>">Deletar</a></td>
            <td><a href="./produto/editar/<?=$produto["codProduto"]?>">Editar</a></td>
        </tr>

        <?php endforeach;?>
    </table>