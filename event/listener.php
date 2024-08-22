<?php
/**
*
* @package New Topic On Index
* @copyright (c) 2014 phpBB Group
* @copyright (c) 2024 v12mike
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace v12mike\newtopiconindex\event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
            'core.index_modify_page_title'    => 'index_modify_page_title',
		);
	}

	public function __construct($phpbb_root_path, $php_ext)
	{
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

    public function index_modify_page_title($event)
    {
        make_jumpbox(append_sid("{$this->phpbb_root_path}posting.{$this->php_ext}?mode=post"), false, false, 'f_post');
        return;
    }

}
