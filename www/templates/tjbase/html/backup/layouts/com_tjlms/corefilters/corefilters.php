<?php
/**
 * @version    SVN: <svn_id>
 * @package    Com_Tjlms
 * @copyright  Copyright (C) 2005 - 2016. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * Shika is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;
jimport('joomla.filesystem.file');
$app = JFactory::getApplication('site');
$layout = JFactory::getApplication()->input->get('layout', '', 'STRING');
$lang = JFactory::getLanguage();
$lang->load('mod_lms_lesson_filter', JPATH_SITE, $lang->getTag(), true);
$filterClass = '';
// Get state of filters
$mod_filter = new stdClass;
$mod_filter->course_type = $app->getUserStateFromRequest('com_tjlms' . '.filter.course_type', 'course_type', -1, 'INTEGER');
$mod_filter->search = $app->getUserStateFromRequest('com_tjlms' . '.filter.filter_search', 'filter_search', '', 'STRING');
?>
<script>
techjoomla.jQuery(window).load(function(){
	var category_filter = techjoomla.jQuery('#category_filter').val();

	if (category_filter > 0)
	{
		techjoomla.jQuery('#category_filter_chzn').addClass('filterActive');
	}

	var type_filter = techjoomla.jQuery('#course_type').val();

	if (type_filter > -1)
	{
		techjoomla.jQuery('#course_type_chzn').addClass('filterActive');
	}
});
</script>
<form name="adminForm1" id="adminForm1" class="form-validate filter-form-margin-0" method="post">
	<div id="filter-bar" class="">
		<div class="row-fluid">
			<div class="filter_search control-group btn-wrapper input-append">
				<input type="text" name="filter_search" id="filter_search"
				placeholder="<?php echo JText::_('MOD_LMS_FILTER_FILTER_SEARCH_DESC_COURSES'); ?>"
				value="<?php echo $mod_filter->search; ?>"
				class="hasTooltip input-small" title="<?php echo JText::_('JSEARCH_FILTER'); ?>"/>
				<button type="submit" class="btn hasTooltip"
				title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="control-group">
				<?php
				$typeoptions   = array();
				$typeoptions[] = JHtml::_('select.option','-1',JText::_('MOD_LMS_FILTER_ALL_COURSE_TYPE'));
				$typeoptions[] = JHtml::_('select.option','0',JText::_('MOD_LMS_FILTER_ALL_COURSE_TYPE_FREE'));
				$typeoptions[] = JHtml::_('select.option','1',JText::_('MOD_LMS_FILTER_ALL_COURSE_TYPE_PAID'));

				if ($mod_filter->course_type != -1)
				{
					$filterClass = 'filterActive';
				}

				echo JHtml::_('select.genericlist', $typeoptions, "course_type", 'class="input-small '. $filterClass .'" size="1"
					onchange="this.form.submit();" name="course_type"',"value", "text",$mod_filter->course_type);

				?>
			</div>
			<div class="tjlms_filter_margin">
				<?php
				$options   = array();
				$options[] = JHtml::_('select.option', '0', JText::_('MOD_LMS_FILTER_SELECT_CATEGORY'));
				$filterClass = '';
				
				if (!class_exists('TjlmsModelcourses'))
				{
					$path = JPATH_SITE . '/components/com_tjlms/models/courses.php';
					JLoader::register('TjlmsModelcourses', $path);
				}

				$TjlmsModelcourses = new TjlmsModelcourses;
				$cats = $TjlmsModelcourses->getTjlmsCats();
				
				$mod_filter = new stdClass;
				$mod_filter->category_filter = $app->getUserStateFromRequest('com_tjlms' . '.filter.category_filter', 'category_filter', 0, 'INTEGER');

				foreach($cats as $cat)
				{
					$options[] = JHtml::_('select.option', $cat->value, $cat->text);
				}

				if ($mod_filter->category_filter != 0)
				{
					$filterClass = 'filterActive';
				}

				echo JHtml::_('select.genericlist', $options, "category_filter", 'class="input-large '. $filterClass .'" size="1"
								onchange="this.form.submit();" name="category_filter"',"value", "text",$mod_filter->category_filter);
				?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<input type="hidden" name="lms_current_url" value="<?php echo JUri::getInstance()->toString();?>"/>
	<input type="hidden" name="option" value="com_tjlms" />
	<input type="hidden" name="view" value="courses" />
	<input type="hidden" name="layout" value="<?php echo $layout; ?>" />
	<input type="hidden" name="task" value="submit_filter" />
	<input type="hidden" name="controller" value="" />
</form>
