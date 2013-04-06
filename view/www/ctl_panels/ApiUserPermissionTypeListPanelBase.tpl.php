<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idUserPermissionType: <?php echo $_CONTROL->intIdUserPermissionType; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
     
    	
	      <label>longDesc</label>
	      <?php $_CONTROL->->Render(); ?>
	    
    
    
	
     
    	
	      <label>default</label>
	      <?php $_CONTROL->->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>