<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idAccount: <?php echo $_CONTROL->intIdAccount; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>aws_id</label>
	      <?php $_CONTROL->txtAws_id->Render(); ?>
	    
    
    
	
     
    	
	      <label>idAccountTypeCd</label>
	      <?php $_CONTROL->txtIdAccountTypeCd->Render(); ?>
	    
    
    
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>