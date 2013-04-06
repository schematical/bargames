<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idPlayer: <?php echo $_CONTROL->intIdPlayer; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>