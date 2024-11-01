<?php
	/**
		* Interation Class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class Social_Networks_Interation {
		
		private $arg;
		
		function __construct( $arg ) {	
			$this->plugin_name      = $arg['plugin_name'];
			$this->plugin_menu      = $arg['plugin_menu'];
			$this->version          = $arg['version'];
			$this->pref             = $arg['pref'];			
			$this->slug             = $arg['slug'];
			$this->plugin_dir       = $arg['plugin_dir'];
			$this->plugin_url       = $arg['plugin_url'];
			$this->plugin_home_url  = $arg['plugin_home_url'];
			
			$this->option = get_option($this->pref);
			
			add_action('init', array($this,'login_compat'));
		}	
		
		public function login_compat( ) {			
			if(isset($_GET['socialSubscriber']) && !empty($_GET['socialSubscriber'])){
				self::login_check();
			}						
		}
		
		public function login_check( ) {
			$network = $_GET['socialSubscriber'];			
			switch( $network ) {
				case 'facebook':
					if( version_compare( PHP_VERSION, '5.4.0', '<' ) ) {
						echo 'The Facebook SDK requires PHP version 5.4 or higher. Please notify about this error to site admin.';
						die();
					}
					self::Facebook();
					break;	
								
			}
			
		}
		
		public function Facebook(){
			include ('facebook.php');
			
		}
						
		function callBackUrl() {
			$connection = !empty( $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
			$url = $connection . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
			if( strpos( $url, '?' ) === false ) {
				$url.= '?';
			} 
			else {
				$url.= '&';
			}
			return $url;
		}
		
		static function redirect( $redirect ) {
            if( headers_sent() ) {
                
                // Use JavaScript to redirect if content has been previously sent (not recommended, but safe)
                echo '<script language="JavaScript" type="text/javascript">window.location=\'';
                echo $redirect;
                echo '\';</script>';
			} 
            else {
                
                // Default Header Redirect
                header( 'Location: ' . $redirect );
			}
            exit;
		}
		
		
		
	}
?>