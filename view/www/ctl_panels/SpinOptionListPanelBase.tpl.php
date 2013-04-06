<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idSpinOption: <?php echo $_CONTROL->intIdSpinOption; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idVenue</label>
	      <?php $_CONTROL->txtIdVenue->Render(); ?>
	    
    
    
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>icon</label>
	      <?php $_CONTROL->txtIcon->Render(); ?>
	    
    
    
	
     
    	
	      <label>longDesc</label>
	      <?php $_CONTROL->txtLongDesc->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>