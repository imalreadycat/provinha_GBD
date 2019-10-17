<h2> Vendas Realizadas: </h2>
    
    <table>
        <tr>
            <th>Cliente</th>
            <th>Data Da Venda</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <?php foreach ($vendas as $venda):?>
        <tr>  
            <td><?=$venda['idCliente']?></td>
            <td><?=$venda['dataVenda']?></td>
            <td><a href="./venda/deletar/<?=$venda['codvenda']?>">Deletar</a></td>
            <td><a href="./venda/editar/<?=$venda['codvenda']?>">Editar</a></td>
        </tr>

        <?php endforeach;?>
    </table>