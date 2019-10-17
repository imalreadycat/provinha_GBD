<h1>Edite:</h1>
<form action="" method="POST">
    Venda:<select name="codvenda">
        <option value=""></option>
         <?php foreach ($vendas as $venda): ?>
            <option value="<?= $item["codvenda"] ?>"><?=$venda["codvenda"]?></option>
            <?php endforeach;?>
    </select><br><br>
    
    Produto:<select name="codProduto">
        <option value=""></option>
         <?php foreach ($produtos as $produto): ?>
            <option value="<?=$item["codProduto"]?>"><?=$produto["descricao"]?></option>
            <?php endforeach;?>
    </select><br><br>
     
 Quantidade:  <input type="number" name="quantidade" value="<?=$item["quantidade"]?>"><br><br>

 <button type="submit">Adicionar</button>
</form>


