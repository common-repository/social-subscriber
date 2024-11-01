<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Services
		*
		* @package     
		* @subpackage  Settings
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include ('settings/'.$m_current.'.php');
	
	
?>


<div class="itembox">
	<div class="item-title">
		<h3>Email Marketing Services</h3>		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($mailchimp);?> <label for="wow_mailchimp">MailChimp</label>
			</div>			
		</div>
		
		<div class="wow-admin-col" id="mailchimp">
			<div class="wow-admin-col-6">
				MailChimp api:<br/>
				<?php echo self::create_option($mailchimp_api);?>
				<i><a href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">Get Api</a></i>
			</div>	
			<div class="wow-admin-col-6">
				MailChimp list id:<br/>
				<?php echo self::create_option($mailchimp_list_id);?>
				<i><a href="https://kb.mailchimp.com/lists/manage-contacts/find-your-list-id" target="_blank">Get list id</a></i>
			</div>			
		</div>
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<input type="checkbox" disabled> Getresponse <a href='admin.php?page=<?php echo $this->slug;?>&tab=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>
											
			</div>			
		</div>		
		
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<input type="checkbox" disabled> Activecampaign <a href='admin.php?page=<?php echo $this->slug;?>&tab=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>				
			</div>			
		</div>
		
			
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<input type="checkbox" disabled> Aweber <a href='admin.php?page=<?php echo $this->slug;?>&tab=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>							
			</div>			
		</div>
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<input type="checkbox" disabled> Sendinblue	<a href='admin.php?page=<?php echo $this->slug;?>&tab=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>										
			</div>			
		</div>
	</div>	
</div>

