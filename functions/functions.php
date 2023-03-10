<?php
/*******************************************************************************************
 *	Esse arquivo contém as principais funções desse sistema. Além das funções, também há a *
 *	inicialização das sessões															   *
 *******************************************************************************************/


//--------------------------Iniciando sessão--------------------------------
//verificando status da sessão (se ela já foi iniciada)
if(session_status() !== PHP_SESSION_ACTIVE){
	session_cache_expire(1440); //tempo de duração da sessão em minutos
	session_start();
}
//--------------------------/Iniciando sessão-------------------------------

	#Função que monta o script das flash mensagens
	function notify($mensagem, $tipo, $tempo = null, $icon = null) {
		/* Função para notificações
		$message = Mensagem a ser exibida
		$type = Tipo de notificação (success, info, warning, danger)
		$time = Tempo de exibição da notificação (milisegundos) */
		return '<script>notify("' . $mensagem . '", "' . $tipo . '", ' . $tempo . ', "' . $icon . '");</script>';
	}

	#Função que monta a estrutura das flash mensagens
	function flash($key, $mensagem, $tipo, $icon = 'info-circle', $tempo = 5000){
		//alerts: primary secondary success danger warning info light dark
		//Icons:  star collection check-circle exclamation-triangle exclamation-octagon info-circle folder
		if(!isset($_SESSION['flash'][$key])){
			$_SESSION['flash'][$key] = '<script>notify("' . $mensagem . '", "' . $tipo . '", ' . $tempo . ', "' . $icon . '");</script>';
		}
	}
	
	#Função pra exibir as flash mensagens
	function getFlash($key){
		if(isset($_SESSION['flash'][$key])){
			$mensagem = $_SESSION['flash'][$key];
			unset($_SESSION['flash'][$key]);
			if(isset($mensagem)){
				return $mensagem;
			} else {
				return '';
			}
		}
	}

	#Função pra contar registros
	function countRows($table){
		$link = dbConnect();
		$result = dbCount($table);
			if($result){
				return $result;
			} else {
				return "Erro ao contar registros.";
			}
		DBClose($link);
	}


//Funções Relacionadas ao Modulo de Login
	
	#novo usuario
	function newUser(array $usuario){
		$conn = dbConnect();
		$query = dbCreate("usuario", $usuario);
			if($query){
				return true;
			} else {
				return false;
			}
		dbClose($conn);
	}

	function dateImport($date){
		return implode('-', array_reverse(explode('/', $date)));
	}
	function dateExport($date){
		return implode('/', array_reverse(explode('-', $date)));
	}
	function mDebug($var){
		return print_r($var); 
	}
?>
