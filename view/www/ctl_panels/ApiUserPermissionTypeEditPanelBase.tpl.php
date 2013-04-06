<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idUserPermissionType: <?php echo $_CONTROL->intIdUserPermissionType; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtShortDesc->ControlId; ?>">shortDesc</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->->ControlId; ?>">longDesc</label>
		<div class='controls'>	      
	      <?php $_CONTROL->->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->->ControlId; ?>">default</label>
		<div class='controls'>	      
	      <?php $_CONTROL->->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildApiUserPermission)){ ?>
   			<?php $_CONTROL->lnkViewChildApiUserPermission->Render(); ?><br />  
   		<?php } ?>
	
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>