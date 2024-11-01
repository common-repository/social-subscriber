<?php
	/**
		* Shortcodes
		*
		* @package     Social
		* @subpackage  Shortcodes
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class Social_Subscriber_Shortcodes { 
	
		private $arg;
		
		public function __construct($arg) {	
			$this->plugin_name      = $arg['plugin_name'];
			$this->plugin_menu      = $arg['plugin_menu'];
			$this->version          = $arg['version'];
			$this->pref             = $arg['pref'];			
			$this->slug             = $arg['slug'];
			$this->plugin_dir       = $arg['plugin_dir'];
			$this->plugin_url       = $arg['plugin_url'];
			$this->plugin_home_url  = $arg['plugin_home_url'];
					
			$this->option = get_option($this->pref);
			
			add_shortcode('SSuscriber', array($this, 'shortcode') );	}	
		
		
		// Registration Shortcode		
		public function shortcode($atts) { 
			$param = $this->option;
			extract(shortcode_atts(array('social' => "", 'redirect' => "", 'text' => ""), $atts));
			ob_start();
			include ('shortcode.php');							
			$form = ob_get_contents();
			ob_end_clean();							
			wp_enqueue_style( $this->slug.'-icon', $this->plugin_url . 'asset/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
			wp_enqueue_style( $this->slug.'-style', plugin_dir_url( __FILE__ ) . 'css/style.css');			
			return $form;
		}		
	}
	
