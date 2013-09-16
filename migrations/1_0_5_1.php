<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

namespace nickvergessen\newspage\migrations;

class v1_0_5_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return version_compare($this->config['newspage_mod_version'], '1.0.5.1', '>=');
	}

	static public function depends_on()
	{
		return array('\nickvergessen\newspage\migrations\v1_0_5');
	}

	public function update_data()
	{
		return array(
			array('config.update', array('newspage_mod_version', '1.0.5.1')),
		);
	}
}
