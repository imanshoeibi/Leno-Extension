<?php

/**
* @ignore
*/
namespace beutheme\customizer\acp;

/**
* @package acp
*/

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $template, $request, $phpbb_log, $phpbb_container, $cache, $config, $root_path, $phpbb_root_path;
		$this->cache = $cache;
		$this->tpl_name 	= 'acp_customizer';
		$this->page_title 	= $user->lang['ACP_CUSTOMIZER_TITLE'];
		$this->request 		= $request;
		$this->log			= $phpbb_log;
		$this->config		= $config;
		$customizer_table = $phpbb_container->getParameter('tables.customizer_table');
		$this->root_path = $phpbb_root_path;				
		add_form_key('customizer/acp_customizer');
		
		$submit = $request->is_set_post('submit');
		if ($submit)
		{
			if (!check_form_key('customizer/acp_customizer'))
			{
				trigger_error('FORM_INVALID');
			}

			$customizer_color = $this->request->variable('customizer_color',' ',true);
			$this->config->set('customizer_enable', $customizer_color);

			$color_theme = $this->request->variable('color_theme',' ',true);
			$this->config->set('color_theme', $color_theme);

			$from_color = $this->request->variable('from_color',' ',true);
			$this->config->set('from_color', $from_color);

			$to_color = $this->request->variable('to_color',' ',true);
			$this->config->set('to_color', $to_color);

			$ads_code = $this->request->variable('ads_code',' ',true);
			$this->config->set('ads_code', $ads_code);

			$ads_sidebar_code = $this->request->variable('ads_sidebar_code',' ',true);
			$this->config->set('ads_sidebar_code', $ads_sidebar_code);

			$select_demo = $this->request->variable('select_demo',' ',true);
			$this->config->set('demo', $select_demo);

			$parallax = $this->request->variable('parallax',' ',true);
			$this->config->set('parallax', $parallax);
					
			$gradient_color = $this->request->variable('gradient_color',' ',true);
			$this->config->set('gradient_color', $gradient_color);
						
			$fix_menu = $this->request->variable('fix_menu',' ',true);
			$this->config->set('fix_menu', $fix_menu);
			
			$background_full = $this->request->variable('background_full',' ',true);
			$this->config->set('background_full', $background_full);

			$use_loading = $this->request->variable('use_loading',' ',true);
			$this->config->set('use_loading', $use_loading);

			$position_crumb = $this->request->variable('position_crumb',' ',true);
			$this->config->set('position_crumb', $position_crumb);			
			
			$changefont = $this->request->variable('changefont',' ',true);
			$this->config->set('changefont', $changefont);

			$font = $this->request->variable('font',' ',true);
			$this->config->set('font', $font);

			$footer = $this->request->variable('footer',' ',true);
			$this->config->set('footer', $footer);

			$efect_snow = $this->request->variable('efect_snow',' ',true);
			$this->config->set('efect_snow', $efect_snow);

			$use_gradient = $this->request->variable('use_gradient',' ',true);
			$this->config->set('use_gradient', $use_gradient);
			
			$use_slider = $this->request->variable('use_slider',' ',true);
			$this->config->set('use_slider', $use_slider);

			$sidebar = $this->request->variable('sidebar',' ',true);
			$this->config->set('sidebar', $sidebar);

			$use_sidebar = $this->request->variable('use_sidebar',' ',true);
			$this->config->set('use_sidebar', $use_sidebar);

			$position_sidebar = $this->request->variable('position_sidebar',' ',true);
			$this->config->set('position_sidebar', $position_sidebar);

			$mode_theme = $this->request->variable('mode_theme',' ',true);
			$this->config->set('mode_theme', $mode_theme);
			
			$linkone = $this->request->variable('linkone',' ',true);
			$this->config->set('linkone', $linkone );
			
			$linktwo = $this->request->variable('linktwo',' ',true);
			$this->config->set('linktwo', $linktwo );
			
			$linkthree = $this->request->variable('linkthree',' ',true);
			$this->config->set('linkthree', $linkthree );

			$linkfour = $this->request->variable('linkfour',' ',true);
			$this->config->set('linkfour', $linkfour );

			$linkfive = $this->request->variable('linkfive',' ',true);
			$this->config->set('linkfive', $linkfive );
			
			$flinkone = $this->request->variable('flinkone',' ',true);
			$this->config->set('flinkone', $flinkone );

			$flinktwo = $this->request->variable('flinktwo',' ',true);
			$this->config->set('flinktwo', $flinktwo );			

			$flinkthree = $this->request->variable('flinkthree',' ',true);
			$this->config->set('flinkthree', $flinkthree );
			
			$flinkfour = $this->request->variable('flinkfour',' ',true);
			$this->config->set('flinkfour', $flinkfour );

			$flinkfive = $this->request->variable('flinkfive',' ',true);
			$this->config->set('flinkfive', $flinkfive );
			
			$n_linkone = $this->request->variable('n_linkone',' ',true);
			$this->config->set('n_linkone', $n_linkone );
			
			$n_linktwo = $this->request->variable('n_linktwo',' ',true);
			$this->config->set('n_linktwo', $n_linktwo );
			
			$n_linkthree = $this->request->variable('n_linkthree',' ',true);
			$this->config->set('n_linkthree', $n_linkthree );

			$n_linkfour = $this->request->variable('n_linkfour',' ',true);
			$this->config->set('n_linkfour', $n_linkfour );

			$n_linkfive = $this->request->variable('n_linkfive',' ',true);
			$this->config->set('n_linkfive', $n_linkfive );
			
			$n_f_linkone = $this->request->variable('n_f_linkone',' ',true);
			$this->config->set('n_f_linkone', $n_f_linkone );

			$n_f_linktwo = $this->request->variable('n_f_linktwo',' ',true);
			$this->config->set('n_f_linktwo', $n_f_linktwo );

			$n_f_linkthree = $this->request->variable('n_f_linkthree',' ',true);
			$this->config->set('n_f_linkthree', $n_f_linkthree );

			$n_f_linkfour = $this->request->variable('n_f_linkfour',' ',true);
			$this->config->set('n_f_linkfour', $n_f_linkfour );

			$n_f_linkfive = $this->request->variable('n_f_linkfive',' ',true);
			$this->config->set('n_f_linkfive', $n_f_linkfive );
			
			$i_linkone = $this->request->variable('i_linkone',' ',true);
			$this->config->set('i_linkone', $i_linkone );
			
			$i_linktwo = $this->request->variable('i_linktwo',' ',true);
			$this->config->set('i_linktwo', $i_linktwo );
			
			$i_linkthree = $this->request->variable('i_linkthree',' ',true);
			$this->config->set('i_linkthree', $i_linkthree );

			$i_linkfour = $this->request->variable('i_linkfour',' ',true);
			$this->config->set('i_linkfour', $i_linkfour );
			
			$i_linkfive = $this->request->variable('i_linkfive',' ',true);
			$this->config->set('i_linkfive', $i_linkfive );			
			
			$nlinko = $this->request->variable('nlinko',' ',true);
			$this->config->set('nlinko', $nlinko );

			$nlinkt = $this->request->variable('nlinkt',' ',true);
			$this->config->set('nlinkt', $nlinkt );

			$nlinkth = $this->request->variable('nlinkth',' ',true);
			$this->config->set('nlinkth', $nlinkth );

			$nlinkfo = $this->request->variable('nlinkfo',' ',true);
			$this->config->set('nlinkfo', $nlinkfo );

			$nlinkfi = $this->request->variable('nlinkfi',' ',true);
			$this->config->set('nlinkfi', $nlinkfi );
			
			$nflinko = $this->request->variable('nflinko',' ',true);
			$this->config->set('nflinko', $nflinko );

			$nflinkt = $this->request->variable('nflinkt',' ',true);
			$this->config->set('nflinkt', $nflinkt );

			$nflinkth = $this->request->variable('nflinkth',' ',true);
			$this->config->set('nflinkth', $nflinkth );			
			
			$nflinkfo = $this->request->variable('nflinkfo',' ',true);
			$this->config->set('nflinkfo', $nflinkfo );

			$nflinkfi = $this->request->variable('nflinkfi',' ',true);
			$this->config->set('nflinkfi', $nflinkfi );

			$link_facebook = $this->request->variable('link_facebook',' ',true);
			$this->config->set('link_facebook', $link_facebook );

			$link_twitter = $this->request->variable('link_twitter',' ',true);
			$this->config->set('link_twitter', $link_twitter );

			$link_youtube = $this->request->variable('link_youtube',' ',true);
			$this->config->set('link_youtube', $link_youtube );
					
			$link_linkedin = $this->request->variable('link_linkedin',' ',true);
			$this->config->set('link_linkedin', $link_linkedin );

			$link_instagram = $this->request->variable('link_instagram',' ',true);
			$this->config->set('link_instagram', $link_instagram );

			$footer_text = $this->request->variable('footer_text',' ',true);
			$this->config->set('footer_text', $footer_text );

			$footer_title = $this->request->variable('footer_title',' ',true);
			$this->config->set('footer_title', $footer_title );
			
			$font_name = $this->request->variable('font_name',' ',true);
			$this->config->set('font_name', $font_name);
			
			$ads_bottom_header = $this->request->variable('ads_bottom_header',' ',true);
			$this->config->set('ads_bottom_header', $ads_bottom_header);

			$ads_top_footer = $this->request->variable('ads_top_footer',' ',true);
			$this->config->set('ads_top_footer', $ads_top_footer);

			$ads_banner_index_bottom_online = $this->request->variable('ads_banner_index_bottom_online',' ',true);
			$this->config->set('ads_banner_index_bottom_online', $ads_banner_index_bottom_online);

			$ads_index_bottom_birthday = $this->request->variable('ads_index_bottom_birthday',' ',true);
			$this->config->set('ads_index_bottom_birthday', $ads_index_bottom_birthday);

			$uploads=array('logo_upload'=>'logo_path','logo_upload_login_page'=>'upload_login_page_path','favicon'=>'favicon','background'=>'background','background2'=>'background2','background3'=>'background3');
			
			foreach ($uploads as $name => $path) {
				$file = $request->file($name);
				$destination = 'ext/beutheme/customizer/files/';
				$generate_board_url = generate_board_url() . '/';
		
				if ($file['error'] == UPLOAD_ERR_OK)
				{
					
					if (!$this->upload($file, $this->root_path . $destination))
					{
						echo "Your files have not been successfully uploaded  , please try again and make sure you are following appropriate size and format for each file,photo,.. etc.";
					}
					$this->config->set($path , $generate_board_url . $destination . $file['name']);
					}
						else if ($file['error'] != UPLOAD_ERR_NO_FILE)
					{
						echo "Your files have not been successfully uploaded  , please try again and make sure you are following appropriate size and format for each file,photo,.. etc.";
					}
			}

		trigger_error($user->lang['SJ_SAVED'] . adm_back_link($this->u_action));
	
		}

		$template->assign_vars(array(
			'CUSTMIZER_COLOR'		=> $this->config['customizer_enable'],
			'BACKGROUND_FULL'		=> $this->config['background_full'],
			'LOGO_THEME'			=> $this->config['logo_path'],
			'LOGO_LOGIN'			=> $this->config['upload_login_page_path'],
			'FAVICON'				=> $this->config['favicon'],
			'BACKGROUND'			=> $this->config['background'],
			'BACKGROUND2'			=> $this->config['background2'],
			'BACKGROUND3'			=> $this->config['background3'],
			'USE_SLIDER'			=> $this->config['use_slider'],			
			'USE_SIDEBAR'			=> $this->config['use_sidebar'],					
			'POSITION_SIDEBAR'		=> $this->config['position_sidebar'],			
			'MODE_THEME'			=> $this->config['mode_theme'],			
			'EFECT_SNOW'			=> $this->config['efect_snow'],			
			'USE_GRADIENT'			=> $this->config['use_gradient'],			
			'SIDEBAR'				=> $this->config['sidebar'],			
			'COLOR_THEME'			=> $this->config['color_theme'],
			'FROM_COLOR'			=> $this->config['from_color'],
			'TO_COLOR'				=> $this->config['to_color'],			
			'SELECT_DEMO'			=> $this->config['demo'],
			'PARALLAX'				=> $this->config['parallax'],
			'USE_LOADING'			=> $this->config['use_loading'],
			'GRADIENT_COLOR'		=> $this->config['gradient_color'],
			'FIX_MENU'				=> $this->config['fix_menu'],
			'FOOTER'				=> $this->config['footer'],
			'POSITION_CRUMB'		=> $this->config['position_crumb'],
			'FONT_NAME'				=> $this->config['font_name'],		
			'LINKONE'				=> $this->config['linkone'],		
			'LINKTWO'				=> $this->config['linktwo'],		
			'LINKTHREE'				=> $this->config['linkthree'],
			'LINKFOUR'				=> $this->config['linkfour'],
			'LINKFIVE'				=> $this->config['linkfive'],			
			'FLINKONE'				=> $this->config['flinkone'],		
			'FLINKTWO'				=> $this->config['flinktwo'],		
			'FLINKTHREE'			=> $this->config['flinkthree'],
			'FLINKFOUR'				=> $this->config['flinkfour'],		
			'FLINKFIVE'				=> $this->config['flinkfive'],			
			'N_LINKONE'				=> $this->config['n_linkone'],		
			'N_LINKTWO'				=> $this->config['n_linktwo'],		
			'N_LINKTHREE'			=> $this->config['n_linkthree'],
			'N_LINKFOUR'			=> $this->config['n_linkfour'],
			'N_LINKFIVE'			=> $this->config['n_linkfive'],			
			'N_F_LINKONE'			=> $this->config['n_f_linkone'],		
			'N_F_LINKTWO'			=> $this->config['n_f_linktwo'],		
			'N_F_LINKTHREE'			=> $this->config['n_f_linkthree'],
			'N_F_LINKFOUR'			=> $this->config['n_f_linkfour'],
			'N_F_LINKFIVE'			=> $this->config['n_f_linkfive'],		
			'I_LINKONE'				=> $this->config['i_linkone'],		
			'I_LINKTWO'				=> $this->config['i_linktwo'],		
			'I_LINKTHREE'			=> $this->config['i_linkthree'],				
			'I_LINKFOUR'			=> $this->config['i_linkfour'],				
			'I_LINKFIVE'			=> $this->config['i_linkfive'],				
			'N_LINK_O'				=> $this->config['nlinko'],				
			'N_LINK_T'				=> $this->config['nlinkt'],				
			'N_LINK_TH'				=> $this->config['nlinkth'],
			'N_LINK_FO'				=> $this->config['nlinkfo'],
			'N_LINK_FI'				=> $this->config['nlinkfi'],
			'N_F_LINK_O'			=> $this->config['nflinko'],				
			'N_F_LINK_T'			=> $this->config['nflinkt'],				
			'N_F_LINK_TH'			=> $this->config['nflinkth'],
			'N_F_LINK_FO'			=> $this->config['nflinkfo'],				
			'N_F_LINK_FI'			=> $this->config['nflinkfi'],		
			'LINKFACEBOOK'			=> $this->config['link_facebook'],	
			'LINKTWITTER'			=> $this->config['link_twitter'],	
			'LINKYOUTUBE'			=> $this->config['link_youtube'],	
			'LINKLINKEDIN'			=> $this->config['link_linkedin'],	
			'LINKINSTAGRAM'			=> $this->config['link_instagram'],			
			'FOOTER_TEXT'			=> $this->config['footer_text'],	
			'FOOTER_TITLE'			=> $this->config['footer_title'],							
			'CHANGEFONT'			=> $this->config['changefont'],			
			'ADS_BOTTOM_HEADER'		=> $this->config['ads_bottom_header'],
			'ADS_TOP_FOOTER'		=> $this->config['ads_top_footer'],
			'ADS_INDEX_BOTTOM_ONLINE'		=> $this->config['ads_banner_index_bottom_online'],
			'ADS_INDEX_BOTTOM_BIRTHDAY'		=> $this->config['ads_index_bottom_birthday'],			
			'FONT_TEXT'						=> $this->config['font'],			
			'ADS_SIDEBAR_CODE_TEXT'			=> $this->config['ads_sidebar_code'],			
			'ADS_CODE_TEXT'					=> $this->config['ads_code'],			
			'ADS_CODE'						=> htmlspecialchars_decode ($this->config['ads_code']),
			'ADS_SIDEBAR_CODE'				=> htmlspecialchars_decode ($this->config['ads_sidebar_code']),
			'FONT'							=> htmlspecialchars_decode ($this->config['font']),


		));
	
}
	protected function upload($fp, $location)
	{
		if ($this->Allowupload($fp['name']) && $this->allowedSize($fp['size']))
		{
			$destination = $location . basename($fp['name']);
			if (move_uploaded_file($fp['tmp_name'], $destination))
			{
				return true;
			}
		}
		return false;
	}

	protected function Allowupload($filename)
	{
		return in_array($this->getExtension($filename), array('gif', 'jpeg', 'jpg', 'png', 'svg'), true);
	}
	protected function allowedSize($filesize)
	{
		return ($filesize < ((int) ini_get('upload_max_filesize')) * 1000000);
	}
	protected function getExtension($filename)
	{
		if (strpos($filename, '.') === false)
		{
			return '';
		}

		$parts = explode('.', $filename);
		return strtolower(array_pop($parts));
	}


}