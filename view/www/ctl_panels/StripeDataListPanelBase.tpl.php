<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idStripeData: <?php echo $_CONTROL->intIdStripeData; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>idParentStripeData</label>
	      <?php $_CONTROL->txtIdParentStripeData->Render(); ?>
	    
    
    
	
     
    	
	      <label>stripeId</label>
	      <?php $_CONTROL->txtStripeId->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>object</label>
	      <?php $_CONTROL->txtObject->Render(); ?>
	    
    
    
	
     
    	
	      <label>data</label>
	      <?php $_CONTROL->txtData->Render(); ?>
	    
    
    
	
     
    	
	      <label>mode</label>
	      <?php $_CONTROL->txtMode->Render(); ?>
	    
    
    
	
     
    	
	      <label>instance_url</label>
	      <?php $_CONTROL->txtInstance_url->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>