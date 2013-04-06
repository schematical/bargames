<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idSysConfigEntry: <?php echo $_CONTROL->intIdSysConfigEntry; ?><br/>    	
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
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtModDate->ControlId; ?>">modDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtModDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUser->ControlId; ?>">idUser</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>