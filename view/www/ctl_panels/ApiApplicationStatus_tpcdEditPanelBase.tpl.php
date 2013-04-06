<form class="form-horizontal">  
    
    
    
     
    	<legend>
   	 	<?php if($_CONTROL->IsNew()){ ?>
   	 		New
    	<?php }else{ ?>
    		idApplicaitonStatusTypeCd: <?php echo $_CONTROL->intIdApplicaitonStatusTypeCd; ?><br/>    	
    	<?php } ?>
    	</legend>
	
	
    
   
	
	 <div class="control-group">
		<label class="control-label" class="control-label" for="<?php echo $_CONTROL->txtShortDesc->ControlId; ?>">shortDesc</label>
		<div class='controls'>	      
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
	    </div>
	</div>
    
    
    
	
	
	 
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildApiApplication)){ ?>
   			<?php $_CONTROL->lnkViewChildApiApplication->Render(); ?><br />  
   		<?php } ?>
	
	<div class="control-group">
		<div class='controls'>
			 <?php $_CONTROL->btnSave->Render(); ?>
			 <?php $_CONTROL->btnDelete->Render(); ?>
	 	</div>
	</div>

</form>