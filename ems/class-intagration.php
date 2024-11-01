<?php
	/**
		* EMS Interation  Class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class SS_EMSI_Integration {
		
		private $arg;
		
		function __construct( $arg ) {	
			$this->plugin_url = $arg['plugin_url'];			
			$this->option = get_option('social_subscriber');
			add_action( 'ss_ems_integration', array( $this, 'subscribe' ), 10, 1 );
		}	
		public function subscribe( $data ) {			
			include('integration.php');
		}
		
	}
?>