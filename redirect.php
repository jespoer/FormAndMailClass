<?php

require_once('form_to_mail.php');

class Redirect{

	private $session;

	function __construct(){
	
		if(isset($_POST['val_1'])){
			$this->session = new FormMail();
			$this->redirect_form_mail();
		}else{
			header('Location:main.php?err=1');
		}
	}
	
	private function redirect_form_mail(){
		if($this->session->send_mail()){
			header('Location:main.php?success=true');
		}else{
			header('Location:main.php?err=2');
		}
	
	}
	
	

}


?>