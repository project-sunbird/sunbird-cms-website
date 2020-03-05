<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);
?>

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
	<div class="system-unpublished">
<?php endif; ?>


<?php
	// Article URL
	$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
	// Article Intro Image
	$images = json_decode($this->item->images);
	$itemimage = $images->image_intro;
	// Default Intro Image if not set
	if(empty($itemimage)){
			$itemimage = 'templates/tjbase/images/default-news.png';
	}
	if (empty($this->item->introtext)){
		$desc = $this->item->fulltext;
	}
	else {
		$desc = $this->item->introtext;
	}
?>

<div class="newsblogitem row">
	<div class="newsblogitem-img col-xs-12 col-sm-3">
		<a href="<?php echo $link; ?>" title="<?php echo $this->item->title; ?>" >
			<div class="bg-ImgCover img-round-reverse newsimg" style='background-image: url("<?php echo $itemimage; ?>");' title="<?php echo $this->item->title; ?>">
			</div>
		</a>
	</div>
	<div class="newsblogitem-content col-xs-12 col-sm-9">
		<div class="newsblogitem-title">
			<a href="<?php echo $link; ?>" title="<?php echo $this->item->title; ?>" >
				<h4><?php echo $this->item->title; ?></h4>
			</a>
		</div>
		<div class="newsblogitem-date">
			<p><?php echo $images->image_intro_alt ; ?></p>
		</div>
		<div class="newsblogitem-desc">
			<p><?php echo $desc ; ?></p>
		</div>
		<div class="newsblogitem-readmore">
			<a class="" href="<?php echo $link; ?>" title="<?php echo JText::_( 'TPL_TJBASE_READ_MORE' ); ?>" class="">
				<?php echo JText::_( 'TPL_TJBASE_READ_MORE' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>


<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
</div>
<?php endif; ?>
