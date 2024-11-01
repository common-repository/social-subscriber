<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Email to Admin
		*
		* @package     Settings
		* @subpackage  Emails
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
?>


<div class="itembox">
	<div class="item-title">
		<h3>Email to admin</h3>
	</div>
	<div class="wow-admin-col wow-wrap">
		<div class="wow-admin-col-12">
			<?php echo self::create_option($admin_email);?> <label for="wow_admin_email">Include email to admin</label>
			
			
		</div>
		<div class="wow-admin-col-12">
			From Name:<br/>
			<?php echo self::create_option($admin_from);?>
		</div>
		<div class="wow-admin-col-12">
			Admin Email:<br/>
			<?php echo self::create_option($admin_from_email);?>
		</div>
		<div class="wow-admin-col-12">
			Email Subject:<br/>
			<?php echo self::create_option($admin_email_subject);?>
		</div>
		<div class="wow-admin-col-12">
			Email Content:<br/>
			<?php echo self::create_option($admin_email_content);?>
		</div>
	</div>
	
	<div class="wow-admin-col">
		<div class="wow-admin-col-12">			
			Enter the text that is sent to email to users after subscribing. HTML is accepted. Available template tags.
			<p />
			<i>{email} - User email</i><br/>
			<i>{fname} - User First Name </i><br/>
			<i>{lname} - User Last Name </i><br/>
		</div>
	</div>
	
	
</div>