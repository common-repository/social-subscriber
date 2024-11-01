<?php
	/**
		* Integration with EMS
		*
		* @package     Email Marketing Servises 
		* @subpackage  Integration with serveses
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	if( !empty( $this->option['mailchimp'] ) ) {
		$mailchimp = new SS_EMSI_MailChimp ();
		$result = $mailchimp->subscribe($data);
	}		
	
	
	