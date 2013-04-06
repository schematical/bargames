<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idVenue: <?php echo $_CONTROL->intIdVenue; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>namespace</label>
	      <?php $_CONTROL->txtNamespace->Render(); ?>
	    
    
    
	
     
    	
	      <label>idAccount</label>
	      <?php $_CONTROL->txtIdAccount->Render(); ?>
	    
    
    
	
     
    	
	      <label>currGameNamespace</label>
	      <?php $_CONTROL->txtCurrGameNamespace->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>