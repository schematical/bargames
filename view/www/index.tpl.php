<?php require_once(dirname(__FILE__) . '/_header.tpl.php'); ?>
	<div class='row'>
		<div class='span6 well'>
			<h2>Start your own game now!</h2>
			<p>
				Start putting those flatscreens to work right now. More happy customers equals more dollars for you and your business.
			</p>
			<?php $this->btnGetStarted->Render(); ?>
		</div>
		<div class='span5 well'>
			<h2>Video Goes here</h2>
		</div>
	</div>
	<div id='divGetStarted' class='row mjax-bs-animate-hiden'>
		<div class='span6 well'>
			<?php $this->pnlSetup->Render(); ?>
		</div>
		<div class='span5 well'>
			<h2>Preview</h2>
		</div>
	</div>
	<div id='divSignup' class='row mjax-bs-animate-hiden'>
		<div class='span4 visible-desktop'>
			<!--h2>Preview</h2-->
		</div>
		<div class='span4 well' style='text-align: center;'>
			<h3>Give us your info so we can setup the game</h3>
			<?php $this->pnlSignup->Render(); ?>
		</div>
		<div class='span4 visible-desktop'>
			<!--h2>Preview</h2-->
		</div>
	</div>







  
<?php require_once(dirname(__FILE__) . '/_footer.tpl.php'); ?>
