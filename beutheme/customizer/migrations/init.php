<?php


namespace beutheme\customizer\migrations;

class init extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['customizer_version']) && version_compare($this->config['customizer_version'], '1.3.8', '>=');

	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

/*	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
			// ADD NEW TABLE STRUCTUR
				$this->table_prefix . 'customizer'	=> array(
					'COLUMNS' => array(
					'customizer_id'	=> array('UINT', null, 'auto_increment'),
					'fl_ext_link'		=> array('UINT', '0'),
					'fl_enable_b'		=> array('UINT', '0'),
					'fl_title_cat'		=> array('VCHAR', ''),
					'fl_link'			=> array('VCHAR', ''),
					'fl_link_text'		=> array('VCHAR', ''),
					'fl_b_nr'			=> array('UINT', '0'),
					),
					'PRIMARY_KEY'	=> 'customizer_id',
				),
			),
		);
	} */

	public function update_data()
	{
		// ADD CONFIG VERSION
		return array(
			array('config.add', array('customizer_version', '2.0.0')),
			array('config.add', array('customizer_enable', '0')),
			array('config.add', array('demo', '0')),
			array('config.add', array('parallax', '0')),
			array('config.add', array('fix_menu', '0')),
			array('config.add', array('position_crumb', '0')),
			array('config.add', array('gradient_color', '0')),
			array('config.add', array('color_theme', '')),
			array('config.add', array('from_color', '')),
			array('config.add', array('to_color', '')),
			array('config.add', array('changefont', '')),
			array('config.add', array('ads_code', '')),
			array('config.add', array('ads_sidebar_code', '')),
			array('config.add', array('ads_bottom_header', '')),
			array('config.add', array('ads_top_footer', '')),
			array('config.add', array('ads_banner_index_bottom_online', '')),
			array('config.add', array('ads_index_bottom_birthday', '')),
			array('config.add', array('customizer_ext_link', '0')),
			array('permission.add', array('a_customizer', true)),
			array('permission.permission_set', array('ADMINISTRATORS', 'ext_leno/customizer && acl_a_board', 'group')),

		// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACL_A_TITLE')),
			array('module.add', array('acp', 'ACL_A_TITLE', array(
				'module_basename'	=> '\beutheme\customizer\acp\main_module',
				'module_langname'	=> 'ACP_CUSTOMIZER_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_beutheme/customizer && acl_a_board',
			))),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'customizer',
			),
		);
	}
}
