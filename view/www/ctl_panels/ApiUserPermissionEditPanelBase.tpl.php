<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idUserPermission: <?php echo $_CONTROL->intIdUserPermission; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUser->ControlId; ?>">idUser</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUserPermissionType->ControlId; ?>">idUserPermissionType</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUserPermissionType->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtValue->ControlId; ?>">value</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtValue->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtModDateTime->ControlId; ?>">modDateTime</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtModDateTime->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentApiUserPermission)){ ?>
   			<?php $_CONTROL->lnkViewParentApiUserPermission->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>