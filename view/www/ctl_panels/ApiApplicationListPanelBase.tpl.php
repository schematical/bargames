<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idApplication: <?php echo $_CONTROL->intIdApplication; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idDeveloper</label>
	      <?php $_CONTROL->txtIdDeveloper->Render(); ?>
	    
    
    
	
     
    	
	      <label>name</label>
	      <?php $_CONTROL->txtName->Render(); ?>
	    
    
    
	
     
    	
	      <label>desc</label>
	      <?php $_CONTROL->->Render(); ?>
	    
    
    
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApplicationStatusTypeCd</label>
	      <?php $_CONTROL->txtIdApplicationStatusTypeCd->Render(); ?>
	    
    
    
	
     
    	
	      <label>consumerKey</label>
	      <?php $_CONTROL->txtConsumerKey->Render(); ?>
	    
    
    
	
     
    	
	      <label>consumerSecret</label>
	      <?php $_CONTROL->txtConsumerSecret->Render(); ?>
	    
    
    
	
     
    	
	      <label>domain</label>
	      <?php $_CONTROL->txtDomain->Render(); ?>
	    
    
    
	
     
    	
	      <label>callback_url</label>
	      <?php $_CONTROL->txtCallback_url->Render(); ?>
	    
    
    
	
     
    	
	      <label>namespace</label>
	      <?php $_CONTROL->txtNamespace->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApplicationPermissionLevel</label>
	      <?php $_CONTROL->txtIdApplicationPermissionLevel->Render(); ?>
	    
    
    
	
     
    	
	      <label>iframe_url</label>
	      <?php $_CONTROL->txtIframe_url->Render(); ?>
	    
    
    
	
     
    	
	      <label>bartender_url</label>
	      <?php $_CONTROL->txtBartender_url->Render(); ?>
	    
    
    
	
     
    	
	      <label>player_url</label>
	      <?php $_CONTROL->txtPlayer_url->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>