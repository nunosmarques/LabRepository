<?php

class LabApp {
	
	public $conn;
 	protected $num_rows=40;
	protected $readonly=true;
	protected $debug=true;

    function __construct($local) {
		
		if($local == "others"){
			include_once "../config.php";
		}else{
			include_once "./config.php";
		}
		try {
			
			$this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e) {
			
			if($this->debug)
			print "Erro: " . $e->getMessage() ;
			
			die();
			
		}
     
    }



	function verifyParams($array_input, $array_required_fields) {
	
		$error_fields="";
		$error = false;
		$response=array("error"=>false, "message" => "");
	
		foreach ($required_fields as $field) {
			if (!isset($array_input[$field]) || strlen(trim($array_input[$field])) <= 0) {
				$error = true;
				$error_fields .= $field . ', ';
			}
		}
	 
		if ($error) {
			$response["error"] = true;
			$response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' are missing or empty';
		} 
		
		return $response;
		
	}

	function sendMail($area,$origem, $destino, $assunto, $menssagem){
		//Estrutura para enviar email de alerta
		//Para onde vai enviar
				$to        = $destino;
		
		//Assunto do email
				$subject   = $assunto;
		
		//A menssagem
				$message   = $menssagem;
		
		//Quem envia e para onde responder.
		$headers   = 'From: '.$area.'<'.$origem.'>' . "\r\n" .
					 'Reply-To:'.$origem.'"\r\n"'.
					 'X-Mailer: PHP/' . phpversion();
		
		if(mail($to, $subject, $message, $headers)){
		
		}
		
		
	}



	function __destruct() {
		
		$this->conn=null;
		
	}
 
}
 
?>