<div class="tj-overlay hide"></div>

<!--Content Page-->
<div class="wrapper">
	<header id="header" class="tjbase-header">
		<div class="container">
			<div class="primary-logo-img pull-left">
				<a href="/">
					<img class="hidden-xs hidden-sm" src="<?php echo $primarylogoDesktop ?>" alt="desktop logo"/>
					<img class="hidden-md hidden-lg" src="<?php echo $primarylogoMobile ?>" alt="mobile logo"/>
				</a>
			</div>
			<?php if ($this->countModules('header')): ?>
				<div id="menu" class="tjbase-menu">
					<jdoc:include type="modules" name="header" style="tjbase" />
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="blank"></div>

	<div id="message-component" class="tjbase-message" role="alert">
		<div class="container">
			<jdoc:include type="message" />
		</div>
	</div>

	<div id="mainbodyblock" class="tjbase-mainbodyblock">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="mainbody" class="tjbase-mainbody" >
						<div id="content" class="tjbase-content">
							<jdoc:include type="component" />
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<footer>
		<?php if ($this->countModules('footer')): ?>
			<div id="footer" class="tjbase-footer" role="contentinfo">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="footer" style="tjbase" />
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->countModules('copyright')): ?>
			<div id="copyright" class="tjbase-copyright" role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<jdoc:include type="modules" name="copyright" style="tjbase" />
						<div>
					</div>
				</div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('debug')): ?>
			<div id="debug" class="tjbase-debug hide hidden">
				<jdoc:include type="modules" name="debug" style="tjbase" />
			</div>
		<?php endif; ?>
	</footer>
</div>
<!--/Content Page-->

