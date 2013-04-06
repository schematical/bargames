<div>

    
    
   
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idVenue: <?php echo $_CONTROL->intIdVenue; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
	      <label>shortDesc</label>
	      <?php $_CONTROL->txtShortDesc->Render(); ?>
    
   
    
	
     
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
    
   
    
	
     
	      <label>hash</label>
	      <?php $_CONTROL->txtHash->Render(); ?>
    
   
    
	
	 
	 
  		<?php if(!is_null($_CONTROL->lnkViewChildBartenderVenue)){ ?>
   			<?php $_CONTROL->lnkViewChildBartenderVenue->Render(); ?><br />  
   		<?php } ?>
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>