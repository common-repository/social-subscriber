<?php
	/**
		* Facebook
		*
		* @package     
		* @subpackage  Integration
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	
	$param = $this->option;
	session_start();
	include (plugin_dir_path( __FILE__ ) . 'facebook/autoload.php');
	$action = isset( $_GET['action'] ) ? $_GET['action'] : '';	
	$config = array(
	'app_id' => $param['facebook_api_id'],
	'app_secret' => $param['facebook_secret'],
	'default_graph_version' => 'v2.4'
	);
	$fb = new Facebook\Facebook( $config );
	
	$callBackUrl = self::callBackUrl();
	$callback = $callBackUrl . 'socialSubscriber' . '=facebook';	
	
	if( $action == 'subscribe' ) {			
		$encoded_url = isset( $_GET['redirect_to'] ) ? $_GET['redirect_to'] : '';	
		set_transient( 'soc_subcriber_facebook_login', $encoded_url );
		// Well looks like we are a fresh dude, login to Facebook!
		$helper = $fb->getRedirectLoginHelper();
		$permissions = array(
		'email',
		'public_profile'
		);
		// optional
		$loginUrl = $helper->getLoginUrl( $callback, $permissions );
		self::redirect( $loginUrl );				
	}
	else {
		if( isset( $_REQUEST['error'] ) ) {
			$response->status = 'ERROR';
			$response->error_code = 2;
			$response->error_message = 'INVALID AUTHORIZATION';
			return $response;
			die();
		}
		if( isset( $_REQUEST['code'] ) ) {
			$helper = $fb->getRedirectLoginHelper();
			// Trick below will avoid "Cross-site request forgery validation failed. Required param "state" missing." from Facebook
			if (isset($_GET['state'])) {
				$helper->getPersistentDataHandler()->set('state', $_GET['state']);
			}
			
			$_SESSION['FBRLH_state'] = $_REQUEST['state'];
			try {
				$accessToken = $helper->getAccessToken($callback);
			}
			catch( Facebook\Exceptions\FacebookResponseException $e ) {
				
				// When Graph returns an error
				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
			}
			catch( Facebook\Exceptions\FacebookSDKException $e ) {
				
				// When validation fails or other local issues
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			
			if( isset( $accessToken ) ) {
				
				// Logged in!
				$_SESSION['facebook_access_token'] = (string)$accessToken;
				$fb->setDefaultAccessToken( $accessToken );
				
				try {
					// $response = $fb->get( '/me?fields=email,name, first_name, last_name, gender, link, about, address, bio, birthday, education, hometown, is_verified, languages, location, website' );
					$response = $fb->get( '/me?fields=id,name,email,first_name,last_name' );
					$userNode = $response->getGraphUser();
				}
				catch( Facebook\Exceptions\FacebookResponseException $e ) {
					
					// When Graph returns an error
					echo 'Graph returned an error: ' . $e->getMessage();
					exit;
				}
				catch( Facebook\Exceptions\FacebookSDKException $e ) {
					
					// When validation fails or other local issues
					echo 'Facebook SDK returned an error: ' . $e->getMessage();
					exit;
				}
				
				$user_profile = $response->getGraphUser();
				if( $user_profile != null ) {							
					$email = isset($user_profile['email']) ? $user_profile['email'] : '';
					$fname = $user_profile['first_name'];
					$lname = $user_profile['last_name'];					
					$data = array(
					'EMAIL'  => $email,
					'NAME'   => $fname,
					'LNAME'  => $lname,
					
					);		
					if(!empty($email)){
						do_action('ss_ems_integration', $data);
						do_action('ss_send_email', $data);						
					}						
				}					
				else {
					echo "INVALID AUTHORIZATION!";
					
				}
			}
			
			$redirect = get_transient( 'soc_subcriber_facebook_login' );				
			if ($redirect === false){
				$redirect = site_url();				
			}
			else {				
				$redirect = $redirect;
			}
			$redirect = wp_sanitize_redirect($redirect);
			$redirect = wp_validate_redirect($redirect, site_url());
			delete_site_transient('soc_subcriber_facebook_login');
			self::redirect( $redirect );
			
		}
		else {
			$encoded_url = isset( $_GET['redirect_to'] ) ? $_GET['redirect_to'] : '';	
			set_transient( 'soc_subcriber_facebook_login', $encoded_url );
			// Well looks like we are a fresh dude, login to Facebook!
			$helper = $fb->getRedirectLoginHelper();
			$permissions = array(
			'email',
			'public_profile'
			);
			// optional
			$loginUrl = $helper->getLoginUrl( $callback, $permissions );
			self::redirect( $loginUrl );
		}
		
		
	}		