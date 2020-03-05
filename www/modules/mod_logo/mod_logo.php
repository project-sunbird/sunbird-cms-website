<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app        = JFactory::getApplication();
$base       = JUri::root(true) .'/';

$csite_name = $app->get('sitename');
$largeLogo = $params->get('logoFileLarge');
$smallLogo = $params->get('logoFileSmall');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_logo', $params->get('layout', 'default'));
