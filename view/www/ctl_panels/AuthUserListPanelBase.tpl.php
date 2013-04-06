<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idUser: <?php echo $_CONTROL->intIdUser; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>email</label>
	      <?php $_CONTROL->txtEmail->Render(); ?>
	    
    
    
	
     
    	
	      <label>password</label>
	      <?php $_CONTROL->txtPassword->Render(); ?>
	    
    
    
	
     
    	
	      <label>idAccount</label>
	      <?php $_CONTROL->txtIdAccount->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUserTypeCd</label>
	      <?php $_CONTROL->txtIdUserTypeCd->Render(); ?>
	    
    
    
	
     
    	
	      <label>username</label>
	      <?php $_CONTROL->txtUsername->Render(); ?>
	    
    
    
	
     
    	
	      <label>passResetCode</label>
	      <?php $_CONTROL->txtPassResetCode->Render(); ?>
	    
    
    
	
     
    	
	      <label>active</label>
	      <?php $_CONTROL->txtActive->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>