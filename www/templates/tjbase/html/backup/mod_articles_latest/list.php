<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="mod-latestevents" >

	<?php foreach ($list as $item) :  ?>
		
		<div class="row" itemscope itemtype="https://schema.org/Article">
			
			<div class="col-xs-12">
				<a href="<?php echo $item->link; ?>" itemprop="url" class="news-title" target="_blank">
					<h4 itemprop="name" >
						<?php echo $item->title; ?>
					</h4>
				</a>
			</div>
			<div class="col-xs-12">
				<?php 
					if (empty($item->introtext)){
						$desc = $item->fulltext;
					} else {
						$desc = $item->introtext;
					};
					echo JHTML::_('string.truncate', $desc, 200);
				?>
			</div>
			
			<div class="col-xs-12 marginb25">
				<a href="<?php echo $item->link; ?>" title="Read More" class="font14" target="_blank">
					Read More  <i class="fa fa-arrow-right"></i>
				</a>
				
				<span class="pull-right text-light">
					<?php echo JHtml::_('date', $item->displayDate, 'D, dS M Y'); ?>
				</span>
				
			</div>
			
		</div>
	
	<?php endforeach; ?>

</div>
