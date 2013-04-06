<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idApplication: <?php echo $_CONTROL->intIdApplication; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdDeveloper->ControlId; ?>">idDeveloper</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdDeveloper->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtName->ControlId; ?>">name</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtName->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->->ControlId; ?>">desc</label>
		<div class='controls'>	      
	      <?php $_CONTROL->->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApplicationStatusTypeCd->ControlId; ?>">idApplicationStatusTypeCd</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApplicationStatusTypeCd->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtConsumerKey->ControlId; ?>">consumerKey</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtConsumerKey->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtConsumerSecret->ControlId; ?>">consumerSecret</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtConsumerSecret->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtDomain->ControlId; ?>">domain</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtDomain->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCallback_url->ControlId; ?>">callback_url</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCallback_url->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtNamespace->ControlId; ?>">namespace</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtNamespace->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApplicationPermissionLevel->ControlId; ?>">idApplicationPermissionLevel</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApplicationPermissionLevel->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIframe_url->ControlId; ?>">iframe_url</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIframe_url->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtBartender_url->ControlId; ?>">bartender_url</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtBartender_url->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtPlayer_url->ControlId; ?>">player_url</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtPlayer_url->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentApiApplication)){ ?>
   			<?php $_CONTROL->lnkViewParentApiApplication->Render(); ?><br />
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewParentApiApplication)){ ?>
   			<?php $_CONTROL->lnkViewParentApiApplication->Render(); ?><br />
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewParentApiApplication)){ ?>
   			<?php $_CONTROL->lnkViewParentApiApplication->Render(); ?><br />
   		<?php } ?>
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildApiCall)){ ?>
   			<?php $_CONTROL->lnkViewChildApiCall->Render(); ?><br />  
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewChildApiRequestToken)){ ?>
   			<?php $_CONTROL->lnkViewChildApiRequestToken->Render(); ?><br />  
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewChildPlayerApp)){ ?>
   			<?php $_CONTROL->lnkViewChildPlayerApp->Render(); ?><br />  
   		<?php } ?>
	
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>