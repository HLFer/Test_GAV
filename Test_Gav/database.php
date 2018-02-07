<?php
Class Database
{
	
	private $_host, $_database, $_user, $_password;

	function Database()
	{
		$this->_host = "localhost";
		$this->_database = "teste-henrique";
		$this->_user = "root";
		$this->_password = "";
	}

	//Funcao para inserir pecas no banco de dados
	public function insertPeca($nome, $quantidade, $foto, $descricao)
	{
		$query = "INSERT INTO pecas (id, nome, qtd, foto, descricao) VALUES (null, '{$nome}', '{$quantidade}', '{$foto}', '{$descricao}')";	
		$this->execute($query);
		echo "Peca inserida com sucesso!";
	}

	//Funcao para remover pecas do banco de dados
	public function removePeca($pecaVeiculo){
		//Busca para verificar se o elemento existe no banco
		$select = "SELECT * FROM pecas WHERE nome = '$pecaVeiculo'";
		if($select){
			//se o elemento existir, entao sera deletado
			$query = "DELETE FROM pecas WHERE (id, nome, qtd, foto, descricao) = '$select'";  

		}else{//Caso contrario a mensagem sera exibida e a funcao abortada
			die("Nao ha estoque desta peca!");
		}
		
		$this->execute($query);
		echo"Peca removida com sucesso!";
	}

	//Funcao para coletar o total de pecas do banco
	public function getTotalPecas()
	{
		$query = "SELECT qtd FROM pecas";	
		$stmt = $this->execute($query);
		return $stmt->rowCount();
	}
	
	//Funcao para conexao com o banco de dados
	private function _connect()
	{
		return new PDO("mysql:host={$this->_host};dbname={$this->_database}", $this->_user, $this->_password);
	}

	private function execute($query)
	{
		try 
		{
			$conn = $this->_connect();
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$conn = null;
			return $stmt;
		}
		catch (Exception $ex)
		{
			echo($ex->getMessage()); 
			exit();
		}
	}
}