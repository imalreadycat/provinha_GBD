<h2> Itens de vendas realizadas: </h2>
    
    <table>
        <tr>
            <th>Cód. Venda</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <?php foreach ($itens as $item):?>
        <tr>  
            <td><?=$item["codvenda"]?></td>
            <td><?=$item["codProduto"]?></td>
            <td><?=$item["quantidade"]?></td>
            <td><a href="./itemvenda/deletar/<?=$item["codvenda"]?><?=$item["codProduto"]?>">Deletar</a></td>
            <td><a href="./itemvenda/editar/<?=$item["codProduto"]?>">Editar</a></td>
        </tr>

        <?php endforeach;?>
    </table>