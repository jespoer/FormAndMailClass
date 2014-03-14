<?php

class FormMail{
	
	function __construct(){
	
	}
	
	public function send_mail($first_name, $last_name, $address, $area, $phone, $email, $square_meter, $type){
		
		/* append input to a message */
		$msg = "Ni har fått en ny offertförfrågan av : <b>"$first_name." ".$last_name."</b><br>
				<b>Typ av tak : </b>".$type."<br>
				<b>Takyta : </b>".$square_meter."<br>
				<b>Adress : </b>".$address."<br>
				<b>Område : </b>".$area."<br>
				<b>Telefonnummer : </b>".$phone."<br>
				<b>Epost : </b>".$email;
		
		/* additional headers. Needed, see php manual for more info */
		$headers = "From : no-reply@takbytarna.se"."\r\n"."X-Mailer: PHP/".phpversion();
		
		$result = mail('jespoer@gmail.com', 'Takbytarna.se - Automatisk offertförfrågan', $msg, $headers);
		
		/* check result */
		if($result == true){

			/* return success */
			return 1;
		}else{
		
			/* return failure */
			return 0;
		}
		
	}
}

?>