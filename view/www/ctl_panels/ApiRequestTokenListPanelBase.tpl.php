<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idApiRequestToken: <?php echo $_CONTROL->intIdApiRequestToken; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>oauth_token</label>
	      <?php $_CONTROL->txtOauth_token->Render(); ?>
	    
    
    
	
     
    	
	      <label>oauth_token_secret</label>
	      <?php $_CONTROL->txtOauth_token_secret->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>expDate</label>
	      <?php $_CONTROL->txtExpDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApplication</label>
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>