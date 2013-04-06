<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idLocation: <?php echo $_CONTROL->intIdLocation; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtShortDesc->ControlId; ?>">shortDesc</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtAddress1->ControlId; ?>">address1</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtAddress1->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtAddress2->ControlId; ?>">address2</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtAddress2->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCity->ControlId; ?>">city</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCity->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtState->ControlId; ?>">state</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtState->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtZip->ControlId; ?>">zip</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtZip->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCountry->ControlId; ?>">country</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCountry->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtLat->ControlId; ?>">lat</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtLat->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtLng->ControlId; ?>">lng</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtLng->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdAccount->ControlId; ?>">idAccount</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdAccount->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentLocation)){ ?>
   			<?php $_CONTROL->lnkViewParentLocation->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>