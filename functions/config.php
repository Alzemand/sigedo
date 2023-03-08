<?php

/* Constantes de Configuração do Banco */
	//servidor
	define('DB_HOSTNAME', 'localhost');
	//usuário
	define('DB_USERNAME', 'root');
	//senha
	define('DB_PASSWORD', 'toor');
	//Banco
	define('DB_NAME', 'sigedo');
	//codificação
	define('DB_CHARSET', 'utf8');
	//prefixo
	#define('DB_PREFIX', 'e1');

/* Timezone */
	date_default_timezone_set("BRAZIL/EAST");

/* Constantes de Configuração do Site */

//Caso a pasta esteja na raiz do servidor
	//define('RAIZ', '/sigedo/');
	define('RAIZ', '');
	define('TITLE', 'Sigedo');
?>