<?php
/**
 * @copyright   Copyright (C) 2019 Techjoomla. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

unset($headData['metaTags']['http-equiv']);
$doc->setHeadData($headData);
$doc->setMetaData( 'X-UA-Compatible', 'IE=edge', true);
$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1');
$doc->setMetaData( 'theme-color', $themeColor);
$doc->setGenerator('');
if($csp) {
	$doc->setMetaData( 'Content-Security-Policy', $csp, true);
};
require_once __DIR__ . '/assets.php';
?>

<meta charset="UTF-8">
<?php if($addAtHeadBeginning): { echo $addAtHeadBeginning; } endif; ?>
<link rel="shortcut icon" href="<?php echo $favicon ;?>" />
<jdoc:include type="head" />
<?php if($manifest && file_exists($sitePath.'/manifest.json')):?>
	<link rel="manifest" href="<?php echo $siteUrl.'/manifest.json';?>" />
<?php endif;?>
<link rel="canonical" href="<?php echo $headBaseURL; ?>" />
<meta name="theme-color" content="<?php $themeColor; ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<?php
if ($ogTag) {
	require_once __DIR__ . '/ogtag.php';
};
if ($twitterCard) {
	require_once __DIR__ . '/twittercard.php';
};
if ($schema) {
	require_once __DIR__ . '/schema.php';
};
require_once __DIR__ . '/footer-fixed.php';
?>
<?php if($addAtHeadEnding):{ echo $addAtHeadEnding; } endif;?>
