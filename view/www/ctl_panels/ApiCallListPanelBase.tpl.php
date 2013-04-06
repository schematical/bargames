<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idApiCall: <?php echo $_CONTROL->intIdApiCall; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>exeTime</label>
	      <?php $_CONTROL->txtExeTime->Render(); ?>
	    
    
    
	
     
    	
	      <label>requestUri</label>
	      <?php $_CONTROL->txtRequestUri->Render(); ?>
	    
    
    
	
     
    	
	      <label>postData</label>
	      <?php $_CONTROL->txtPostData->Render(); ?>
	    
    
    
	
     
    	
	      <label>responseData</label>
	      <?php $_CONTROL->txtResponseData->Render(); ?>
	    
    
    
	
     
    	
	      <label>idApplication</label>
	      <?php $_CONTROL->txtIdApplication->Render(); ?>
	    
    
    
	
     
    	
	      <label>idTrackingEvent</label>
	      <?php $_CONTROL->txtIdTrackingEvent->Render(); ?>
	    
    
    
	
     
    	
	      <label>user_agent</label>
	      <?php $_CONTROL->txtUser_agent->Render(); ?>
	    
    
    
	
     
    	
	      <label>lat</label>
	      <?php $_CONTROL->txtLat->Render(); ?>
	    
    
    
	
     
    	
	      <label>lng</label>
	      <?php $_CONTROL->txtLng->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>