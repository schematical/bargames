<div>

    
    
     
   	 	<?php if(is_null($_CONTROL->IsNew())){ ?>
    	idBatch: <?php echo $_CONTROL->intIdBatch; ?><br/>
    	<?php }else{ ?>
    		New
    	<?php } ?>
	
	
     
    	
	      <label>creDate</label>
	      <?php $_CONTROL->txtCreDate->Render(); ?>
	    
    
    
	
     
    	
	      <label>jobName</label>
	      <?php $_CONTROL->txtJobName->Render(); ?>
	    
    
    
	
     
    	
	      <label>report</label>
	      <?php $_CONTROL->txtReport->Render(); ?>
	    
    
    
	
     
    	
	      <label>idBatchStatus</label>
	      <?php $_CONTROL->txtIdBatchStatus->Render(); ?>
	    
    
    
	
	<div style='float:right;'>
	 <?php $_CONTROL->btnSave->Render(); ?>
	 <?php $_CONTROL->btnDelete->Render(); ?>
	</div>

</div>