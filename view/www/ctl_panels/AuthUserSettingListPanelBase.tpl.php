<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idUserSetting: <?php echo $_CONTROL->intIdUserSetting; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>idUser</label>
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    
    
    
	
     
    	
	      <label>idUserSettingTypeCd</label>
	      <?php $_CONTROL->txtIdUserSettingTypeCd->Render(); ?>
	    
    
    
	
     
    	
	      <label>value</label>
	      <?php $_CONTROL->txtValue->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>