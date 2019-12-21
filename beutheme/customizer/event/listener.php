<?php

namespace beutheme\customizer\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	protected $template;

	protected $db;

	protected $config;

	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db,
	\phpbb\request\request $request, $customizer_table, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->db = $db;
		$this->request = $request;
		$this->customizer_table = $customizer_table;
		$this->config = $config;
	}

	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'  => 'load_language_on_setup',
			'core.page_header' => 'customizer',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext 	= $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name'	=> 'beutheme/customizer',
			'lang_set'	=> 'lang_customizer',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function customizer($event)
	{	
		$this->template->assign_vars(array(
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
}
