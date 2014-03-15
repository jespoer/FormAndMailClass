<?php

/* --FORMMAIL -- Class used to gather data from forms and send in mail.
 *
 * @Author : jespoer
 * @Version : 1.0
 * @Date : 2014-03-10
 */

class Form_Mail{
	
	function __construct(){
	
	}
	
	/* -- SEND_MAIL -- */
	public function send_mail($first_name, $last_name, $address, $area, $phone, $email, $square_meter, $type){
	    
	    $mail_to = 'mail@example';
	    $subject = 'Here goes my subject';
		
		/* check if email is valid */
		if($this->validate_email($email) == false){
			return 0;
		}
		
		$first_name = preg_replace("/[^a-zA-ZåäöÅÄÖ\-]/", "", $first_name);
		$last_name = preg_replace("/[^a-zA-ZåäöÅÄÖ\-]/","", $last_name);
		$address = preg_replace("/[^a-zA-ZåäöÅÄÖ0-9\.]/","", $address);
		$area = preg_replace("/[^a-zA-ZåäöÅÄÖ0-9\-]/","", $area);
		$phone = preg_replace("/[^0-9\-\.\,]/","", $phone);
		$square_meter = preg_replace("/[^a-zA-ZåäöÅÄÖ0-9\.\,\-]/","", $square_meter);
		$type = preg_replace("/[^a-zA-ZåäöÅÄÖ\.\-\,]/", "", $type);
		
		/* append input to a message */
		$msg = "<html><body>Hi here are the info you entered : ".$first_name." ".$last_name."<br>
				<b>Type : </b>".$type."<br>
				<b>square meter : </b>".$square_meter."<br>
				<b>Address : </b>".$address."<br>
				<b>Area : </b>".$area."<br>
				<b>Phone : </b>".$phone."<br>
				<b>Email : </b>".$email."</body></html>";
		
		/* additional headers. Needed, see php manual for more info */
		$headers = "From : my@example.exa \n";
		$headers .= "X-Mailer: PHP/".phpversion()."\n";
		$headers .= "MIME-version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";
		
		$result = mail($mail_to, $subject, $msg, $headers);
		
		/* check result */
		if($result == true){
		
			/* return success */
			return 1;
		}else{
		
			/* return failure */
			return 0;
		}
	}
	
	/* -- VALIDATE_EMAIL*/
	private function validate_email($email){
		
		/* if email is valid, retur true */
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return false;
		}else{
			return true;
		}
	}
}

?>