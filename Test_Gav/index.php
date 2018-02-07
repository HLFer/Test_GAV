<html>
<body>
	
	<form action="cadastrar_peca.php" method="POST">
		<h1>Cadastro de pecas de veiculos</h1>

		Nome: <input type="text" name="nome"/>
		Quantidade: <input type="number" name="quantidade">
		Descricao: <input type="text-area" name="descricao"/>
		Foto: <input type="file" name="foto"/>

		<button>Cadastrar</button>
	</form>

	<a href="remover_peca.php" target="_self">Clique aqui para Remover peca de veiculo</a>

</body>
</html>