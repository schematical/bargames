<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idApiCall: <?php echo $_CONTROL->intIdApiCall; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtExeTime->ControlId; ?>">exeTime</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtExeTime->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtRequestUri->ControlId; ?>">requestUri</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtRequestUri->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtPostData->ControlId; ?>">postData</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtPostData->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtResponseData->ControlId; ?>">responseData</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtResponseData->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApplication->ControlId; ?>">idApplication</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdTrackingEvent->ControlId; ?>">idTrackingEvent</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdTrackingEvent->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtUser_agent->ControlId; ?>">user_agent</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtUser_agent->Render(); ?>
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
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentApiCall)){ ?>
   			<?php $_CONTROL->lnkViewParentApiCall->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>