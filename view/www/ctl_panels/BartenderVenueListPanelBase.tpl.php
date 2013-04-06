<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idBartenderVenue: <?php echo $_CONTROL->intIdBartenderVenue; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idVenue</label>
	      <?php $_CONTROL->txtIdVenue->Render(); ?>
	    
    
    
	
     
    	
	      <label>idBartender</label>
	      <?php $_CONTROL->txtIdBartender->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>