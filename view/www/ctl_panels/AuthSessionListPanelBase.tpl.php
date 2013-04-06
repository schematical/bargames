<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idSession: <?php echo $_CONTROL->intIdSession; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>startDate</label>
	      <?php $_CONTROL->txtStartDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>endDate</label>
	      <?php $_CONTROL->txtEndDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>sessionKey</label>
	      <?php $_CONTROL->txtSessionKey->Render(); ?>
	    
    
    
	
     
    	
	      <label>ipAddress</label>
	      <?php $_CONTROL->txtIpAddress->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>