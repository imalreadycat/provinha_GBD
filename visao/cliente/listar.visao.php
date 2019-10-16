<h2> Clientes cadastrados: </h2>
    
    <table>
        <tr>
            <th>Nome</th>
            <th>RG</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <?php foreach ($clientes as $cliente):?>
        <tr>  
            <td><?=$cliente['nome']?></td>
            <td><?=$cliente['rg']?></td>
            <td><a href="./cliente/deletar/<?=$cliente['idCliente']?>">Deletar</a></td>
            <td><a href="./cliente/editar/<?=$cliente['idCliente']?>">Editar</a></td>
        </tr>

        <?php endforeach;?>
    </table>