<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */

function modChrome_tjbase($module, &$params, &$attribs)
{
	$moduleClassSfx  = htmlspecialchars($params->get('moduleclass_sfx'));
	$moduleId        = $module->id;
	$headerTag       = htmlspecialchars($params->get('header_tag', 'h4'));
	$headerClass     = htmlspecialchars($params->get('header_class', ''));
	if ($module->content)
	{
		?>
		<div class="tjbase-module<?php echo $moduleClassSfx;?>" id="tjmod-<?php echo $moduleId ?>">
			<?php
				if ($module->showtitle){
					?>
					<div class="module-header">
						<?php
						echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
						 ?>
					</div>
					<?php
					}
					?>
					<div class="module-content">
						<?php echo $module->content; ?>
					</div>

		</div>
		<?php
}
}
?>
