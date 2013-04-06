<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idBartenderVenue: <?php echo $_CONTROL->intIdBartenderVenue; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdVenue->ControlId; ?>">idVenue</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdVenue->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdBartender->ControlId; ?>">idBartender</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdBartender->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtCreDate->ControlId; ?>">creDate</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentBartenderVenue)){ ?>
   			<?php $_CONTROL->lnkViewParentBartenderVenue->Render(); ?><br />
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewParentBartenderVenue)){ ?>
   			<?php $_CONTROL->lnkViewParentBartenderVenue->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>