<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idApiRequestToken: <?php echo $_CONTROL->intIdApiRequestToken; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtOauth_token->ControlId; ?>">oauth_token</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtOauth_token->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtOauth_token_secret->ControlId; ?>">oauth_token_secret</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtOauth_token_secret->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtExpDate->ControlId; ?>">expDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtExpDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApplication->ControlId; ?>">idApplication</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentApiRequestToken)){ ?>
   			<?php $_CONTROL->lnkViewParentApiRequestToken->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>