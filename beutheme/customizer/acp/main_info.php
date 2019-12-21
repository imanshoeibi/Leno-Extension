<?php

/**
* @ignore
*/

/**
* @package module_install
*/

namespace beutheme\customizer\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\beutheme\customizer\acp\main_module',
			'title'		=> 'ACP_CUSTOMIZER_TITLE',
			'version'	=> 'customizer_version',
			'modes'		=> array(
				'settings'	=> array(
					'title' 	=> 'ACP_CUSTOMIZER_CONFIG',
					'auth' 		=> 'beutheme/customizer && acl_a_board',
					'cat'		=> array('ACP_CUSTOMIZER_CONFIG')),
				),
		);
	}
}
