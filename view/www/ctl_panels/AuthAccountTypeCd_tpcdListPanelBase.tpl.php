<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idAccountTypeCd: <?php echo $_CONTROL->intIdAccountTypeCd; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>