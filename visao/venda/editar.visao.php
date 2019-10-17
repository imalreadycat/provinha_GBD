<h1>Modifique os dados:</h1>
<form action="" method="POST">
 Cliente:<select name="idCliente">
        <option value=""></option>
         <?php foreach ($clientes as $cliente): ?>
            <option value="<?=$cliente["idCliente"]?>"><?=$cliente["nome"]?></option>
            <?php endforeach;?>
    </select><br><br>
 Data da Venda:  <input type="date" name="dataVenda" value="<?= $venda["dataVenda"] ?>"><br><br>

 <button type="submit">Atualizar</button>
</form>






