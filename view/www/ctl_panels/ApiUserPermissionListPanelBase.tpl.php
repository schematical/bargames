<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idUserPermission: <?php echo $_CONTROL->intIdUserPermission; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUserPermissionType</label>
	      <?php $_CONTROL->txtIdUserPermissionType->Render(); ?>
	    
    
    
	
     
    	
	      <label>value</label>
	      <?php $_CONTROL->txtValue->Render(); ?>
	    
    
    
	
     
    	
	      <label>modDateTime</label>
	      <?php $_CONTROL->txtModDateTime->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>