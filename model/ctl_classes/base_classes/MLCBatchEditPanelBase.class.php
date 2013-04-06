<?php
class MLCBatchEditPanelBase extends MJaxPanel{
	protected $objMLCBatch = null;
    
    	
    	public $intIdBatch = null;
   		
    	
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtJobName = null;
   		
	
    	
    	
    	public $txtReport = null;
   		
	
    	
    	
    	public $txtIdBatchStatus = null;
   		
	
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objMLCBatch = null){
		parent::__construct($objParentControl);
		$this->objMLCBatch = $objMLCBatch;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/MLCBatchEditPanelBase.tpl.php';
		
		$this->CreateFieldControls();
		$this->CreateContentControls();
		$this->CreateReferenceControls();
		
	}
	public function CreateContentControls(){
		$this->btnSave = new MJaxButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnSave_click'));
		
		
		$this->btnDelete = new MJaxButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnDelete_click'));
		if(is_null($this->objMLCBatch)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtJobName = new MJaxTextBox($this);
	  		$this->txtJobName->Name = 'jobName';
  		
	     
	  	
	  		$this->txtReport = new MJaxTextBox($this);
	  		$this->txtReport->Name = 'report';
  		
	     
	  	
	  		$this->txtIdBatchStatus = new MJaxTextBox($this);
	  		$this->txtIdBatchStatus->Name = 'idBatchStatus';
  		
	  
	  if(!is_null($this->objMLCBatch)){
	     
	  	
  		
  			$this->intIdBatch = $this->objMLCBatch->idBatch;
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objMLCBatch->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtJobName->Text = $this->objMLCBatch->jobName;
  		
  		
  		
	     
	  		  		
	  		$this->txtReport->Text = $this->objMLCBatch->report;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdBatchStatus->Text = $this->objMLCBatch->idBatchStatus;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objMLCBatch->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objMLCBatch)){
			//Create a new one
			$this->objMLCBatch = new MLCBatch();
		}

  		  
  		
		  
  		 
      	$this->objMLCBatch->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objMLCBatch->jobName = $this->txtJobName->Text;
		
		  
  		 
      	$this->objMLCBatch->report = $this->txtReport->Text;
		
		  
  		 
      	$this->objMLCBatch->idBatchStatus = $this->txtIdBatchStatus->Text;
		
		
		$this->objMLCBatch->Save();
  	}
  	public function btnDelete_click(){
  		$this->objMLCBatch->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objMLCBatch);
  	}
  	
}
?>