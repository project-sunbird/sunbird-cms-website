<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');
?>
<div class="teamlanding-<?php echo $this->pageclass_sfx; ?> row " itemscope itemtype="https://schema.org/Person">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
		</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
	<?php endif; ?>


	<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
		<?php if ($this->params->get('show_no_articles', 1)) : ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (!empty($this->items)) : ?>
		<?php foreach ($this->items as $key => &$item) : ?>
				<div class="col-xs-12 teamitemcover <?php echo $item->state == 0 ? 'hide system-unpublished' : null; ?>"
					itemprop="Person" itemscope itemtype="https://schema.org/Person">
					<?php
					$this->item = & $item;
					echo $this->loadTemplate('item');
					?>
				</div>
		<?php endforeach; ?>
	<?php endif; ?>

		<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="col-xs-12">
			<div class="pagination-wrap text-right padding15">
				<?php if ($this->params->def('show_pagination_results', 1)) : ?>
					<p class="counter"> <strong><?php echo $this->pagination->getPagesCounter(); ?> </strong></p>
				<?php endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
				</div>
			</div>
	<?php endif; ?>
</div>
