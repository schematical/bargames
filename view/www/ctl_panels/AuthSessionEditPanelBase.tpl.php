<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idSession: <?php echo $_CONTROL->intIdSession; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtStartDate->ControlId; ?>">startDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtStartDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtEndDate->ControlId; ?>">endDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtEndDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUser->ControlId; ?>">idUser</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtSessionKey->ControlId; ?>">sessionKey</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtSessionKey->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIpAddress->ControlId; ?>">ipAddress</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIpAddress->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentAuthSession)){ ?>
   			<?php $_CONTROL->lnkViewParentAuthSession->Render(); ?><br />
   		<?php } ?>
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildTrackingEvent)){ ?>
   			<?php $_CONTROL->lnkViewChildTrackingEvent->Render(); ?><br />  
   		<?php } ?>
	
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>