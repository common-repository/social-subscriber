<?php
/**
* Social Networks
*
* @package     
* @subpackage  Settings
* @copyright   Copyright (c) 2017, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

/* Facebook */


$facebook_api_id = array(
'id'   => 'facebook_api_id',
	'name' => 'facebook_api_id',	
	'type' => 'text',
	'val' => isset($param['facebook_api_id']) ? $param['facebook_api_id'] : '',	
);

$facebook_secret = array(
	'id'   => 'facebook_secret',
	'name' => 'facebook_secret',	
	'type' => 'text',
	'val' => isset($param['facebook_secret']) ? $param['facebook_secret'] : '',	
);




?>