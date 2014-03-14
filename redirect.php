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
		if(isset($_POST['email']) && isset($_POST['email_repeat']) && isset($_POST['name']) && isset($_POST['surname']) && $_POST['email'] == $_POST['email_repeat']){
		
			if($this->session->send_mail($_POST['name'], $_POST['surname'], $_POST['address'], $_POST['area'], $_POST['phone'], $_POST['mail'], $_POST['square_meter'], $_POST['type']) == 1){
				header('Location:main.php?success=true');
			}else{
				header('Location:main.php?err=3'); 
			}
		}else{
			header('Location:main.php?err=2');
		}
	
	}
	
	

}


?>