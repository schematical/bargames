<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idPlayerApp: <?php echo $_CONTROL->intIdPlayerApp; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idPlayer</label>
	      <?php $_CONTROL->txtIdPlayer->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApp</label>
	      <?php $_CONTROL->txtIdApp->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>