<?php

require_once('form_to_mail.php');

class Redirect{

	private $session;

	function __construct(){
	
		/* user has entered a offer form, redirect that direction */
		if(isset($_POST['offer_form'])){
			$this->session = new Form_Mail();
			$this->redirect_form_mail();
		}else{
			header('Location:main.php?err=1');
		}
	}
	
	/* -- REDIRECT_FORM_MAIL -- */
	private function redirect_form_mail(){
		if(isset($_POST['name']) && $_POST['name'] != "" &&
			isset($_POST['surname']) && $_POST['surname'] != "" &&
			isset($_POST['address']) && $_POST['address'] != "" &&
			isset($_POST['email']) && $_POST['email'] != "" &&
			isset($_POST['email_repeat']) && $_POST['email_repeat'] != "" &&
			isset($_POST['type']) && $_POST['type'] != "" &&
			isset($_POST['square_meter']) && $_POST['square_meter'] != "" &&
			isset($_POST['area']) && $_POST['area'] != "" &&
			isset($_POST['phone']) && $_POST['phone'] != "" &&
			$_POST['email'] == $_POST['email_repeat']){
		
			if($this->session->send_mail($_POST['name'], $_POST['surname'], $_POST['address'], $_POST['area'], $_POST['phone'], $_POST['email'], $_POST['square_meter'], $_POST['type']) == 1){
				header('Location:main.php?success=true');
			}else{
				header('Location:main.php?err=3'); 
			}
		}else{
			header('Location:main.php?err=2');
		}
	
	}
}

$re = new Redirect;


?>