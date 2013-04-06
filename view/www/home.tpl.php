<?php require_once(dirname(__FILE__) . '/_header.tpl.php'); ?>
	<div class='hero-unit'>
		<h2>Setup your Game</h2>
	</div>
	<div class='row'>
		<div class='span5 well'>
			<h2>
				<i class='icon-desktop'></i>
				Big Screen Display
			</h2>
			<ul class='list'>
				<li>
					Open this link on your laptop in Chrome. 
				</li>
				<li>
					Connect your laptop to the big screen TV.
				</li>
				<li>
					Press 'F12' to full screen the app
				</li>
			</ul>
			
		</div>
		<div class='span5 well'>
			<h2>
				<i class='icon-mobile-phone'></i>
				Bartender Admin				
			</h2>
			<ul class='list'>
				<li>
					Whip out your phone
				</li>
				<li>
					Go to 
					<div class='alert alert-success' style='width:200Px;display:inline;padding:2Px;'>
						<a href='http://<?php echo $this->strUrl; ?>'>
							<?php echo $this->strUrl; ?>							
						</a>
					</div>
				</li>
				<li>
					Now you control the game
				</li>
			</ul>
		</div>
	</div>

<?php require_once(dirname(__FILE__) . '/_footer.tpl.php'); ?>
