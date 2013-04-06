<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idLocation: <?php echo $_CONTROL->intIdLocation; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    
    
    
	
     
    	
	      <label>address1</label>
	      <?php $_CONTROL->txtAddress1->Render(); ?>
	    
    
    
	
     
    	
	      <label>address2</label>
	      <?php $_CONTROL->txtAddress2->Render(); ?>
	    
    
    
	
     
    	
	      <label>city</label>
	      <?php $_CONTROL->txtCity->Render(); ?>
	    
    
    
	
     
    	
	      <label>state</label>
	      <?php $_CONTROL->txtState->Render(); ?>
	    
    
    
	
     
    	
	      <label>zip</label>
	      <?php $_CONTROL->txtZip->Render(); ?>
	    
    
    
	
     
    	
	      <label>country</label>
	      <?php $_CONTROL->txtCountry->Render(); ?>
	    
    
    
	
     
    	
	      <label>lat</label>
	      <?php $_CONTROL->txtLat->Render(); ?>
	    
    
    
	
     
    	
	      <label>lng</label>
	      <?php $_CONTROL->txtLng->Render(); ?>
	    
    
    
	
     
    	
	      <label>idAccount</label>
	      <?php $_CONTROL->txtIdAccount->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>