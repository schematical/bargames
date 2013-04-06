<?php
class ReporterListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrReporters = array()){
		
		
	    	
	    	$this->AddColumn('idReporter','idReporter');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('name','name');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrReporters);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Reporter/' . $strActionParameter);
	}
	
  	
}
?>