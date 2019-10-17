<h1>Insira os dados:</h1>
<form action="" method="POST">
    Venda:<select name="codvenda">
        <option value=""></option>
         <?php foreach ($vendas as $venda): ?>
            <option value="<?= $venda["codvenda"] ?>"><?=$venda["codvenda"]?></option>
            <?php endforeach;?>
    </select><br><br>
    
    Produto:<select name="codProduto">
        <option value=""></option>
         <?php foreach ($produtos as $produto): ?>
            <option value="<?=$produto["codProduto"]?>"><?=$produto["descricao"]?></option>
            <?php endforeach;?>
    </select><br><br>
     
 Quantidade:  <input type="number" name="quantidade"><br><br>

 <button type="submit">Adicionar</button>
</form>


