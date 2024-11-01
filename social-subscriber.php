<?php
	/**
		* Plugin Name:       Social Subscriber (free version)
		* Plugin URI:        https://wordpress.org/plugins/social-subscriber/
		* Description:       Easy Subscription through social networks and integration with email marketing services
		* Version:           1.1
		* Author:            Dmytro Lobov		
		* License:           GPL-2.0+
		* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt		
		* Text Domain:       
		*
		* Users Activity is free software: you can redistribute it and/or modify
		* it under the terms of the GNU General Public License as published by
		* the Free Software Foundation, either version 2 of the License, or
		* any later version.
		*
		* Users Activity is distributed in the hope that it will be useful,
		* but WITHOUT ANY WARRANTY; without even the implied warranty of
		* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
		* GNU General Public License for more details.
		*
		* You should have received a copy of the GNU General Public License
		* along with Easy Digital Downloads. If not, see <http://www.gnu.org/licenses/>.
		*
	*/	
	
	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	if( !class_exists( 'Wow_Company' )) {
		require_once plugin_dir_path( __FILE__ ) . 'asset/class-wow-company.php';				
	}
	
		
	// Uninstall plugin
	register_uninstall_hook( __FILE__, array( 'Social_Subscriber', 'uninstall' ) );
	
	if( !class_exists( 'Social_Subscriber' ) ) {
		final class Social_Subscriber {
			
			private static $instance;
			
			const PREF = 'social_subscriber';
			
			public static function uninstall() {
				delete_option( self::PREF );				
			}
			
						
			public static function instance() {
				
				if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Social_Subscriber ) ) {					
					$arg = array(
						'plugin_name'      => 'Social Subscriber',
						'plugin_menu'      => 'Social Subscriber',
						'plugin_home_url'  => 'social-subscriber',
						'version'          => '1.1',
						'base_file'        => basename(__FILE__),
						'slug'             => dirname(plugin_basename(__FILE__)),
						'plugin_dir'       => plugin_dir_path( __FILE__ ),
						'plugin_url'       => plugin_dir_url( __FILE__ ),
						'pref'             => self::PREF,					
					);				
					self::$instance = new Social_Subscriber;								
					
					self::$instance->includes();
					self::$instance->adminlinks = new Social_Subscriber_ADMIN_LINKS($arg);
					self::$instance->admin      = new Social_Subscriber_ADMIN($arg);
					self::$instance->shortcodes = new Social_Subscriber_Shortcodes($arg);
					self::$instance->social     = new Social_Networks_Interation($arg);
					self::$instance->emsi       = new SS_EMSI_Integration($arg);
				}
				return self::$instance;
			}
			
			public function __clone() {
				// Cloning instances of the class is forbidden.
				_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'ems-integration' ), '1.0' );
			}
			
			public function __wakeup() {
				// Unserializing instances of the class is forbidden.
				_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'ems-integration' ), '1.0' );
			}
			
			private function includes() {			
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-links.php';			
				require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';
				require_once plugin_dir_path( __FILE__ ) . 'shortcodes/class-shortcodes.php';
				require_once plugin_dir_path( __FILE__ ) . 'integrations/class-intagration.php';
				require_once plugin_dir_path( __FILE__ ) . 'ems/class-intagration.php';
				require_once plugin_dir_path( __FILE__ ) . 'ems/class-mailchimp.php';
			}		
		}
	}
	
	function social_subscriber() {
		return Social_Subscriber::instance();
	}	
	// Get Running.
	social_subscriber();