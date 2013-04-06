<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idUserSetting: <?php echo $_CONTROL->intIdUserSetting; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUser->ControlId; ?>">idUser</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUser->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUserSettingTypeCd->ControlId; ?>">idUserSettingTypeCd</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUserSettingTypeCd->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtValue->ControlId; ?>">value</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtValue->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentAuthUserSetting)){ ?>
   			<?php $_CONTROL->lnkViewParentAuthUserSetting->Render(); ?><br />
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewParentAuthUserSetting)){ ?>
   			<?php $_CONTROL->lnkViewParentAuthUserSetting->Render(); ?><br />
   		<?php } ?>
	
	 
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>