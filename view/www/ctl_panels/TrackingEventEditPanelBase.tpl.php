<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idTrackingEvent: <?php echo $_CONTROL->intIdTrackingEvent; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtName->ControlId; ?>">name</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtName->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtValue->ControlId; ?>">value</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtValue->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUser->ControlId; ?>">idUser</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdSession->ControlId; ?>">idSession</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdSession->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApplication->ControlId; ?>">idApplication</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtApp->ControlId; ?>">app</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtApp->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtForm->ControlId; ?>">form</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtForm->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtControlId->ControlId; ?>">controlId</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtControlId->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtText->ControlId; ?>">text</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtText->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtEvent->ControlId; ?>">event</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtEvent->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtRef->ControlId; ?>">ref</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtRef->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtUtma->ControlId; ?>">utma</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtUtma->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentTrackingEvent)){ ?>
   			<?php $_CONTROL->lnkViewParentTrackingEvent->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>