<?php

/*******************************************************************************
 *	Esse arquivo contém as funções genéricas pra manipulação do banco de dados.*
 *******************************************************************************/

	#função para proteger contra SQL Injections
	function dbEscape($data){
		$conn = dbConnect();
			if(!is_array($data)){
				$data = mysqli_real_escape_string($conn, $data);
			} else {
				$arr = $data;
					foreach ($arr as $key => $value) {
						$key = mysqli_real_escape_string($conn, $key);
						$value = mysqli_real_escape_string($conn, $value);
						$data[$key] = $value;
					}
			}
		dbClose($conn);
		return $data;
	}

	#Função para executar querys no banco
	function dbExecute($query) {
		$conn = dbConnect();
		try {
			$result = mysqli_query($conn, $query);
			if (!$result) {
				throw new Exception(mysqli_error($conn), mysqli_errno($conn));
			}
		} catch (Exception $e) {
			//printf("Erro ao tentar executar a query: (%d) %s", $e->getCode(), $e->getMessage());
			$result = false;
		}
		dbClose($conn);
		return array($result, $e->getCode(), $e->getMessage());
	}
	
	#deletar registros
	function dbDelete($table, $where){
		$link = dbConnect();
		$where = ($where) ? "WHERE {$where}" : null;
		$query = "DELETE FROM {$table} {$where}";
		return DBExecute($query);
		DBClose($link);
	}
	#Altera registro
	function dbUpdate($table, array $data, $where = null){
		$link = dbConnect();
		$where = ($where) ? "WHERE {$where}" : null;
		$data = dbEscape($data); //protegendo contra SQL Injection
			foreach ($data as $key => $value) {
				$fields[] = "{$key} = '{$value}'";
			}
		$fields = implode(', ', $fields);

		$query = "UPDATE {$table} SET {$fields} {$where}";
		return DBExecute($query);
		DBClose($link);
	}
	#Função para inserir dados no banco
	function dbCreate($table, array $data){
		$conn = dbConnect(); //abrindo conexão
		$data = dbEscape($data); //protegendo query contra sql injection
		$fields = implode(', ', array_keys($data)); //quebrando as chaves do array com vírgulas
		$values = "'".implode("', '", $data)."'"; //quebrando os valores do array com vírgulas
		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})"; //montando a query
		return dbExecute($query); //executando a query
		dbClose($conn); //fechando conexão
	}
	#Função para ler registros do banco
	function dbRead($table, $params = null, $fields = "*"){
		$conn = dbConnect(); //abrindo conexão
		$query = "SELECT {$fields} FROM {$table} {$params}";
		$result = dbExecute($query);
			if(!mysqli_num_rows($result[0])){
				return false;
			} else {
				while ($res = mysqli_fetch_assoc($result[0])) {
					$data[] = $res;
				}
			}
		dbClose($conn); //fechando conexão
		return $data;
	}
	
	#conta a quantidade de registros na tabela
	function dbCount($table, $params = null){
		$conn = dbConnect(); //abrindo conexão
		//$table = DB_PREFIX."_".$table; //add prefixo na tabela
		$query = "SELECT * FROM {$table} {$params}";
		$result = dbExecute($query);
		$count = mysqli_num_rows($result[0]);
			if($count <1){
				$count = 0;
			}
		dbClose($conn);
		return $count;
	}

?>