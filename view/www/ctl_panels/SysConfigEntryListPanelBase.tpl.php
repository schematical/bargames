<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idSysConfigEntry: <?php echo $_CONTROL->intIdSysConfigEntry; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>name</label>
	      <?php $_CONTROL->txtName->Render(); ?>
	    
    
    
	
     
    	
	      <label>value</label>
	      <?php $_CONTROL->txtValue->Render(); ?>
	    
    
    
	
     
    	
	      <label>modDate</label>
	      <?php $_CONTROL->txtModDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>