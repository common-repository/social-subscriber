<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Shortcode
		*
		* @package     
		* @subpackage  Shortcode
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	
	if(empty($social)){
		$shortcode = '<u style="color:red;">Please, check Social Subscriber shortcode!!!</u>';
	}
	else {
		$text = !empty($text) ? $text : '';
		$redirect = !empty($redirect) ? $redirect : get_permalink();
		$url = site_url('index.php') . '?socialSubscriber='.$social;
		$shortcode = '<a href="'.$url.'&redirect_to='.$redirect.'&action=subscribe" rel="nofollow" class="ss-button ss-'.$social.'">'.$text.'</a>';
	}
	echo $shortcode;
	
	
	
	
?>