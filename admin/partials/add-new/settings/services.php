<?php
/**
* Widget Settings
*
* @package     
* @subpackage  Settings
* @copyright   Copyright (c) 2017, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

$mailchimp = array(
	'id'   => 'mailchimp',
	'name' => 'mailchimp',	
	'type' => 'checkbox',
	'func' => 'mailchimp',
	'val' => isset($param['mailchimp']) ? $param['mailchimp'] : 0,	
);

$mailchimp_api = array(
	'id'   => 'mailchimp_api',
	'name' => 'mailchimp_api',	
	'type' => 'text',
	'val' => isset($param['mailchimp_api']) ? $param['mailchimp_api'] : '',	
);

$mailchimp_list_id = array(
	'id'   => 'mailchimp_list_id',
	'name' => 'mailchimp_list_id',	
	'type' => 'text',
	'val' => isset($param['mailchimp_list_id']) ? $param['mailchimp_list_id'] : '',	
);

$mailchimp_optin = array(
	'id'   => 'mailchimp_optin',
	'name' => 'mailchimp_optin',	
	'type' => 'select',
	'val' => isset($param['mailchimp_optin']) ? $param['mailchimp_optin'] : '',	
	'option' => array(
		'1' => 'Single Opt-In',
		'2' => 'Double Opt-In'	
	),
);

?>