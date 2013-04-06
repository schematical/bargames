<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idUser: <?php echo $_CONTROL->intIdUser; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtEmail->ControlId; ?>">email</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtEmail->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtPassword->ControlId; ?>">password</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtPassword->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdAccount->ControlId; ?>">idAccount</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdAccount->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtIdUserTypeCd->ControlId; ?>">idUserTypeCd</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtIdUserTypeCd->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtUsername->ControlId; ?>">username</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtUsername->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtPassResetCode->ControlId; ?>">passResetCode</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtPassResetCode->Render(); ?>
	    </div>
	</div>
    
    
    
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtActive->ControlId; ?>">active</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtActive->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewParentAuthUser)){ ?>
   			<?php $_CONTROL->lnkViewParentAuthUser->Render(); ?><br />
   		<?php } ?>
	
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildAuthAccount)){ ?>
   			<?php $_CONTROL->lnkViewChildAuthAccount->Render(); ?><br />  
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewChildAuthSession)){ ?>
   			<?php $_CONTROL->lnkViewChildAuthSession->Render(); ?><br />  
   		<?php } ?>
	
  		<?php if(!is_null($_CONTROL->lnkViewChildAuthUserSetting)){ ?>
   			<?php $_CONTROL->lnkViewChildAuthUserSetting->Render(); ?><br />  
   		<?php } ?>
	
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>