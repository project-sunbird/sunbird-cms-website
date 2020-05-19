<?php
/**
 * @package         Regular Labs Library
 * @version         20.4.17841
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2020 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Library\Condition;

defined('_JEXEC') or die;

/**
 * Class ZooPagetype
 * @package RegularLabs\Library\Condition
 */
class ZooPagetype
	extends Zoo
{
	public function pass()
	{
		return $this->passByPageType('com_zoo', $this->selection, $this->include_type);
	}
}
