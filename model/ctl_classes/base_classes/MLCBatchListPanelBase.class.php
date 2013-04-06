<?php
class MLCBatchListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrMLCBatchs = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrMLCBatchs);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idBatch','idBatch');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('jobName','jobName');
	   		
		
	    	
	    	
	    	$this->AddColumn('report','report');
	   		
		
	    	
	    	
	    	$this->AddColumn('idBatchStatus','idBatchStatus');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/MLCBatch/' . $strActionParameter);
	}
	
  	
}
?>