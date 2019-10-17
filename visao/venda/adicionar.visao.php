<h1>Insira os dados:</h1>
<form action="" method="POST">
    Cliente:<select name="cod_categoria">
        <option value=""></option>
         <?php foreach ($clientes as $cliente): ?>
            <option value="<?=$cliente["idCliente"]?>"><?=$cliente["nome"]?></option>
            <?php endforeach;?>
    </select><br><br>
     
 Data da Venda:  <input type="date" name="dataVenda"><br><br>

 <button type="submit">Adicionar</button>
</form>


