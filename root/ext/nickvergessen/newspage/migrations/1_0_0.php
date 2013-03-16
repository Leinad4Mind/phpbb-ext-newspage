<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

class phpbb_ext_nickvergessen_newspage_migrations_1_0_0 extends phpbb_db_migration
{
	public function effectively_installed()
	{
		return isset($this->config['newspage_mod_version']) && version_compare($this->config['newspage_mod_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('phpbb_db_migration_data_310_dev');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('news_number', 5)),
			array('config.add', array('news_forums', '0')),
			array('config.add', array('news_char_limit', 500)),
			array('config.add', array('news_user_info', 1)),
			array('config.add', array('news_post_buttons', 1)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_NEWSPAGE_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_NEWSPAGE_TITLE',
				array(
					'module_basename'	=> 'phpbb_ext_nickvergessen_newspage_acp_main_module',
					'modes'				=> array('config_newspage'),
				),
			)),

			array('config.add', array('newspage_mod_version', '1.0.0')),
		);
	}
}
