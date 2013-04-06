<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idPlayerApp: <?php echo $_CONTROL->intIdPlayerApp; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdPlayer->ControlId; ?>">idPlayer</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdPlayer->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdApp->ControlId; ?>">idApp</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdApp->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentPlayerApp)){ ?>
   			<?php $_CONTROL->lnkViewParentPlayerApp->Render(); ?><br />
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewParentPlayerApp)){ ?>
   			<?php $_CONTROL->lnkViewParentPlayerApp->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>