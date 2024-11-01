<?php
/**
* Emails
*
* @package     
* @subpackage  Settings
* @copyright   Copyright (c) 2017, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

/* Admin */

$admin_email = array(
	'id'   => 'admin_email',
	'name' => 'admin_email',	
	'type' => 'checkbox',	
	'val' => isset($param['admin_email']) ? $param['admin_email'] : 0,
);

$admin_from = array(
	'id'   => 'admin_from',
	'name' => 'admin_from',	
	'type' => 'text',
	'val' => isset($param['admin_from']) ? $param['admin_from'] : get_option( 'blogname' ),	
);

$admin_from_email = array(
	'id'   => 'admin_from_email',
	'name' => 'admin_from_email',	
	'type' => 'text',
	'val' => isset($param['admin_from_email']) ? $param['admin_from_email'] : get_option( 'admin_email' ),	
);

$admin_email_subject = array(
	'id'   => 'admin_email_subject',
	'name' => 'admin_email_subject',	
	'type' => 'text',
	'val' => isset($param['admin_email_subject']) ? $param['admin_email_subject'] : 'New Subscriber',	
);

$admin_email_content = array(
	'id'   => 'admin_email_content',
	'name' => 'admin_email_content',	
	'type' => 'editor',
	'val' => isset($param['admin_email_content']) ? $param['admin_email_content'] : 'Hello, admin <strong><p/>You have a new subscriber</strong> <p/> <ul> <li>email: {email}</li> <li>first name: {fname}</li> <li>last name: {lname}</li> </ul>',	
);

?>