<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT')) { exit; }
/*
if(defined('ADMIN_PAGE') && ADMIN_PAGE === true)
{
	include_lan(e_PLUGIN."chatbox_menu/languages/".e_LANGUAGE."/".e_LANGUAGE.".php");
//	$config_category = NT_LAN_CB_1;
//	$config_events = array('cboxpost' => NT_LAN_CB_2);
}


if (!function_exists('notify_cboxpost')) {
	function notify_cboxpost($data) {
		global $nt;
		include_lan(e_PLUGIN."chatbox_menu/languages/".e_LANGUAGE."/".e_LANGUAGE.".php");
		$message = NT_LAN_CB_3.': '.USERNAME.' ('.NT_LAN_CB_4.': '.e107::getIPHandler()->ipDecode($data['ip']).' )<br />';
		$message .= NT_LAN_CB_5.':<br />'.$data['cmessage'].'<br /><br />';
		$nt -> send('cboxpost', NT_LAN_CB_6, $message);
	}
}
*/



// v2.x Standard 
class chatbox_menu_notify extends notify // plugin-folder + '_notify' 
{		
	function config()
	{
		//include_lan(e_PLUGIN."chatbox_menu/languages/".e_LANGUAGE."/".e_LANGUAGE.".php"); Use English_global.php instead. 
		
		$config = array();
	
		$config[] = array(
			'name'			=> NT_LAN_CB_2, //  "Message posted"
			'function'		=> "cboxpost",
			'category'		=> ''
		);	
		
		return $config;
	}
	
	function cboxpost($data) 
	{
		//include_lan(e_PLUGIN."chatbox_menu/languages/".e_LANGUAGE."/".e_LANGUAGE.".php"); // Use English_global.php instead. 
	
		$message = NT_LAN_CB_3.': '.USERNAME.' ('.NT_LAN_CB_4.': '.e107::getIPHandler()->ipDecode($data['ip']).' )<br />';
		$message .= NT_LAN_CB_5.':<br />'.$data['cmessage'].'<br /><br />';
		
		$this->send('cboxpost', NT_LAN_CB_6, $message);
	}
	
}