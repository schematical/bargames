<?php require_once(dirname(__FILE__) . '/_header.tpl.php'); ?>
	<div class='row' style='margin-top:50Px;'>
        <div class='span3 visible-desktop'></div>
		<div class='span6' style='text-align: center;'>
            <div class='well'>
                <h2>Start your own game now!</h2>
                <p>
                    Start putting those flatscreens to work right now. More happy customers equals more dollars for you and your business.
                </p>
                <?php $this->btnGetStarted->Render(); ?>
            </div>
		</div>
        <div class='span3 visible-desktop'></div>
	</div>
	<div id='divGetStarted' class='row mjax-bs-animate-hiden'>
        <div class='span3 visible-desktop'></div>
		<div class='span6'>
            <div class='well'>
			    <?php $this->pnlSetup->Render(); ?>
            </div>
		</div>
        <div class='span3 visible-desktop'></div>
	</div>
	<div id='divSignup' class='row mjax-bs-animate-hiden'>
        <div class='span4 visible-desktop'></div>
		<div class='span4 well' style='text-align: center;'>
			<h3>Give us your info so we can setup the game</h3>
			<?php $this->pnlSignup->Render(); ?>
		</div>
		<div class='span4 visible-desktop'></div>
	</div>







  
<?php require_once(dirname(__FILE__) . '/_footer.tpl.php'); ?>
