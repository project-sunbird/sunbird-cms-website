<?php
/**
 * @package     LMS_Shika
 * @subpackage  mod_lms_mycourse_display
 * @copyright   Copyright (C) 2009-2014 Techjoomla, Tekdi Technologies Pvt. Ltd. All rights reserved.
 * @license     GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 * @link        http://www.techjoomla.com
 */
// No direct access.
defined('_JEXEC') or die;
JHTML::_('behavior.modal');
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root(true) . '/modules/mod_lms_mycourse_display/assets/css/my_course.css');
jimport('joomla.application.component.model');
require_once JPATH_SITE . '/components/com_tjlms/models/course.php';
require_once JPATH_SITE . '/components/com_ideas/defines.php';
$TjlmsModelcourse =new TjlmsModelcourse;
$userid = JFactory::getUser()->id;
$com_params=JComponentHelper::getParams('com_tjlms');
$currency_symbol =$com_params->get('currency_symbol');

?>
<div class="aspect-container">
<?php
	foreach ($target_data as $course){ ?>
		<div class="aspect-row">
			<div class="aspect-block row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 aspect-image">
					<img src="<?php echo $course->image; ?>" alt="<?php  echo $course->title; ?>" />
				</div>
				<div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h2><?php echo $course->title; ?></h2>
					<div class="aspect-desc"><?php echo $course->short_desc; ?></div>
				</div>

				<div class="aspect-order">
				<?php // buy button url
					if (!$userid)
					{
						$itemidReturn = $ComtjlmsHelper->getItemId('index.php?option=com_content&view=article&id='. GRI_COURSE_ARTICLE_ID_53);
						$return_link	= JRoute::_('index.php?option=com_content&view=article&id=' . GRI_COURSE_ARTICLE_ID_53 . '&Itemid=' . $itemidReturn);
						$msg = JText::_('COM_TJLMS_LOGIN');
						$uri = $return_link;
						$url = base64_encode($uri);
						$loginUrl = JRoute::_('index.php?option=com_users&view=login&return=' . $url);
						$btnClass ="btn-success";
						$btnDiv = "aspect-success";
						$buttonToShow = JText::_('MOD_CATEGORY_COURSE_LIST_BUY_COURSE') . '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';

					}

					/*$user = JFactory::getUser();
					$courseIds = array('65','66','67','68');

					if (in_array($course->id, $courseIds) && ((!in_array('23', $user->groups)) && (!in_array('31', $user->groups))))
					{
						$Url = "javascript::void(0);";
						$buttonToShow = JText::_('Coming Soon');
						$btnClass ="btn-success";
						$btnDiv = "aspect-success";
					}
					else
					{*/
						if (empty($course->orderinfo) || ($course->checkifuserenroled != 1))
						{
							$Url = JRoute::_("index.php?option=com_tjlms&view=buy&course_id=" . $course->id);
							$buttonToShow = JText::_('MOD_CATEGORY_COURSE_LIST_BUY_COURSE') . '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
							$btnClass ="btn-success";
							$btnDiv = "aspect-success";
						}
						elseif ($course->checkifuserenroled == 1)
						{
							$itemid = $ComtjlmsHelper->getItemId('index.php?option=com_tjlms&view=course&id=' . $course->id);
							$Url = JRoute::_('index.php?option=com_tjlms&view=course&id=' . $course->id . '&Itemid=' . $itemid, false);
							$buttonToShow = JText::_('MOD_CATEGORY_COURSE_LIST_ENTER');
							$btnClass ="btn-warning";
							$btnDiv = "aspect-warning";

						}
					// } ?>
					<div class="<?php echo (!empty($btnDiv) ? $btnDiv : ''); ?> ">
						<a class=" co-buy-btn btn-lg <?php echo $btnClass; ?>" id="paid_course_button" href="<?php if(!$userid) { echo $loginUrl; } else { echo $Url; } ?>">
							<?php echo $buttonToShow  ?>
						</a>
					</div>
				</div>

			</div>
		</div>
<?php
   }?>
</div>
