<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idTrackingEvent: <?php echo $_CONTROL->intIdTrackingEvent; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>name</label>
	      <?php $_CONTROL->txtName->Render(); ?>
	    
    
    
	
     
    	
	      <label>value</label>
	      <?php $_CONTROL->txtValue->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>idSession</label>
	      <?php $_CONTROL->txtIdSession->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApplication</label>
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    
    
    
	
     
    	
	      <label>app</label>
	      <?php $_CONTROL->txtApp->Render(); ?>
	    
    
    
	
     
    	
	      <label>form</label>
	      <?php $_CONTROL->txtForm->Render(); ?>
	    
    
    
	
     
    	
	      <label>controlId</label>
	      <?php $_CONTROL->txtControlId->Render(); ?>
	    
    
    
	
     
    	
	      <label>text</label>
	      <?php $_CONTROL->txtText->Render(); ?>
	    
    
    
	
     
    	
	      <label>event</label>
	      <?php $_CONTROL->txtEvent->Render(); ?>
	    
    
    
	
     
    	
	      <label>ref</label>
	      <?php $_CONTROL->txtRef->Render(); ?>
	    
    
    
	
     
    	
	      <label>utma</label>
	      <?php $_CONTROL->txtUtma->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>