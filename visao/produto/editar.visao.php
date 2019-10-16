<h1>Modifique os dados:</h1>
<form action="" method="POST">
 Descrição: <input type="text" name="descr" value="<?= $produto["descricao"] ?>"><br><br>
 Quantidade: <input type="number" name="quant" value="<?= $produto["quantidade"] ?>"><br><br>

 <button type="submit">Atualizar</button>
</form>
