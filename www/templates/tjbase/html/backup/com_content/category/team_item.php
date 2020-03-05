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
	$org = json_decode($this->item->urls);
	$itemimage = $images->image_intro;
	// Default Intro Image if not set
	if(empty($itemimage)){
			$itemimage = 'templates/tjbase/images/default-person.png';
	}
	$bio = $this->item->introtext . " " .$this->item->fulltext;
	if(!empty($images->image_intro_alt) && !empty($org->urlatext))
	{
		$comma =',';
	}
?>

<div class="personblogitem row">
	<div class="personblogitem-img col-xs-12 col-sm-3">
		<img src="<?php echo $itemimage; ?>" alt="<?php echo $this->item->title; ?>" title="<?php echo $this->item->title; ?>" class="personimg img-full" />
	</div>
	<div class="personblogitem-content col-xs-12 col-sm-9">
		<div class="personblogitem-name">
			<h4><?php echo $this->item->title; ?></h4>
		</div>
		<div class="personblogitem-post">
			<p><span class="post"><?php echo $images->image_intro_alt ; ?></span><?php echo $comma ; ?> <span class="org"><?php echo $org->urlatext ; ?></span> </p>
		</div>
		<div class="personblogitem-email">
			<strong>Email Address : </strong><a href="mailto:<?php echo $images->image_intro_caption ; ?>" title="Email to <?php echo $this->item->title; ?>" target="_blank"><?php echo $images->image_intro_caption ; ?></a>
		</div>
		<?php if (!empty($org->urlbtext)): ?>
		<div class="personblogitem-ll">
			<strong>Landline : </strong><span><?php echo $org->urlbtext ; ?></span>
		</div>
		<?php endif; ?>
		<?php if (!empty($this->item->created_by_alias)): ?>
		<div class="personblogitem-mob">
			<strong>Mobile : </strong><span><?php echo $this->item->created_by_alias ; ?></span>
		</div>
		<?php endif; ?>
		<div class="personblogitem-bio">
			<p><?php echo $bio ; ?></p>
		</div>

	</div>
</div>


<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
</div>
<?php endif; ?>
