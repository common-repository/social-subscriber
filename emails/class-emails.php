<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Class for send emails
		*
		* @package     Emails
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class Social_Subscriber_Send_Emails {
		
		private $arg;		
		
		public function __construct( $arg) {
			$this->pref = $arg['pref'];	
			add_action( 'ss_send_email', array($this, 'send_email'));
		}				
		
		
		public function send_email( $data ){
			$param = get_option($this->pref);
			$email = $data['EMAIL'];
			$fname = $data['NAME'];
			$lname = $data['LNAME'];
			if(!empty($param['admin_email'])){
				$from_name = $param['admin_from'];
				$admin_email = get_option( 'admin_email' );
				$to_email = $param['admin_from_email'];
				$subject = $param['admin_email_subject'];
				$message = $param['admin_email_content'];	
				
				$headers=null;
				$headers.="content-type: text/html; charset=utf-8\r\n";
				$headers.="From: ".$from_name." <".$admin_email.">\r\n";
				$headers.="X-Mailer: PHP/".phpversion()."\r\n";
				
				$message = str_replace( '{email}', $email, $message );
				$message = str_replace( '{fname}', $fname, $message );
				$message = str_replace( '{lname}', $lname, $message );	
				wp_mail($to_email, $subject, $message, $headers );
			}			
		}
		
		
	}	